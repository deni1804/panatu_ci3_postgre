<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Userlogin extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function check_password($password, $username)
	{
		$result = $this->db->query("SELECT 1 FROM kh_karyawan WHERE username = '$username' AND password = '$password' ");
		if ($result->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function check_login($username, $password)
	{
		//return $this->db->query('SELECT * FROM public."kh_karyawan" WHERE "kh_karyawan"."Username" =  "' . $username . '"  AND Password = "' . $password . '"');
		return $this->db->query("SELECT * FROM kh_karyawan WHERE username =  '$username' AND password = '$password'");
	}
}
