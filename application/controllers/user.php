<?php

class User extends CI_Controller
{
	function index(){
		$this->load->model('user_model');
		$users = $this->user_model->all();
		$data = array();
		$data['users'] = $users;
		$this->load->view('list', $data);
	}

	function create()
	{
		$this->load->model('User_model');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == false) {
			$this->load->view('create');
		} else {
			//save data to database
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['email'] = $this->input->post('email');
			$formArray['created_at'] = date('y,m,d');

			$this->User_model->create($formArray);
			$this->session->set_flashdata('success', 'Record Added Successfully!');
			redirect(base_url().'index.php/user/index');

		}
	}

	function edit($user_id){
		$this->load->model('user_model');
		$user = $this->user_model->get_user($user_id);
		$data = array();
		$data['user'] = $user;
		$this->load->view('edit', $data);
	}
}

?>

