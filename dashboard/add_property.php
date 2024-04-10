<?php
require "header.php";

$msg = "";

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $bedrooms = $_POST['bedroom'];
    $bathrooms = $_POST['bathroom'];
    $price = $_POST['price'];
    $images = $_FILES['images'];

    ////validations///

    if(strlen(trim($title)) > 1){
        if(strlen(trim($description)) > 10){

            if($bedrooms > 0){

                if($bathrooms > 0){

                    $image_names =  array();

                    foreach ($_FILES['images']['tmp_name'] as $key => $value){
                        $image_name = $_FILES['images']['name'][$key];

                        array_push($image_names,$image_name);
                        

                        move_uploaded_file($_FILES['images']["tmp_name"][$key],"../uploaded/images/".$image_name);
                        



                    }

                    $image_names_serilized = serialize( $image_names );


                    $sql = "INSERT INTO properties(title,description,bed,bath,images,user_id,price)
                    values('$title','$description','$bedrooms','$bathrooms','$image_names_serilized','$user_id','$price')";


                    $exc_add_property = mysqli_query($conn,$sql);

                    if($exc_add_property){

                        $msg = "successfully submited";
                    }else{
                        $msg = "Failed to submit ".mysqli_error($conn);
                    }



                    





                }else{
                    $msg = "bathrooms is too short";
                }


            }else{
                $msg = " bedrooms is too short";
            }


        }else{
            $msg = "description is too short";
        }


    }else{
        $msg = "Tile is too short";
    }
    

}
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   
                    <!-- Topbar Navbar -->
                

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add property</h1>
                        
                    </div>

                    <?= $msg ?>

                  

                    <div class="row">

                    <form method="POST" enctype="multipart/form-data" class="col-8 mx-5">

                    <div class="form-group">
    <label for="title">title:</label>
    <input type="text" class="form-control" placeholder="Enter title" name="title" require>
  </div>
  <div class="form-group">
    <label for="pwd">Bedrooms:</label>
    <input type="number" class="form-control" placeholder="how many bedroom" name="bedroom" require>
    
  </div>
  <div class="form-group">
    <label for="pwd">Bathrooms:</label>
    <input type="number" class="form-control" placeholder="how many bathroom" name="bathroom" require>
    
  </div>
  <div class="form-group">
    <label for="pwd">Description:</label>
    <textarea class="form-control" name="description" require></textarea>
    
  </div>

  <div class="form-group">
    <label for="pwd">price:</label>
    <input type="number" class="form-control" placeholder="price" name="price" require>
    
  </div>

  <div class="form-group">
    <label for="pwd">images:</label>
    <input type="file" class="form-control"  name="images[]" multiple require>
    
    
  </div>

  <div class="form-group">
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>


    
  </div>

                    </form>






                      
                    </div>











                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         <?php
require "footer.php";
         ?>