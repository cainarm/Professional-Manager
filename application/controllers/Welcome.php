<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Visitor');
        $areas = $this->Visitor->getAreas();
        
        $this->loadpage('content/visitor/index', array('areas' => $areas->result_id));
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
    public function getPros(){
        $name = $this->input->get('name');
        $this->load->model('Professionals_model');
        $response = $this->Professionals_model->getByName($name);
        
        $this->load->view('ajax/visitorPro', array('data' => $response->result_id));
        
    }

}
