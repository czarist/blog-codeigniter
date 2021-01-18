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
    if (!$this->session->userdata('logado')) {
      redirect(base_url('admin/login'));
    }
    $this->load->library('table');
    $this->load->model('usuarios_model', 'modelusuarios');
    $dados['usuarios'] = $this->modelusuarios->listarautores();
    // Dados a serem enviados para o Cabeçalho
    $dados['titulo'] = 'Painel de Controle';
    $dados['subtitulo'] = 'Usuários';
    $this->load->view('backend/template/html-header', $dados);
    $this->load->view('backend/template/template');
    $this->load->view('backend/usuarios');
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

  public function login()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt-user', 'Usuário', 'required|min_length[3]|is_unique[categoria.titulo]');
    $this->form_validation->set_rules('txt-senha', 'Senha', 'required|min_length[3]|is_unique[categoria.titulo]');
    if ($this->form_validation->run() == FALSE) {
      $this->pag_login();
    } else {
      $usuario = $this->input->post('txt-user');
      $senha = $this->input->post('txt-senha');
      $this->db->where('user', $usuario);
      $this->db->where('senha', $senha);
      $userlogado = $this->db->get('usuario')->result();
      if (count($userlogado) == 1) {
        $dadosSessao['userlogado'] = $userlogado[0];
        $dadosSessao['logado'] = TRUE;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url('admin'));
      } else {
        $dadosSessao['userlogado'] = NULL;
        $dadosSessao['logado'] = FALSE;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url('admin/login'));
      }
    }
  }
  public function logout()
  {
    $dadosSessao['userlogado'] = NULL;
    $dadosSessao['logado'] = FALSE;
    $this->session->set_userdata($dadosSessao);
    redirect(base_url('admin/login'));
  }
}
