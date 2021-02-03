<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
       
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" /> 

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 550px; padding: 20px; display: block; margin: auto; }
    </style>


        <title>Password Change</title>
    </head>


<body>


  <?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
      
    <div class="wrapper">
        <h2>Change Password</h2>
        <br>


     <form onsubmit="return password_match();" method="POST"  action="password_change.php" >


          <div class="form-group">
              <label>Username</label>
              <input type="username"  class="form-control" size="10" name="username" autocomplete="off" required>
          </div>

          <div class="form-group">
              <label>Enter your existing password:</label>
              <input type="password"  class="form-control" size="10" name="password" required>
          </div>

          <div class="form-group">

              <label> Enter your new password: </label> 
              <input type="password"  class="form-control"  id="password" size="10" name="newpassword" required>
         
          </div>



          <div class="form-group">

              <label> Confirm your new password: </label>
             <input type="password"  class="form-control"  id="newpassword" size="10" name="confirmnewpassword" required>
          </div>
          

          <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Password">

                <a href="login.php" class="btn btn-danger" >Cancel</a> 
            </div>


        </form>


  

    </div>
</body>


<script>
  function password_match(){
    var password = document.getElementById('password').value;
    var newpassword = document.getElementById('newpassword').value;

    
    if(password==newpassword){
        if(password.length<6 || newpassword.length<6){ 

            alert('Password must be of minimum 6 length.');
            return false;

        }

        return true;
    }else{
        alert('Confirm password does not match');
        return false;
      }
    
   
  }
</script>

</html>

