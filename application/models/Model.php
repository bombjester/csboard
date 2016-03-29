<?php 


	class Model extends CI_Model{

		public function add($information){
			

			$query = "INSERT INTO users (first_name, last_name, email, password, created_at, team_id) VALUES (?,?,?,?,NOW(),1)";
			
			$values = array($information['first_name'], $information['last_name'], $information['email'], $information['password']);
			return $this->db->query($query,$values);
		}
		public function check_email($email){ 
			$query = "SELECT * FROM users WHERE email = ?";
			$values = array($email);
       		return $this->db->query($query,$values)->row_array();
       	}
		
  		 public function checkteam($id){
  		 	$query = "SELECT team_id FROM users WHERE id={$id}";
  		 
  		 	return $this->db->query($query)->result_array();
  		 }
  		public function getteamname($id){
  			$query = "SELECT team_name FROM teams WHERE id={$id}";
  			return $this->db->query($query)->result_array();
  		}
  		public function addteam($information){
  			$query = "INSERT INTO teams (team_name, team_password) VALUES (?,?)";
  			$values = array($information["team"], $information["password"]);
  			return $this->db->query($query, $values);
  		}
  		 public function delete($id){
  		 	$query = "DELETE FROM friends WHERE id = {$id}";
  		 	return $this->db->query($query);
  		 }
  		public function get_team($team){
  			$query = "SELECT * FROM teams WHERE team_name = ?";
  			$values = array($team);
  			return $this->db->query($query,$values)->row_array();
  		}
  		public function join_team($team_id, $user_id){
  			$query = "UPDATE users SET team_id = {$team_id} WHERE id ={$user_id}";
  			return $this->db->query($query);
  		}
  		public function get_roster($id){
  			$query = "SELECT first_name, email from users LEFT JOIN teams ON users.first_name=teams.id WHERE team_id = {$id}";
  			return $this->db->query($query)->result_array();
  		}

}
	
?>