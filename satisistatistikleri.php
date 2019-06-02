
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

//----------------------şube 1 in 2018 yılındaki satış toplamı
$sql = "SELECT SUM(price) as price
FROM  soldproducts
WHERE SID = 1 and yıl='2018'";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s1y2018 =  $row['price'];

//----------------------şube 2 in 2018 yılındaki satış toplamı
$sql = "SELECT SUM(price) as price
FROM  soldproducts
WHERE SID = 2 and yıl='2018'";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s2y2018 =  $row['price'];

//----------------------şube 3 ün 2018 yılındaki satış toplamı
$sql = "SELECT SUM(price) as price
FROM  soldproducts
WHERE SID = 3 and yıl='2018'";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s3y2018 =  $row['price'];


//----------------------2018 yılındaki şubelerin satışları arrayda tutuluyor chart fonksiyonu kullancak aşağıda
$y2018=[$s1y2018,$s2y2018,$s3y2018];
//----------------------



//hoşgeldin 2019---------------------------------------------------------
//----------------------şube 1 in 2018 yılındaki satış toplamı
$sql = "SELECT SUM(price) as price
FROM  soldproducts
WHERE SID = 1 and yıl='2019'";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s1y2019 =  $row['price'];

//----------------------şube 2 in 2019 yılındaki satış toplamı
$sql = "SELECT SUM(price) as price
FROM  soldproducts
WHERE SID = 2 and yıl='2019'";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s2y2019 =  $row['price'];

//----------------------şube 3 ün 2019 yılındaki satış toplamı
$sql = "SELECT SUM(price) as price
FROM  soldproducts
WHERE SID = 3 and yıl='2019'";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result); 

$s3y2019 =  $row['price'];



//----------------------2019 yılındaki şubelerin satışları arrayda tutuluyor chart fonksiyonu kullancak aşağıda
$y2019=[$s1y2019,$s2y2019,$s3y2019];
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
                                        <div class="row" style="background-color:red;color: white;margin: auto;"><a href="satisistatistikleri.php"style="color: white;margin: auto;">Satış İstatistikleri</a></div>           
                                        <hr>
                                        <div class="row" style="color: white;margin: auto;"><a href="stokistatistikleri.php"style="color: white;margin: auto;">Toplam Gider İstatistikleri</a></div>           
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
                                 <canvas id="myChart2018" style="height: 200px;"></canvas>
                          </div>
						  

              </div>

		</div>
    </div>
</div>






<script>
window.onload = function () {
	
var ctx = document.getElementById("myChart2018").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["İzmir","Denizli","Aydın"],
        datasets: [{
            label: '2018 Yılı', // Name the series
            data:  <?php echo json_encode($y2018, JSON_NUMERIC_CHECK); ?>, // Specify the data values array
            fill: false,
            borderColor: 'orange', // Add custom color border (Line)
            backgroundColor: 'orange', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
                  {
            label: '2019 Yılı', // Name the series
            data: <?php echo json_encode($y2019, JSON_NUMERIC_CHECK); ?>, // Specify the data values array
            fill: false,
            borderColor: 'red', // Add custom color border (Line)
            backgroundColor: 'red', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        }]
    },
    options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});




}



</script>

<script src="Chart.min.js" type="text/javascript"></script>
