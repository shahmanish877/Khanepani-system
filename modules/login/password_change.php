<?php


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


require_once "../../include/connect.php";

        $username = $_POST['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];


        $query = "SELECT * from users where username ='$username'";

        $user_select = mysqli_query($con,$query);

        
        if (mysqli_num_rows($user_select) > 0) {

            $row = mysqli_fetch_assoc($user_select);
            $hash_password = $row['password'];

            if (password_verify($password, $hash_password)) {
                //echo 'Password is valid!';

                $new_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                $update = "UPDATE users SET password='$new_hash'";

                if(mysqli_query($con,$update)){
                    header("location: logout.php");
                }

            } else {
                echo 'Invalid password.';
            }
                        

        }else{
            echo "User not found";
        }
        
?>