 
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
                                        <div class="row" style="color: white;text-align: center;margin: auto;"> <a href="satislar.php"style="margin: auto;color: white;">Satışlar</a></div>  
                                        <hr>
                                        <div class="row" style="color: white;margin: auto;"><a href="stoklar.php"style="color: white;margin: auto;">Stoklar</a></div>           
                                        <hr>
                                      
    
                                          
                                   </div>                                                   
              </div>
              <div class="col-md-9">
                           <div class="row" >
                                <div class="yatay" style="color:white;margin-top: 6% "> 
                                   <div class="row" > 
                                      <div class="col-md-9">
                                                    Hoşgeldiniz <b><?php  echo $_SESSION['emp']; ?></b>
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