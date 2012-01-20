<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Cidades_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getEstados() {
		
		return $this->db->get('estados')->result();
		
	}
	
	function getCidades($id = null) {
		
		if(!is_null($id))
			$this->db->where( array('estados.id' => $id) );
		return $this->db->select('cidades.id, cidades.nome')
				 		->from('estados')
				 		->join('cidades', 'cidades.id_uf = estados.id')
						->get()->result();
		
	}

}