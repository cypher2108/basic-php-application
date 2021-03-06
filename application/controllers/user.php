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

	function edit($userId){
		$this->load->model('user_model');
		$user = $this->user_model->get_user($userId);
		$data = array();
		$data['user'] = $user;

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == false){
			$this->load->view('edit', $data);
		} else {
			//update user record
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['email'] = $this->input->post('email');
			$this->user_model->updateUser($userId, $formArray);
			$this->session->set_flashdata('success', 'Record updated successfully!');
			redirect(base_url().'index.php/user/index');
		}

	}

	function delete($userId){
		$this->load->model('user_model');
		$user = $this->user_model->get_user($userId);
		if (empty($user)) {
			$this->session->set_flashdata('failure', 'Record not found!');
			redirect(base_url().'index.php/user/index');
		} else {
			$this->user_model->deleteUser($userId);
			$this->session->set_flashdata('success', 'Record deleted successfully!');
			redirect(base_url().'index.php/user/index');
		}
	}
}

?>

