<?php 
    if($data->num_rows == 0){
        echo "<div style='margin-top:40px' class='text-center'><h1>Não há registros no banco</h1></div>";
    }
    else{
        ?>
       
        <table style="margin-top:10px" class="table table-bordered">
            <tr>
                <th>Nome</th>
                <th>Função</th>
                <th>Cidade</th>
                <th colspan="2">Ações</th>
            </tr>

            <?php 
               
                while($dados = $data->fetch_assoc()){
                    
                    echo "<tr>";
                    echo "  <td><a href='".base_url('/admin/dashboard/professional/profile/'.$dados['id'])."'>".$dados['nome']."</a></td>";
                    echo "  <td>".$dados['profissao']."</td>";
                     echo " <td>".$dados['cidade']."</td>";
                    echo "  <td class='text-center'><a href='".base_url('/admin/dashboard/professional/update/'.$dados['id'])."'> <span style='font-size:17px;color:#343eb9' class='glyphicon glyphicon-pencil'></span></a></td>";
                    echo "  <td class='text-center'><a href='".base_url('/admin/deleteProfessional/'.$dados['id'])."'><span style='font-size:17px;color:#de1010' class='glyphicon glyphicon-trash'></span></a></td>";
                    echo "</tr>";
                }

            ?>
        </table>
        <?php 
    }
    ?>
    <script>
        function delete(base){
            r = confirm("deseja deletar este registro ?");
                
            if(r == true){
                location.href=base;
            }
        }
    </script>