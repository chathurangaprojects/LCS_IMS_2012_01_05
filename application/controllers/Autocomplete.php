<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Autocomplete extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		
			$this->load->model('UserModel');
			$this->load->model('UserService');
		}
		
		
		public function loadItemTypes()
		{
			echo "aaaaa - bbbbb - 10\n";
			echo "ccccc - ddddd - 20\n";
			echo "eeeee - fffff - 30\n";
			echo "ggggg - hhhhh - 40\n";
			echo "iiiii - jjjjj - 50\n";
			echo "jjjjj - kkkkk - 60\n";
		}
	}
?>