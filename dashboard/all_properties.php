<?php
require "header.php";


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
                        <h1 class="h3 mb-0 text-gray-800">All property</h1>
                        
                    </div>



                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All property</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>image</th>
                                            <th>bed</th>
                                            <th>bath</th>
                                            <th>date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Title</th>
                                            <th>image</th>
                                            <th>bed</th>
                                            <th>bath</th>
                                            <th>date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php

                                    $sql = "SELECT * FROM properties where user_id = '$user_id'order by id desc";

                                    $exe = mysqli_query($conn,$sql);

                                    $num = mysqli_num_rows($exe);

                                    if($num == 0){
                                        echo "No record found";
                                    }

                                    while($row = mysqli_fetch_array($exe)){

                                        $title = $row['title'];
                                        $description = $row['description'];
                                        $bedrooms = $row['bed'];
                                        $bathrooms = $row['bath'];
                                        $images = unserialize($row['images']);
                                        $date_created = $row['date_created'];

                                        $f_date = date('d M Y',strtotime($date_created));



                                        ?>

                                    <tr>
                                            <td><?=$title ?></td>
                                            <td><img src="../uploaded/images/<?=$images[0] ?>" height="100"></td>
                                            <td><?=$bedrooms ?></td>
                                            <td><?=$bathrooms ?></td>
                                            <td><?=$f_date ?></td>
                                            
                                        </tr>


                                        <?php } ?>









                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                   











                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         <?php
require "footer.php";
         ?>