<?php
$conn = mysqli_connect('localhost','root','','myaroma');
session_start();
if (isset($_POST['submit'])) {
    $name=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['useremail']);
    $pass=($_POST['password']);
    $cpass=($_POST['cpassword']);
   

    
    $select=" SELECT * from users where name= '$name' && password=' $pass'";
     $select1=" SELECT * from users where name= '$name' ";
    $result=mysqli_query($conn,$select);
    $result1=mysqli_query($conn,$select1);
    if(mysqli_num_rows($result)>0 || mysqli_num_rows($result1)>0 ){
        $error[]='user already exists';
    }
    else{
        if($pass!=$cpass){
              $error[]='password not matched!';
        }
        else{
            $insert="INSERT INTO users(email,name,password) values ('$email','$name','$pass')";
            mysqli_query($conn,$insert);
            header ('location:home.php');
            
        }
    }
       
}
?>


<head>
    <link rel="stylesheet" href="./signup.css">
</head>
<body>
        <div class ="sign-up-form">
<form action="" method="post">
       <h1>Sign Up Now</h1>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>

             
 <input type="email" name="useremail" placeholder="Your Email" class="input-box" required>        
<input type="name" name="username" placeholder="Your Name" class="input-box" required>
<input type="password" name="password" placeholder="Your Password" class="input-box" required>
    <input type="password" name="cpassword" placeholder="Re-enter Password" class="input-box" required>
<input type="submit" value="Sign up" name="submit" class="signup-btn">   
                 <p>already have an account ?<a href="login_form.php">Sign in</a> </p>
        </form>
            </div>

     
</body>
