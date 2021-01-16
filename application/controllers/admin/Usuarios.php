<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {

    // Dados a serem enviados para o Cabeçalho
    $dados['titulo'] = 'Painel de Controle';
    $dados['subtitulo'] = 'Home';

    $this->load->view('backend/template/html-header', $dados);
    $this->load->view('backend/template/template');
    $this->load->view('backend/home');
    $this->load->view('backend/template/html-footer');
  }

  public function pag_login()
  {
    $dados['titulo'] = 'Painel de Controle';
    $dados['subtitulo'] = 'Entrar no Sistema';

    $this->load->view('backend/template/html-header', $dados);
    $this->load->view('backend/Login');
    $this->load->view('backend/template/html-footer');
  }
}
