 
<?php 

   session_start();

if ( isset( $_SESSION['admin'] ) ) {
      
    
} else {
    // Redirect them to the login page
    header("Location: loginAdmin.php");
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
    background-color: #1d3048;
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
                                        <div class="row" style="color: red;margin: auto;"><a href="satisistatistikleri.php"style="color: white;margin: auto;">Satış İstatistikleri</a></div>           
                                        <hr>
                                        <div class="row" style="color: red;margin: auto;"><a href="stokistatistikleri.php"style="color: white;margin: auto;">Toplam Gider İstatistikleri</a></div>           
                                        <hr>
                                          
                                   </div>                                                   
              </div>
              <div class="col-md-9">
                           <div class="row" >
                                <div class="yatay" style="color:white;margin-top: 6% "> 
                                   <div class="row" > 
                                      <div class="col-md-9">
                                                  <span>EGE BOLGE SORUMLUSU</span>
                                                    Hoşgeldiniz <b><?php  echo $_SESSION['admin']; ?></b>
                                      </div>        
                                      <div class="col-md-3">
                                                   <a href="logout.php" class="btn btn-danger" style="margin-left: 2%; ">Logout</a> 
                                      </div>     
                                                                            
                                  </div>  
                                </div>
                           </div>
                          




                          

              </div>




      </div>
    </div>
</div>
<script type="text/javascript">
  
$('#logo').click(function(){
   window.location.href='index.php';
})



</script>