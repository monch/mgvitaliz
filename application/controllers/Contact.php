<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
	}
	public function index()
	{
		$data['title']= 'Contact Form';
		$this->session->set_flashdata('message','');
		$data['contacts'] = $this->contact_model->get_contacts();
		$this->load->view("registration_view.php", $data);
	}


	public function contact_form()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required|min_length[4]|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
			$this->session->set_flashdata('message','');
		}
		else
		{
			$this->contact_model->add_contact();
			$this->session->set_flashdata('message', 'New Contact has been added');
			 redirect(current_url());
			// $data['title']= 'Contact Form';
			// $data['contacts'] = $this->contact_model->get_contacts();
			// $data['reset'] = FALSE;
			// $this->load->view("registration_view.php", $data);
		}
	}
}
?>