<?php
   include("config.php");
   session_start();
   $error ="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
     
      $sql = "SELECT * FROM   employee 
              WHERE  employee.username = '$myusername' and employee.password = '$mypassword'
      ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
       
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['emp'] = $_POST['username'];
         $_SESSION['empID'] = $_POST['password'];
         $_SESSION['SID']=$row['shopID'];
         header("location: index.php");
      }else {
         $error = "Kullanıcı Adı veya Şifre Yanlış";
      }
   }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="card">
        <h4 class="card-header">GİRİŞ</h4>
        <div class="card-body">
          <div class="alert alert-danger" style="display: none;" role="alert">
            Kullanıcı Adı Şifre yanlış
          </div>
          <form data-toggle="validator" role="form" method="post" action="#">
            <input type="hidden" class="hide" id="csrf_token" name="csrf_token" value="C8nPqbqTxzcML7Hw0jLRu41ry5b9a10a0e2bc2">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kullanıcı Adı </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="form-control" name="username" required="Bu alan zorunludur">
                  </div>
                  <div class="help-block with-errors text-danger"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Şifre</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" required="">
                  </div>
                  <div class="help-block with-errors text-danger"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="checkbox checkbox-primary">
                <input id="checkbox_remember" type="checkbox" name="remember">
                <label for="checkbox_remember"> Beni Hatırla</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" name="redirect" value="">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Giriş" name="submit">
              </div>
            </div>
          </form>
         
      </div>
    </div>
  </div>


  <style type="text/css">
    .checkbox {
  padding-left: 20px;
}

.checkbox label {
  display: inline-block;
  position: relative;
  padding-left: 5px;
}

.checkbox label::before {
  content: "";
  display: inline-block;
  position: absolute;
  width:17px;
  height: 17px;
  left: 0;
  margin-left: -20px;
  border: 1px solid #cccccc;
  border-radius: 3px;
  background-color: #fff;
  -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
  -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
  transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
}

.checkbox label::after {
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  top: 0;
  margin-left: -20px;
  padding-left: 3px;
  padding-top: 1px;
  font-size: 11px;
  color: #555555;
}

.checkbox input[type="checkbox"] {
  opacity: 0;
}

.checkbox input[type="checkbox"]:focus+label::before {
  /*outline: thin dotted;
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px; */
}

.checkbox input[type="checkbox"]:checked+label::after {
  font-family: 'FontAwesome';
  content: "\f00c";
}

.checkbox input[type="checkbox"]:disabled+label {
  opacity: 0.65;
}

.checkbox input[type="checkbox"]:disabled+label::before {
  background-color: #eeeeee;
  cursor: not-allowed;
}

.checkbox.checkbox-circle label::before {
  border-radius: 50%;
}

.checkbox.checkbox-inline {
  margin-top: 0;
}

.checkbox-primary input[type="checkbox"]:checked+label::before {
  background-color: #428bca;
  border-color: #428bca;
}

.checkbox-primary input[type="checkbox"]:checked+label::after {
  color: #fff;
}

.checkbox-danger input[type="checkbox"]:checked+label::before {
  background-color: #d9534f;
  border-color: #d9534f;
}

.checkbox-danger input[type="checkbox"]:checked+label::after {
  color: #fff;
}

.checkbox-info input[type="checkbox"]:checked+label::before {
  background-color: #428BCA;
  border-color: #428BCA;
}

.checkbox-info input[type="checkbox"]:checked+label::after {
  color: #fff;
}

.checkbox-warning input[type="checkbox"]:checked+label::before {
  background-color: #f0ad4e;
  border-color: #f0ad4e;
}

.checkbox-warning input[type="checkbox"]:checked+label::after {
  color: #fff;
}

.checkbox-success input[type="checkbox"]:checked+label::before {
  background-color: #5cb85c;
  border-color: #5cb85c;
}

.checkbox-success input[type="checkbox"]:checked+label::after {
  color: #fff;
}
  </style>