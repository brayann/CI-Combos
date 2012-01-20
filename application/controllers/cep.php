<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Cep extends CI_Controller {

	//php 5 constructor
	function __construct() {
		parent::__construct();
	}
	
	function getCidades($id) {
		
		$this->load->model('cidades_model');
		
		$cidades = $this->cidades_model->getCidades($id);
		
		if( empty ( $cidades ) ) 
			return '{ "nome": "Nenhuma cidade encontrada" }';
			
		$arr_cidade = array();

		foreach ($cidades as $cidade) {
			
			$arr_cidade[] = '{"id":' . $cidade->id . ',"nome":"' . $cidade->nome . '"}';
				
		}
		
		echo '[ ' . implode(",",$arr_cidade) . ']';
		
		return;
		
	}
	
	function index() {
		
		$this->load->model('cidades_model');
		$dados['title']   = 'Exemplo de Combos Depe';
		$dados['estados'] = $this->cidades_model->getEstados();
		$this->load->view('teste_cep', $dados);
		
	}

}