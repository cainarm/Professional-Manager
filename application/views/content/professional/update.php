
<form action="<?php echo base_url('/admin/updateProfessional'); ?>" method="post">

    <h1 class="title">Inserir Profissional</h1>
    <div class="row">
        <div class="col-md-12 text-center">
          <?php
            if($this->session->flashdata('updatePro') == true){
             echo "<div class='alert alert-success text-center' style='margin-top:10px' role='alert'> Atualizado com Sucesso !</div>";
            }
          ?>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $profile['id'];?>">
    <div class="row">
        <div class="col-md-4">
            Nome:<input name = "name" type="text" class="form-control" value="<?php echo $profile['nome']?>" required>
        </div>
        <div class="col-md-6">
            Email: <input name="email" type="email" class="form-control" value="<?php echo $profile['email']?>"  required>
        </div>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-md-3">
            Telefone: <input name="phone" type="text" class="form-control" value="<?php echo $profile['telefone']?>">
        </div>
        <div class="col-md-4 col-md-offset-1">
            Profissão: 
            <select name="profession" id="" class="form-control" required>
                 <?php 
                
                    while($p = $professions->result_id->fetch_assoc()){
                        if($profile['area_id'] == $p['id']){
                           echo "<option value=".$p['id']." selected>".$p['nome']."</option>";
                        }else{
                           echo "<option value=".$p['id'].">".$p['nome']."</option>";
                        }
                        
                    }
                                   
                ?>
            </select>
        </div>
        <div class="col-md-3">
            Cidade:
            <select name="city" id="" class="form-control" required>             
                <?php 
                    
                    while($city = $cities->result_id->fetch_assoc()){
                         if($profile['cidade_id'] == $city['id']){
                              echo "<option value=".$city['id']." selected>".$city['nome']."</option>";
                         }else{
                             echo "<option value=".$city['id'].">".$city['nome']."</option>";
                         }
                         
                    }                   
                ?>
            </select>
        </div>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-md-5 ">
           Descrição: <textarea name="description" class="form-control" name="" id="" cols="30" rows="10"  style="padding:0;"required>
           <?php echo $profile['descricao'] ?>
           </textarea>
        </div> 
        <div class="col-md-3 text-center">
            <input style="margin-top:30px;" value="Atualizar" class="btn btn-primary" type="submit">
        </div>
    </div>
    
</form>
