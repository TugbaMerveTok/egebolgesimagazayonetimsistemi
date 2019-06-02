
<?php 

   session_start();

if ( isset( $_SESSION['emp'] ) ) {
    
} else {
    // Redirect them to the login page
    header("Location: login.php");
}



   ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
  body {
  background-color: #F5FFFA;
}
  .yanmenu{
border-radius: 5px;
    border-style: groove;
    background-color:#1d3048;
    border-width: thin;
    padding: 15px;
    margin-top: 20%;
    text-align: center;
    height: 575px;
  }
    .yatay{
border-radius: 5px;
    border-style: groove;
    background-color: #1d3048;
    border-width: thin;
    padding: 15px;
    text-align: center;
           width: 100%;
  }

</style>

<div>
    <div class="container">
          <div class="row">
              <div class="col-md-3">
                         
                                   <div class="yanmenu">
                                        <img id="logo"src="tshirt.svg" style="width: 100px;">
                                        <hr>
                                        <div class="row" style="color: white;background: #1d3048;text-align: center;margin: auto;"> <a href="satislar.php"style="color: white;margin: auto;">Satışlar</a></div>  
                                        <hr>
                                        <div class="row" style="margin: auto;"><a href="stoklar.php"style="color: white;margin: auto;">Stoklar</a></div>           
                                        <hr>
                                       
                                      
                                          
                                          
                                   </div>                                                   
              </div>
              <div class="col-md-9">
                           <div class="row" >
                                <div class="yatay" style="color:white;margin-top: 6% "> 
                                   <div class="row"> 
                                      <div class="col-md-9">
                                                    Hoşgeldiniz <b><?php  echo $_SESSION['emp']; ?></b>
                                      </div>        
                                      <div class="col-md-3">
                                                   <a href="logout.php" class="btn btn-danger" style="margin-left: 2%; ">Logout</a> 
                                      </div>     
                                                                            
                                  </div>  
                                </div>
                           </div>
                           <div class="row">
                                <table class="table" style="margin-top: 5%;background-color: white;">
                                      <thead>
                                         <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Ürün Kodu</th>
                                            <th scope="col">Ürün Adeti</th>
                                            <th scope="col">Toplam Fiyat</th>
                                            <th scope="col">Yıl</th>

                                         </tr>
                                      </thead>
                                      <tbody>
                                        <?php $count=1;
                                               include("config.php");

                                               $SID = mysqli_real_escape_string($db,$_SESSION['SID']);

                                              $sql = "SELECT *
                                              FROM  soldproducts
                                              WHERE SID = '$SID'";

                                               $result = mysqli_query($db,$sql);
                                              if ($result!="") {
                                                  if(mysqli_num_rows($result) > 0 ){
                                                        while ($row = mysqli_fetch_array($result)){
                                                          echo '
                                                   <tr>
                                                      <th scope="row">'.$count.'</th>
                                                       <td>'.$row['PID'].'</td>
                                                       <td>'.$row['quantity'].'</td>
                                                       <td>'.$row['price'].' TL</td>
                                                       <td>'.$row['yıl'].'</td>
                                                   </tr>';                                     

                                                           $count=$count+1; 
                                                         }
                                                   }
                                               }

                                         ?>                                  
                                       </tbody>
                                </table>


                           </div>
                           <div class="row" style="margin-top: 2%;">
                             
                                  <button id="btnEkle" type="button" class="btn btn-primary" data-toggle="modal" data-target="#satisEkletModal">Satış Ekle</button>


                           </div>




                          

              </div>




      </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="satisEkletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="color: black;">
 <form   method="POST">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Satış Ekleme Paneli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="row">
 <div class="col-md-6">         
   <div class="form-group">
      <label for="stokAdetiInput">Ürün Kodu </label>
      <input name="Kod" type="input" class="form-control"  aria-describedby="" placeholder="">
   </div>
 </div>
 <div class="col-md-6">         
   <div class="form-group">
      <label for="stokAdetiInput">Ürün Adedi</label>
      <input name="Adet" type="input" class="form-control"  aria-describedby="" placeholder="">
   </div>
 </div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
        <button id="reload"type="submit" class="btn btn-primary" onclick="reloadPage();">Ekle</button>
</div>
</div>
 </div>
 </form>
</div>
<?php

         if($_SERVER["REQUEST_METHOD"] == "POST") {
              if ( isset( $_POST['Kod'] ) &&isset( $_POST['Adet'] ) ) {
        
    
              
               $kod = mysqli_real_escape_string($db,$_POST['Kod']);
               $adet = mysqli_real_escape_string($db,$_POST['Adet']);
               $d= date("Y");
               $SID = mysqli_real_escape_string($db,$_SESSION['SID']);

                $sql = "SELECT * FROM   product 
              WHERE  PID = '$kod' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $price= $row['price'];
        $stok= $row['StokSayısı'];

        if ($adet<$stok) {
         $totalPrice=$price*$adet;
         $sql="INSERT INTO soldproducts (PID,quantity,yıl,SID,price) VALUES ('$kod','$adet','$d','$SID','$totalPrice') " ;
          $result = mysqli_query($db,$sql);

        }}}
      // If result matched $myusername and $mypassword, table row must be 1 row
  

     ?>
<script type="text/javascript">


$(document).ready(function(){


$('#logo').click(function(){
   window.location.href='index.php';
});

function reloadPage(){
        location.reload(true);
    }

});
</script>