<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="pt-br">
        <title>Login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.6-dist/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('css/style.css')?>">   
       <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-box">
                        <form action="<?php echo base_url('admin/validate') ?>" method="post">                 
                            <div class="col-md-12"><h1 class="text-center">LOGIN</h1></div>
                            <div style="margin-top:50px" class="col-md-12">Login:<input  name = "login" class="form-control" type="text"></div>
                            <div style="margin-top:30px" class="col-md-12">Senha:<input  name = "password" class="form-control" type="password"></div>
                            <div class="col-md-12 text-center"><button style="margin-top:30px" class="btn btn-primary">Logar</button></div>
                        </form>
                    </div>
                    <?php 
                
                            if($this->session->flashdata('error') == true){
                                echo "<div class='alert alert-danger text-center' style='margin-top:10px' role='alert'>Usuario ou senha incorretos !</div>";
                            }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>