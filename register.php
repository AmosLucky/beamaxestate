<?php
session_start();


require "header.php";

$fullname = "";
$username = "";
$email = "";
$msg = "";

if(isset($_POST['register'])){

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

$msg = "";

if(strlen(trim($fullname)) > 0){

    if(strlen(trim($username)) > 0){
      if(strlen(trim($password)) > 5){


        if(filter_var($email,FILTER_VALIDATE_EMAIL)){

          ////form validated

          $sql_check = "SELECT * FROM users WHERE email = '$email' or username = '$username'";

          $check_exec = mysqli_query($conn,$sql_check);
          $num = mysqli_num_rows( $check_exec);

          if($num == 0){


          $password = password_hash($password,PASSWORD_DEFAULT);

          $register_query = "INSERT INTO users (fullname,username,email,password)
          values('$fullname','$username','$email','$password')";

          $exc = mysqli_query($conn,$register_query);

          if($exc){

            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['email'] = $email;

            

           

            $msg = "successfully regisered";

           // header("Locaion:dashboard");
           echo "<script>
           window.location.href = 'dashboard';
           </script>";

            mail($email,"BeamaxEstate","welcome to beamax estate");

          }else{

            $msg = "An error occoured ".mysqli_error($conn);

          }


        }else{

          $msg = "a user wih this email or username already exists";

        }


        }else{
            $msg = "invalid email";
        }


      }else{
        $msg = "password must be greater than 5 xters";
    }


    }else{
        $msg = "username is oo short";
    }


}else{
    $msg = "full name is oo short";
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
            <h1 class="heading" data-aos="fade-up">Register</h1>

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
                  Regiser
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
                
               
                
                <div class="col-12 mb-3  ">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="fullname"
                    name="fullname"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="username"
                    name="username"
                  />
                </div>
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
                    name="register";
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