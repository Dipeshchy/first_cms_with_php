
<?php
if(isset($_POST['create_user']))
{

    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $username = $_POST['username'];
    
    $user_role = $_POST['user_role'];
    
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;
    
    move_uploaded_file($user_image_temp, "../images/$user_image");
    
    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email , user_image, user_role) ";
    $query .= "VALUES('{$username}',' {$user_password}', '{$user_firstname}' , '{$user_lastname}','{$user_email}', '{$user_image}' , '{$user_role}' ) ";
    
    $add_user_query = mysqli_query($connection , $query);
    
  confirmQuery($add_user_query);

  echo "User created"." "."<a href='users.php'>View Users</a>";
    
}


?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" id="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="user_lastname">
    </div>
    
    
    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    
    
    
    <br>
    <div class="form-group">
        <label for="user_image">User Image</label>

        <input type="file" name="user_image" id="user_image">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" id="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" id="user_password">
            
    </div>
    
  <!--   <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>
     -->
    <div class="form-group">
        
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
    
</form>