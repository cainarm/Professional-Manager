 <h1>Gerenciar Profissionais</h1>
 <div class="row">
      <?php 
        if($this->session->flashdata('deletePro') == true){
             echo "<div class='alert alert-success text-center' style='margin-top:10px' role='alert'>Deletado com sucesso ! ";
        }   

    ?>
 </div>

<div class="row">
    <div class="col-md-12 text-center">
        <input type="text" id="searchInput" placeholder="Pesquisa"><button id="btnSearch" ><span class="glyphicon glyphicon-search"></span></button>
    </div>
</div>
<p id="output"></p>
<script>
    $('#btnSearch').click(function(){
        var name = $('#searchInput').val();
        
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
             document.getElementById("output").innerHTML = xhttp.responseText;
            }
          };
          xhttp.open("GET", "<?php echo base_url('admin/getPros') ?>?name="+name, true);
          xhttp.send();
       
     });
</script>

