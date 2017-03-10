<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function page($id)
	{
        $this->load->model('Visitor');
        $professions = $this->Visitor->getProfessionsByArea($id);
        
        $this->loadpage('content/visitor/AreaProfile', array('data' => $professions->result_id));
	}
    private function loadpage($view, $plus = null)
    {
        $this->load->view('content/visitor/dashboard_top');
        if($plus == null){
            $this->load->view($view);
        }else{
            $this->load->view($view, $plus);
        }

        $this->load->view('content/visitor/dashboard_bottom');
    }
    public function professional($id){
         $this->load->model('Professionals_model');
         $profile = $this->Professionals_model->getProfile($id);
         $this->loadpage('content/visitor/proProfile', array( 'data' => $profile->result_id->fetch_array()) );
    }
    public function profession($id){
         $this->load->model('Professionals_model');
         $profile = $this->Professionals_model->getAll($id);
         $this->loadpage('content/visitor/profissionProfile', array( 'data' => $profile->result_id));
    }

}
