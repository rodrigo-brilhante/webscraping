<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frases_model extends CI_Model
{

	public $texto;
	public $autor;
	public $tags;

	public function __construct()
	{
		parent::__construct();
	}

	public function listar_frases()
	{
		$this->db->select(
			'id, 
			autor,
			texto, 
			tags'
		);
		$this->db->from('frases');
		return $this->db->get()->result();
	}

	function alterar($id, $dados)
	{
		$this->db->where('id', $id);

		if (!$this->db->update('frases', $dados)) {
			$hasError = $this->db->_error_message();
			echo $hasError;
		} else {
			redirect('home', 'refresh');
		}
	}

	function excluir($id)
	{
		$this->db->where('id', $id);

		if (!$this->db->delete('frases')) {
			$hasError = $this->db->_error_message();
			echo $hasError;
		} else {
			redirect('home', 'refresh');
		}
	}

	function inserir($dados)
	{
		if (!$this->db->insert_batch('frases', $dados)) {
			$hasError = $this->db->_error_message();
			echo $hasError;
		} else {
			redirect('home', 'refresh');
		}
	}
}
