<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginnregModel extends CI_Model {
	function index()
	{
	}
	function login_user($user){
	$query= "SELECT id FROM users WHERE email= ? AND password=?";
	$values= array($user['email'], $user['password']);
	return $this->db->query($query, $values)->row_array();
	
	}
	function user_validation($new_user){
		$query="SELECT id FROM users WHERE email= ? ";
		$values= array($new_user['email']);
		return $this->db->query($query, $values)->row_array();

	}
	function register_user($user){
		$query= "INSERT INTO users(first_name, last_name, username, email, password) VALUES (?,?,?,?,?)";
		$values= array($user['first_name'], $user['last_name'], $user['username'], $user['email'], $user['password']);
		$this->db->query($query, $values);
		$query="SELECT id FROM users WHERE email=?";
		$values=array($user['email']);
		$new_id=$this->db->query($query, $values)->row_array();
		$query="INSERT INTO scores(score, user_id, circle_id, created_at, updated_at) VALUES (0,?,1, NOW(), NOW())";
		$values=array($new_id['id']);
		$this->db->query($query, $values);
		$query="INSERT INTO user_circles(circle_id, user_id) VALUES (1,?)";
		$values=array($new_id['id']);
		return $this->db->query($query, $values);
		
	}
	function get_user($id){
		$query= "SELECT id FROM users WHERE email= ?";
		return $this->db->query($query, $id)->row_array();
	}
}