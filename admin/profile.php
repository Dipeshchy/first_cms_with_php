<?php
include "includes/admin_header.php";


?>

<?php 

if(isset($_SESSION['username']))
{
    $username= $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection,$query);

    while ($row=mysqli_fetch_assoc($select_user_query)) {
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    }
}
 ?>



 <?php

if(isset($_POST['edit_user']))
{

    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $username = $_POST['username'];
    
    $user_role = $_POST['user_role'];
    
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
    
    move_uploaded_file($user_image_temp, "../images/$user_image");

      if(empty($user_image))
    {
        $query = "SELECT * users WHERE username= '{$username}' ";
        $select_image=mysqli_query($connection,$query);
        if(!$select_image)
        {
            die("Error".mysqli_error($connection));
        }
        else{
        while($row=mysqli_fetch_array($select_image))
        {
            $user_image=$row['user_image'];
        }
    }
    
    $query = "UPDATE users SET username='{$username}' , user_password = ' {$user_password}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_email='{$user_email}' , user_image='{$user_image}', user_role='{$user_role}' ";
    $query .= " WHERE username= '{$username}' ";

    $edit_user_query = mysqli_query($connection , $query);
     confirmQuery($edit_user_query);

     header("Location: profile.php");
    
}
}



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
                        
                       <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname" id="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname" id="user_lastname">
    </div>
    
    
    <div class="form-group">
        <select name="user_role" id="">
            <option value='subscriber'><?php echo $user_role; ?></option>
            <?php
             if($user_role=='Admin')
             {
                echo "<option value='subscriber'>Subscriber</option>";
             } 
             else if($user_role=='Subscriber')
             {
                echo "<option value='admin'>Admin</option>";
             }

            
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input value='<?php echo $username; ?>' type="text" class="form-control" name="username" id="username">
    </div>
    
    
    
    <br>
    <div class="form-group">
        <label for="user_image">User Image</label>
        <img width="100px" height="100px" src="../images/<?php echo $user_image; ?>">
        <input type="file" name="user_image" id="user_image">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email" id="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password" id="user_password">
            
    </div>
    
  <!--   <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>
     -->
    <div class="form-group">
        
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>  
</form>
                        
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
