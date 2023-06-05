<?php
session_start();

if (!empty($_SESSION['user_name']) || !empty ($_SESSION['admin_name'])) {
   header('location:user_page.php');
}
@include 'config.php';

if(isset($_POST['submit'])){

   $user = mysqli_real_escape_string($conn, $_POST['user']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE user = '$user' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['user'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['user'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>login form</title>

      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css">

   </head>

   <body>
      
      <div class="form-container">
         <form action="" method="post">
            <h3>Login</h3>
            <?php
            if(isset($error)){
               foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
               };
            };
            ?>
            <input type="text" name="user" required placeholder="enter your username">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="register_form.php">register now</a></p>
         </form>

      </div>

   </body>
</html>