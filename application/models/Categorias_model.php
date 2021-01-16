<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias_model extends CI_Model
{

  public $id;
  public $titulo;

  public function __construct()
  {
    parent::__construct();
  }

  public function listar_categorias()
  {
    $this->db->order_by('titulo', 'ASC');
    return $this->db->get('categoria')->result();
  }

  public function listar_titulo($id)
  {
    $this->db->from('categoria');
    $this->db->where('id =' . $id);
    return $this->db->get()->result();
  }

  public function adicionar($titulo)
  {
    $dados['titulo'] = $titulo;
    return $this->db->insert('categoria', $dados);
  }

  public function excluir($id)
  {
    $this->db->where('md5(id)', $id);
    return $this->db->delete('categoria');
  }
}
