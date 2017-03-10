<h1>Inserir Usuario</h1>

<?php 
        
    if($this->session->flashdata('insertUser') == true){
        echo "<div class='alert alert-success text-center' style='margin-top:10px' role='alert'>Inserido com sucesso ! </div>";
    }
?>

<form action="<?php echo base_url('admin/insertUser') ?>" method="post">
    <div class="row" style="margin-top:20px ">
        <div class="col-md-4">
            Login: <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="row" style="margin-top:20px ">
        <div class="col-md-4">
            Senha: <input type="password" name="password" id="p"class="form-control">
        </div>
        <div class="col-md-4">
            Confirme a Senha :<input type="password"  id = "cp" name="password-confirm" onblur="checaSenha()" class="form-control">
        </div>
        <div class="col-md-2">
            Nivel de Acesso:
            <select name = "level" class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>   
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5" style="margin-top:40px ">
            <input type="submit" id= "sb" class="btn btn-primary">
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