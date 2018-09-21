 <div class="col-md-4">


       
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                       
                       <form action="search.php" method="post">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name='submit'>
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        </form> <!-- search form ends -->
                    </div>
                    <!-- /.input-group -->
                </div>

                    <!-- Blog Search Well -->
                <div class="well">
                    <h4>Login</h4>
                    
                       
                       <form action="includes/login.php" method="post">
                        <div class="form-group">
                        
                        <input type="text" class="form-control" name="username" placeholder="Enter Username">
                    </div>
                     <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name='login'>Login
                               
                        </button>
                        </span>
                        </form> <!-- search form ends -->
                    
                    <!-- /.input-group -->
                </div>

                  <?php

                    $query="SELECT * FROM categories";
                    $select_categories_sidebar=mysqli_query($connection,$query);

                    

                    ?>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                              
                               <?php
                                while($row=mysqli_fetch_assoc($select_categories_sidebar))
                    {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
<!--
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
-->
                        <!-- /.col-lg-6 -->
                          </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>