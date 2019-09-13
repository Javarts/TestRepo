<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>E-mail</th>
            <th>Passport</th>
            <th>Role</th>
            <!-- <th>Date</th>  -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        $get_allUsers = mysqli_query($connect, "SELECT * FROM users");
        $num = 1;
        while ($row = mysqli_fetch_assoc($get_allUsers)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        ?>
        <tr> 
            <td><?php echo $num++; ?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $user_firstname; ?></td>
            <td><?php echo $user_lastname; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_image; ?></td>
            <td><?php echo $user_role; ?></td>
            <td width="150">
                <a href="users.php?admin=<?php echo $user_id ?>" class="btn btn-success btn-xs">Admin</a>
                <a href="users.php?suscriber=<?php echo $user_id ?>" class="btn btn-warning btn-xs">Suscriber</a>
                <a href="users.php?source=edit-user&UID=<?php echo $user_id ?>" class="btn btn-primary btn-xs">Edit</a>
                <a href="users.php?delete_user=<?php echo $user_id ?>" class="btn btn-danger btn-xs">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php
        
     // UNAPPROVE COMMENT
     if (isset($_GET['admin'])) {
         $role_admin = $_GET['admin'];

        $role_admin_query = mysqli_query($connect, "UPDATE users SET user_role = \"admin\" WHERE user_id = $role_admin");
        if ($role_admin_query) {
            header("Location: users.php");  
        }
    } 

    // APPROVE COMMENT
    if (isset($_GET['suscriber'])) {
        $role_suscriber = $_GET['suscriber'];
 
        $role_suscriber_query = mysqli_query($connect, "UPDATE users SET user_role = \"suscriber\" WHERE user_id = $role_suscriber");
        if ($role_suscriber_query) {
            header("Location: users.php");  
        }
    } 


    
    if (isset($_GET['delete_user'])) {
        $delete_user_id = $_GET['delete_user'];

        $Query_delete_user = mysqli_query($connect, "DELETE FROM users WHERE user_id = $delete_user_id ");
        if ($Query_delete_user) {
            header("Location: users.php");  
        }
    }
    
 ?>