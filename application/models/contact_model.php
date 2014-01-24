<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

	public function add_contact()
	{
		$data=array(
			'firstname'	=>$this->input->post('firstname'),
			'lastname'	=>$this->input->post('lastname'),
			'address'	=>$this->input->post('address'),
			'city'		=>$this->input->post('city'),
			'state'		=>$this->input->post('state'),
			'zip'		=>$this->input->post('zip')
			);
		$this->db->insert('contact',$data);
	}
	
	function get_contacts(){
		$query = $this->db->query("SELECT * FROM contact");			
		$return = $query->result_array();
		$query->free_result();
		return $return;
	}
}
?>