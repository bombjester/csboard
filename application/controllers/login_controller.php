<?php

class Login_controller extends CI_Controller {

  
    public function index(){
        $this->load->view('login_page');
    }
   
    public function login(){

        $email = $this->input->post('email');

        $password = md5($this->input->post('password'));

        $this->load->model('Model');

        $user = $this->Model->check_email($email);

       
        
        if($user && $user['password'] == $password){
            $userinfo = array(
               'user_id' => $user['id'],
               'user_email' => $user['email'],
               'user_name' => $user['first_name'].' '.$user['last_name'],
               'user_team_id' => $user['team_id'],
               
               'is_logged_in' => true
            );
            $this->session->set_userdata($userinfo);

            redirect("/login_controller/profile");
        }
        else
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect("/login_controller/index");
        }
    }
    public function profile(){

        if($this->session->userdata('is_logged_in') === TRUE){
        $this->load->model('Model');
        $teamname = $this->Model->getteamname($this->session->userdata['user_team_id']);

        $array = array(
            "input"=>$teamname);

          
            $this->load->view('student_profile',$array);


        }
        else{
            redirect("/login_controller/");
        }
    }
    //logout the student
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/login_controller/index");   
    }
    public function register(){
        $this->load->library("form_validation");
        $this->load->model('Model');

        // load models
    
        $email = $this->input->post('email');
        $beforepw = $this->input->post('password');
        $password = md5($this->input->post('password'));
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post("last_name");
        $confirm=md5($this->input->post('confirm'));
        //$birthday=($this->input->post('birthday'));
      
        // load input

  
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('password' , 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules( 'confirm' , 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules( 'email', 'Email', 'required|valid_email|is_unique[users.email]');
           
            if($this->form_validation->run() === FALSE){
                $warnings = validation_errors();

                
                $error=array(
                    "input"=>$warnings);
                $this->load->view('login_page',  $error);
            }
            else{
                //validated
                
                $array=array(
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "email" => $email,
                    "password" => $password);
                $this->Model->add($array);
                $works=array(
                    "lol"=>"working");
                $this->load->view('login_page', $works);


    
            }
    }









}
?>