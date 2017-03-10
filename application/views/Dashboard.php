<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.6-dist/css/bootstrap.min.css')?>" >
        <link rel="stylesheet" href="<?php echo base_url('css/style.css')?>">   
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="<?php echo base_url('css/bootstrap-3.3.6-dist/js/bootstrap.min.js')?>"></script>
    </head>
    <body>    
        <div class="container-fluid">
            <div class="row"></div>
            <div class="dash-header"><h1>Gerenciador de Profissionais</h1><a href="logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></div>
            <div class="row">
                <div class="col-md-2">
                    <div class="dash-menu">
                        <div class="dash-menu-option">
                            <a data-toggle="collapse" data-target="#prof"><div><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profissionais</div></a>
                            <div id="prof" class="collapse">
                                <a href=""><div>Gerenciar</div></a>
                                <a href=""><div>Inserir</div></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9" >
                    <div id="content">
                        
                    </div>
                </div>

            </div>

        </div>


    </body>

</html>