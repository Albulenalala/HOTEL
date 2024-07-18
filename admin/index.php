<?php  
session_start();  
if(isset($_SESSION["user"])) {  
    header("location:home.php");  
}  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WELCOME ADMIN & USER</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="icon" type="image/" href="..//images/pabckg.PNG">
</head>

<body>
   
  <div id="clouds">

    <img src="assets/img/1.2.PNG" alt="" style="width:100%;" class="responsive-image">
   
    <div class="container">
    <div class="bottom">
    <h3><a href="../index.php">Hello User/Admin Click here to site</a></h3> 
    </div>
    <div id="login">
      <form method="post">
        <fieldset class="clearfix">
          <p>
            <span class="fontawesome-user"><i class="material-icons">computer</i></span>
            <input type="text" name="user" placeholder="Username" required>
          </p>
          <p>
            <span class="fontawesome-lock"><i class="material-icons">attachment</i></span>
            <input type="password" name="pass" placeholder="Password" required>
          </p>
          <p><input type="submit" name="sub" value="Login"></p>
        </fieldset>
      </form>
    </div>
    
  </div>
  


  <footer>
    <p>© All right reserved || Absolut Technology System 2024 || Albulena Lala</p>
  </footer>
</body>
</html>

<?php
include('db.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($con,$_POST['user']);
    $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
    $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $_SESSION['user'] = $myusername;
        header("location: home.php");
    } else {
        echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
    }
}
?>
