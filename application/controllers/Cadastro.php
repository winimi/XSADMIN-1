<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Cadastrar
 *
 * @author lazaro
 */
class Cadastro extends CI_Controller{
    public function index(){
        $this->template->load('cadastrar/index', array(), null, 'Cadastro');
    }
    
    public function cadastrar(){
        $dataPost = $this->input->post();
        $this->load->model('usermodel');
        try{
            $this->usermodel->cadastrar($dataPost['name'],$dataPost['email'],$dataPost['password'],$dataPost['birthdate'],$dataPost['phone']);
           $this->session->set_flashdata('success', 'Usuário cadastrado. Você já pode acessar o sistema');
            redirect('/acesso');
        }  catch (\Exception $ex){
            $retorno = $ex->getMessage();
        }
    }
}
