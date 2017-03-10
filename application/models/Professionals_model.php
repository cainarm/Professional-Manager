<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Professionals_model  extends  CI_MODEL{
        public function __construct()
        {
            parent::__construct();
        }
        public function getProfessions(){
            return $this->db->query("select * from profession");
        }
        public function getCities(){
            return $this->db->query("select * from city");
        }
        public function insertProfessional($name,$email,$phone,$city, $profession, $description){
            return $this->db->query("insert into professional(nome, email, telefone,cidade_id, area_id, descricao) values ('$name','$email','$phone','$city', '$profession', '$description') ");
        }
        public function updateProfessional($name,$email,$phone,$city, $profession, $description, $id){
            return $this->db->query("update professional set nome = '$name', email='$email', telefone='$phone', cidade_id = '$city', area_id='$profession', descricao = '$description' where id= '$id' ");
        }
        public function getByName($name){
            return $this->db->query("select professional.id as id,professional.nome as nome, profession.nome  as profissao , city.nome as cidade, professional.email as email, professional.telefone as telefone from professional inner join profession on profession.id = professional.area_id inner join city on city.id = professional.cidade_id where professional.nome like '%$name%'");
        }
        public function getProfile($id){
            return $this->db->query("select * from pro_view where id='$id' limit 1");
        }
        public function delete($id){
            return $this->db->query("delete  from professional where id='$id'");
        }
        public function getUpdateData($id){
            return $this->db->query("select * from professional where id='$id'");
        }
        public function getAll($id){
            return $this->db->query("select professional.id as id,professional.nome as nome, profession.nome  as profissao , city.nome as cidade, professional.email as email, professional.telefone as telefone from professional inner join profession on profession.id = professional.area_id inner join city on city.id = professional.cidade_id where professional.area_id = '$id' ");
        }
   
    } 