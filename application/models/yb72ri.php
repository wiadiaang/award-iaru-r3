<?php

/*
	Handles retrieving QSOs that have a yb72ri (www.yb72ri.org) membership number stored in the comment field
	eg yb72ri:1245
*/

class yb72ri extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function get_all() {
		$this->db->order_by("COL_COMMENT", "ASC"); 
		$this->db->like('COL_COMMENT', 'yb72ri:');
		
		return $this->db->get($this->config->item('table_name'));
	}
}

?>