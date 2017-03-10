<h1>Atualizar Usuario</h1>

<?php 
        
    if($this->session->flashdata('updateUser') == true){
        echo "<div class='alert alert-success text-center' style='margin-top:10px' role='alert'>Atualizado com sucesso ! </div>";
    }

?>

<form action="<?php echo base_url('admin/updateUser') ?>" method="post">
   <input type="hidden"name="id" value="<?php echo $user['id'] ?>">
    <div class="row" style="margin-top:20px ">
        <div class="col-md-4">
            Login: <input type="text" name="name" class="form-control" value="<?php echo $user['login'] ?>">
        </div>
    </div>
    <div class="row" style="margin-top:20px ">
        <div class="col-md-4">
            Senha: <input type="password" id="p" name="password" class="form-control">
        </div>
        <div class="col-md-4">
            Confirme a Senha :<input type="password" id="cp" name="password-confirm" class="form-control">
        </div>
        <div class="col-md-2">
            Nivel de Acesso:
            <select  name = "level" class="form-control">
                <?php 
                    $levels = array(0,1);
                    foreach($levels as $level){
                        if($level == $user['level']){
                            echo "<option value='".$level."' selected>$level</option>";
                        }else{
                            echo "<option value='".$level."'>$level</option>";
                        }
                    }
                    
    
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5" style="margin-top:40px ">
            <input type="submit" class="btn btn-primary">
        </div>
    </div>
    

</form>
<script>
    function checaSenha(){
        if( $('#p').val() != $('#cp').val()){
            alert("as senhas não correspondem !");
          
        }
    }

</script>