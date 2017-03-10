
<div class="container">
   <div class="dash-header"><h1>Gerenciador de Profissionais</h1></div>
    <div class="row">
        <div class="col-md-4 visitor-card" style="margin-top:30px;overflow-y:scroll;height:400px;">
            <table class="table ">
                <tr>
                    <th>Area</th>
                    <th>Profissôes cadastradas</th>
                </tr>
       
               <?php foreach($areas as $area){
                echo "<tr>";
                echo "<td><a href='".base_url('/Home/page/'.$area['id'])."'>".$area['nome']."</a></td>"; 
                echo "<td>".$area['areas']."</td>";
                echo "</tr>";
                }
            ?>
            
            </table>
        </div>
        <div class="col-md-7 visitor-card col-md-push-1" style="margin-top:30px;overflow-y:scroll;height:400px;">
            <h1 class="text-center">Pesquisar Profissional</h1>
            <div class="row">
                <div class="col-md-12 text-center" style="margin-top:20px">
                    <input type="text" id="searchInput" placeholder="Pesquisa" style="color:black"><button id="btnSearch" style="color:black"><span class="glyphicon glyphicon-search"></span></button>
                </div>
            </div>
            <p id="output" style="color:black;"></p>
                <script>
                    $('#btnSearch').click(function(){
                        var name = $('#searchInput').val();

                        var xhttp = new XMLHttpRequest();
                          xhttp.onreadystatechange = function() {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                             document.getElementById("output").innerHTML = xhttp.responseText;
                            }
                          };
                          xhttp.open("GET", "<?php echo base_url('Welcome/getPros') ?>?name="+name, true);
                          xhttp.send();
                     });
                </script>


        </div> 
    </div>
</div>