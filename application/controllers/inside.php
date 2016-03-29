<?php
	
	class Inside extends CI_controller{

		public function team(){
			$id = $this->session->userdata('user_id');
			$this->load->model('Model');

			$teamname = $this->Model->getteamname($this->session->userdata['user_team_id']);
			$team = $this->Model->checkteam($id);
			$roster = $this->Model->get_roster($this->session->userdata['user_team_id']);
		

			$array =array(
				'input'=>$team,
				'teamname'=>$teamname,
				'roster'=>$roster
				);
		
			foreach ($team as $asdf){
				
			}
			if($asdf['team_id']!=1){
				$this->load->view("teampage", $array);
			}
			else{
				$this->load->view("student_profile");
			}
		}

		public function createteam(){
			$this->load->library("form_validation");
			$this->load->model("Model");

			$team = $this->input->post('team_name');
			$password = md5($this->input->post('team_password'));

			$this->form_validation->set_rules('team_name', 'First Name', 'required|is_unique[teams.team_name]');
			$this->form_validation->set_rules('team_password', 'Password', 'required|min_length[8]');

			if($this->form_validation->run() === FALSE){
                //$warnings = validation_errors();
                $this->session->set_flashdata("team_error", "Please enter valid team name and password (minimum 8 chararacters)");

                redirect("/login_controller/profile");
            }
            else{
			$array = array(
				"team"=> $team,
				"password"=> $password);
			$this->Model->addteam($array);
			$this->session->set_flashdata("team_success", "Your team has been added!");
			redirect("/login_controller/profile");
            }
		}

		public function jointeam(){

			
			$this->load->model("Model");

			$team = $this->input->post('team_name');
			$password = md5($this->input->post('team_password'));

			$result = $this->Model->get_team($team);
	

			if($result && $result['team_password'] == $password){
				//echo $result['id'];
				$userid = $this->session->userdata["user_id"];
				$this->Model->join_team($result['id'], $userid);

				$this->session->set_flashdata("addteam_success" , "Team Joined! Logout to Update");
				redirect("/login_controller/profile");
			}
			else {
				$this->session->set_flashdata("addteam_error" , "Invalid Team or Password");
				redirect("/login_controller/profile");
			}
		}
		public function save(){
			$this->load->model("Model");

			$test = $this->input->post('xPos');
			redirect("login_controller/profile");
		
		}

	}




?>