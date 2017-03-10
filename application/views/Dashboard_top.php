<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.6-dist/css/bootstrap.min.css')?>" >
        <link rel="stylesheet" href="<?php echo base_url('css/style.css')?>">   
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url('js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('css/bootstrap-3.3.6-dist/js/bootstrap.min.js')?>"></script>
        <script  src="<?php echo base_url('js/script.js')?>" ></script>
    </head>
    <body style="background-color:#e8e8e8">    
        <div class="container-fluid" >
            <div class="row"></div>
            <div class="dash-header"><h1>Gerenciador de Profissionais</h1><a href="<?php echo base_url('admin/logout') ?>"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="dash-menu">
                        <div class="dash-menu-option">
                            
                            <a data-toggle="collapse" data-target="#prof"><div><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profissionais</div></a>
                            <div id="prof" class="collapse">
                                <a href="<?php echo base_url('admin/dashboard/professional/manage') ?>"><div>Gerenciar</div></a>
                                <a href="<?php echo base_url('admin/dashboard/professional/insert') ?>"><div>Inserir</div></a>
                            </div>
                            
                                <?php 
                                if($this->session->userdata('level') == 1){
                                  ?>
                                 
                                    <a data-toggle="collapse" data-target="#user"><div><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</div></a>
                                    <div id="user" class="collapse">
                                        <a href="<?php echo base_url('admin/dashboard/user/manage') ?>"><div>Gerenciar</div></a>
                                        <a href="<?php echo base_url('admin/dashboard/user/insert') ?>"><div>Inserir</div></a>
                                    </div>
                                  <?php   
                                }
                            ?>
                            
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-9" >
                    <div id="content">