
<?php
// You'd put this code at the top of any "protected" page you create
   session_start();

// Always start this first
if ( isset( $_SESSION['admin'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: loginAdmin.php");
}
   include("config.php");

//----------------------şube 1 in 
$sql = "SELECT SUM(StokSayısı) as StokSayısı
FROM  product
WHERE SID = 1 ";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s1stok =  $row['StokSayısı'];

//----------------------şube 2 in 
$sql = "SELECT SUM(StokSayısı) as StokSayısı
FROM  product
WHERE SID = 2 ";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s2stok =  $row['StokSayısı'];

//----------------------şube 3 ün 
$sql = "SELECT SUM(StokSayısı) as StokSayısı
FROM  product
WHERE SID = 3 ";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s3stok =  $row['StokSayısı'];


//----------------------
$stoklar=[$s1stok*2,$s2stok,$s3stok*40];
//----------------------

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
                                        <div class="row" style="color: white;margin: auto;"><a href="satisistatistikleri.php"style="color:white;margin: auto;">Satış İstatistikleri</a></div>           
                                        <hr>
                                        <div class="row" style="background-color: red;color: white;margin: auto;"><a href="stokistatistikleri.php"style="color: white;margin: auto;">Toplam Gider İstatistikleri</a></div>           
                                        <hr>
                                          
                                   </div>                                                  
              </div>
              <div class="col-md-9">
                           <div class="row" >
                                <div class="yatay" style="color:white;margin-top: 6% "> 
                                   <div class="row" > 
                                      <div class="col-md-9">
                                                  <span>EGE BÖLGE SORUMLUSU</span>
                                                    Hoşgeldiniz <b><?php  echo $_SESSION['admin']; ?></b>
                                      </div>        
                                      <div class="col-md-3">
                                                   <a href="logout.php" class="btn btn-danger" style="margin-left: 2%; ">Logout</a> 
                                      </div>     
                                                                            
                                  </div>  
                                </div>
                           </div>
                          <div class="row" style="background-color: #d4dbe2;margin-top: 4%; margin-left: auto;margin-right: auto; width:90%;">
                                 <canvas id="stkchrt" style="height: 200px;"></canvas>
                          </div>


              </div>




      </div>
    </div>
</div>






<script>
window.onload = function () {
	
var ctx = document.getElementById("stkchrt").getContext('2d');


 var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["AYDIN","DENİZLİ","İZMİR"],
            datasets: [{
                label: 'Toplam Gider',
                data: <?php echo json_encode($stoklar, JSON_NUMERIC_CHECK); ?>,
				borderColor: 'green',
				backgroundColor: 'green',
            }]
        },
    });


}



</script>




<script src="Chart.min.js" type="text/javascript"></script>
