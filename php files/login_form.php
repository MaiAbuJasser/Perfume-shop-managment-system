<?php
$conn = mysqli_connect('localhost','root','','myaroma');
session_start();
if (isset($_POST['submit'])) {
     $email=mysqli_real_escape_string($conn,$_POST['useremail']);
    $name=mysqli_real_escape_string($conn,$_POST['username']);
    $pass=($_POST['password']);
    $select=" SELECT * from users where email='$email' && name= '$name' && password= '$pass'";
    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0 ){
        $_SESSION['useremail']=$email;
        header ('location:home.php');
    }else{
       
              $error[]='incorrect name or password';
        }
         
    }
       

?>


<head>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
     <div class ="sign-in-form">
<form action="" method="post">
    <h1>Sign in Now</h1>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
   
                
<input type="email" name="useremail" placeholder="Your email" class="input-box" required>            
<input type="name" name="username" placeholder="Your Name" class="input-box" required>
<input type="password" name="password" placeholder="Your Password" class="input-box" required>

<input type="submit" value="Sign in" name="submit"  class="signup-btn">
                 <p>You Dont have an account?<a href="signup.php">Sign Up</a> </p>
         </form> 
            </div>

    
</body>
