
<div class="container">
   <div class="dash-header"><h1>Gerenciador de Profissionais</h1></div>
    <div class="row">
        <div class="col-md-12 visitor-card" style="margin-top:30px;overflow-y:scroll;height:400px;">
            <h1>Profissionais</h1>
            <table class="table">
               <tr>
                   <td>Nome</td>
                   
               </tr>
                <?php 
                    foreach($data as $pro){
                            echo "<tr>
                            <td style='font-size:20px; margin-top:30px'><a href='".base_url('/Home/professional/'.$pro['id'])."'>".$pro['nome']."</a></td></tr>";                
        
                    }
                ?>
            </table>
        </div> 
    </div>
</div>