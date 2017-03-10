 <h1>Gerenciar Usuarios</h1>
 <div class="row">
      <?php 
        if($this->session->flashdata('deleteUser') == true){
             echo "<div class='alert alert-success text-center' style='margin-top:10px' role='alert'>Deletado com sucesso ! ";
        }   
    ?>
 </div>

<?php 
    if($data->num_rows == 0){
        echo "<div style='margin-top:40px' class='text-center'><h1>Não há registros no banco</h1></div>";
    }
    else{
        ?>
       
        <table style="margin-top:10px" class="table table-bordered">
            <tr>
                <th>Login</th>
                <th>Nivel de Acesso</th>
                <th colspan="2">Ações</th>
            </tr>

            <?php 
               
                while($dados = $data->fetch_assoc()){
                    
                    echo "<tr>";
                    echo "  <td><a>".$dados['login']."</a></td>";
                    echo "  <td>".$dados['level']."</td>";
                    echo "  <td class='text-center'><a href='".base_url('/admin/dashboard/user/update/'.$dados['id'])."'> <span style='font-size:17px;color:#343eb9' class='glyphicon glyphicon-pencil'></span></a></td>";
                    echo "  <td class='text-center'><a href='".base_url('/admin/deleteUser/'.$dados['id'])."'><span style='font-size:17px;color:#de1010' class='glyphicon glyphicon-trash'></span></a></td>";
                    echo "</tr>";
                }

            ?>
        </table>
        <?php 
    }
    ?>