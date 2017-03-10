<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Users_model  extends  CI_MODEL{
        public function __construct()
        {
            parent::__construct();
        }
        
        public function checklogin($user, $password)
        {
            return $this->db->query("SElECT * FROM users  where login = '$user' and pass = '$password' limit 1");    
        }
        public function insert($name, $password, $level){
            return $this->db->query("insert into users(login, pass, level ) values('$name','$password','$level')");
        }
        public function getAll(){
            return $this->db->query("select * from users");
        }
        public function delete($id){
            return $this->db->query("delete from users where id = '$id' ");
        }
        public function getById($id){
            return $this->db->query("select * from users where id='$id' ");
        }
        public function update($name, $password, $level, $id){
            return $this->db->query("update  users set login = '$name', pass = '$password', level='$level' where id = '$id' ");
        }
    } 