
<form action="<?php echo base_url('/admin/insertProfessional'); ?>" method="post">

    <h1 class="title">Inserir Profissional</h1>
    <div class="row">
        <div class="col-md-12 text-center">
          <?php
            if($this->session->flashdata('insertPro') == true){
             echo "<div class='alert alert-success text-center' style='margin-top:10px' role='alert'>Inserido com Sucesso !</div>";
            }
          ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            Nome:<input name = "name" type="text" class="form-control" required>
        </div>
        <div class="col-md-6">
            Email: <input name="email" type="email" class="form-control" required>
        </div>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-md-3">
            Telefone: <input name="phone" type="text" class="form-control" >
        </div>
        <div class="col-md-4 col-md-offset-1">
            Profissão: 
            <select name="profession" id="" class="form-control" required>
                 <?php 
                
                    while($p = $professions->result_id->fetch_assoc()){
                         echo "<option value=".$p['id'].">".$p['nome']."</option>";
                    }
                                   
                ?>
            </select>
        </div>
        <div class="col-md-3">
            Cidade:
            <select name="city" id="" class="form-control" required>             
                <?php 
                
                    while($city = $cities->result_id->fetch_assoc()){
                         echo "<option value=".$city['id'].">".$city['nome']."</option>";
                    }                   
                ?>
            </select>
        </div>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-md-5 ">
           Descrição: <textarea name="description" class="form-control" name="" id="" cols="30" rows="10" required></textarea>
        </div> 
        <div class="col-md-3 text-center">
            <input style="margin-top:30px;" value="Enviar" class="btn btn-primary" type="submit">
        </div>
    </div>
    
</form>


