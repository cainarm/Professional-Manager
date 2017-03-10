<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class visitor  extends  CI_MODEL{
        public function __construct()
        {
            parent::__construct();
        }
        public function getAreas()
        {
            return $this->db->query("select area.id, area.nome as nome, count(profession.nome) as areas from area inner join profession on area.id = profession.area_id");
        }
        public function getProfessionsByArea($id){
            return $this->db->query("select profession.id as id, profession.nome as nome  from profession where profession.area_id = '$id' ");
        }

    } 