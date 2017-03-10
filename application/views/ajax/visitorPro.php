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
                <th>Cidade</th>
                <th>Telefone</th>
                <th>Email</th>
                
            </tr>

            <?php 
               
                while($dados = $data->fetch_assoc()){
                    
                    echo "<tr>";
                    echo "  <td><a href='".base_url('home/professional/'.$dados['id'])."'>".$dados['nome']."</a></td>";
                    echo "  <td>".$dados['profissao']."</td>";
                    echo " <td>".$dados['cidade']."</td>";
                    echo " <td>".$dados['telefone']."</td>";
                    echo " <td>".$dados['email']."</td>";
                    echo "</tr>";
                }

            ?>
        </table>
        <?php 
    }
    ?>