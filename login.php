<?php
session_start();

require "header.php";



$msg = "";

if(isset($_POST['login'])){

    

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

$sql_check = "SELECT * FROM users WHERE email = '$email'";

$check_exec = mysqli_query($conn,$sql_check);
$num = mysqli_num_rows( $check_exec);

if($num == 1){

  $current_user = mysqli_fetch_assoc($check_exec);

  if(password_verify($password,$current_user['password'])){


    
  $_SESSION['user_id'] = $current_user['id'];
  $_SESSION['email'] = $current_user['email'];

  

 

  $msg = "successfully regisered";

 // header("Locaion:dashboard");
 echo "<script>
 window.location.href = 'dashboard';
 </script>";



  }else{
    $msg = "Incorect cresidential";

  }

  

}else{
  $msg = "Incorect cresidential";
}

}

?>

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_1.jpg'); height:50px"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Login</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                Login
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
      <b style="color:red"><?php echo $msg ?></b>
        <div class="row">
          
          <div class="col-lg-8 m-auto" data-aos="fade-up" data-aos-delay="200">
            <form method="POST">
              <div class="ro">
                <div >
                <div class="col-6 mb-3 ">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Your Name"
                    style="opacity:0%"
                    
                  />
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Your Name"
                    style="opacity:0%"
                    
                  />
                </div>
</div>
               
                <div class="row">
                
               
                
                
                <div class="col-12 mb-3">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    name="email"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="password"
                    name="password"
                  />
                </div>
                <div class="col-12 mb-3">
                
                

                <div class="col-12">
                  <input
                    type="submit"
                    value="Send Message"
                    class="btn btn-primary"
                    name="login"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.untree_co-section -->

    <?php

    require "footer.php";

    ?>