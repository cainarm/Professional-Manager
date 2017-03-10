<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
    public function validate()
    {
        $user = $this->input->post('login');
        $pass = $this->input->post('password');
        
        $this->load->model('Users_model');
           
        $result = $this->Users_model->checklogin($user, md5($pass));
        
        if($result->result_id->num_rows == 1)
        {
    

            $datas = $result->result_id->fetch_assoc();
        
            
            $data = array(
                'logged' => true,
                'name' => $datas['name'],
                'level' => $datas['level']   
            );
            
           
            $this->session->set_userdata($data);
            
            redirect('admin/dashboard');

        }else{
            $this->session->set_flashdata('error', true);
            redirect('/admin');
        }
        
    }
    public function dashboard($action = null, $second = null, $id = null){
        if($this->session->userdata('logged') == true){
            if($action == "professional")
            {
                if($second == "insert")
                {
                    
                    $this->load->model('Professionals_model');
                    $cities = $this->Professionals_model->getCities();
                    $professions = $this->Professionals_model->getProfessions();
                    
                    $data = array(
                        'cities' => $cities,
                        'professions' => $professions
                    );
                    
                    $this->loadpage('content/professional/insert',$data);
                }
                if($second == "manage")
                {
                    $this->loadpage('content/professional/manage');
                    
                }
                if($second == "profile")
                {
                    if($id != null){
                        $this->load->model('Professionals_model');
                        $profile = $this->Professionals_model->getProfile($id);
                        $this->loadpage('content/professional/profile', array( 'data' => $profile->result_id->fetch_array()) );
                    }

                }
                if($second == "update")
                {
                    if($id != null){
                        $this->load->model('Professionals_model');
                        $profile = $this->Professionals_model->getUpdateData($id);
                        $cities = $this->Professionals_model->getCities();
                        $professions = $this->Professionals_model->getProfessions();
                    
                        
                        $this->loadpage('content/professional/update', array(
                            'profile' => $profile->result_id->fetch_array(),
                            'cities' => $cities,
                            'professions' => $professions
                        ));
                    }
                }

            }
            elseif($action == "user")
            {
                if($second == "insert")
                {
                    $this->loadpage('content/user/insert');
                }
                if($second == "manage")
                {
                    $this->load->model('Users_model');
                    
                    $users = $this->Users_model->getAll();
                    
                    $this->loadpage('content/user/manage', array('data' => $users->result_id));    
                }
                if($second == "update"){
                    $this->load->model('Users_model');
                    
                    $user = $this->Users_model->getById($id);
                    
                    $this->loadpage('content/user/update', array('user' => $user->result_id->fetch_array()));          
                }

            }
            else
            {
                $this->loadpage('content/empty');
                redirect('admin/dashboard/professional/manage');
            }
          
        }
        else
        {
             redirect('/admin');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('/admin');
    }
    private function loadpage($view, $plus = null){
        $this->load->view('Dashboard_top');
        if($plus == null){
            $this->load->view($view);
        }else{
            $this->load->view($view, $plus);
        }

        $this->load->view('Dashboard_bottom');
    }
    public function deleteProfessional($id){
        if($id != null){
            $this->load->model('Professionals_model');
            
            $return = $this->Professionals_model->delete($id);
            
            $this->session->set_flashdata('deletePro', true);
            redirect('admin/dashboard/professional/manage');
            
            
        }
    }
    public function insertProfessional(){
        $this->load->model('Professionals_model');
        if($this->session->userdata('logged') == true){
        
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $city = $this->input->post('city');
            $profession = $this->input->post('profession');
            $description = $this->input->post('description');
            
            $response =  $this->Professionals_model->insertProfessional($name,$email,$phone,$city, $profession, $description);
            if($response){
                $this->session->set_flashdata('insertPro', true);
                redirect('admin/dashboard/professional/insert');
            }

        
        }
    }
    public function updateProfessional(){
         if($this->session->userdata('logged') == true){
             
             $id = $this->input->post('id');
             $name = $this->input->post('name');
             $email = $this->input->post('email');
             $phone = $this->input->post('phone');
             $city = $this->input->post('city');
             $profession = $this->input->post('profession');
             $description = $this->input->post('description');
             $this->load->model('Professionals_model');
             $response =  $this->Professionals_model->updateProfessional($name,$email,$phone,$city, $profession, $description, $id);
             if($response){
                $this->session->set_flashdata('updatePro', true);
                redirect('admin/dashboard/professional/update/'.$id);
             }

        
        }
    }
    public function getPros(){
        $this->load->model('Professionals_model');
        $name = $this->input->get('name');

        $response = $this->Professionals_model->getByName($name);
    
        $data = array(
            "data" => $response->result_id
        );
        
        $this->load->view('ajax/professionalManage', $data);
        
    }
    public function insertUser(){
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password');
        $level= $this->input->post('level');
        
        if($password != $password_confirm)
        {
            redirect('admin/dashboard/user/insert');
        }
        else
        {
            $this->load->model('Users_model');
            $response = $this->Users_model->insert($name, md5($password), $level);
            $this->session->set_flashdata('insertUser', true);
            redirect('admin/dashboard/user/insert');
        }
        
        
    }
    public function deleteUser($id){
         $this->load->model('Users_model');
         $response = $this->Users_model->delete($id);
         $this->session->set_flashdata('deleteUser', true);
         redirect('admin/dashboard/user/manage');
    }
    public function updateUser(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password');
        $level= $this->input->post('level');
        
        if($password != $password_confirm)
        {
            redirect('admin/dashboard/user/insert');
        }
        else
        {
            $this->load->model('Users_model');
            $response = $this->Users_model->update($name, md5($password), $level, $id);
            $this->session->set_flashdata('updateUser', true);
            redirect('admin/dashboard/user/update/'.$id);
        }
    }

}
