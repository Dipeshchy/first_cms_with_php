<?php
include "includes/admin_header.php";


?>

    <div id="wrapper">
        
       

        <!-- Navigation -->
        <?php
        include "includes/admin_navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xl-6">
                           <?php
                                insert_categories();
                            
                            ?>
                           
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title" id="cat-title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                            
                            
                            <form action="" method="post">
                                <div class="form-group">
                                   
                                   
                                   <?php
                                  if(isset($_GET['edit']))
                                    {
                                        $the_edit_cat_id =$_GET['edit'];
                                   $query="SELECT * FROM categories WHERE cat_id = $the_edit_cat_id ";
                                        $select_categories_id=mysqli_query($connection,$query);
                                            while($row=mysqli_fetch_assoc($select_categories_id))
                                {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                            
                                        ?>
                                          <label for="cat-title">Edit Category</label>
                                           <input value="<?php if(isset($cat_title)){ echo $cat_title; }  ?>" type="text" class="form-control" name="cat_title" id="cat-title">    
                                                
                                           <?php }  ?>
                                           
                                           
                                           <?php
                                    // update query  
                                    if(isset($_POST['update_category']))
                                    {
                                    $the_cat_title=$_POST['cat_title'];
                                    
                                    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                                    $update_category_query = mysqli_query($connection,$query);
                                    
                                    }
                                    ?>
                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>
                             <?php  } ?>
                            
                        </div>
                        
                        
                        <div class="col-xl-6">
               <?php

        $query="SELECT * FROM categories";
        $select_categories=mysqli_query($connection,$query);
        ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                              <?php
                                    // Find alll categories query
                                    findAllCategories();
                                ?>
                                
                                <?php
                                    delete_categories();
                                    
                                    ?>
       
                                </tbody>
                            </table>
                        </div>
                        
<!--
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php
        include "includes/admin_footer.php";
        
        
        
        ?>
