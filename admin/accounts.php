<?php include("header.php")?>
<?php include("sidenav-header.php")?>
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head">Accounts Panel</h1>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link admin-name" href="#">WELCOME <?php echo $_SESSION['name']?><span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
            <a href="dashboard.php?logout='1'" >
              <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Log Out</button>
            </a>
        </nav>

 <div class="container pt-4">
 <form method="post" action="accounts.php" class="ui form">
    <?php include('errors.php'); ?>
    <div class="fields">
      <div class="six wide field mt-1">
        <label class="account-form-label">Employee ID</label>
        <input placeholder="Employee ID" name="eid" type="text" required>
      </div>
      <div class="six wide field mt-1">
        <label class="account-form-label">Role</label>
            <select class="ui fluid dropdown" name="role" required>
                <option value="">Role</option>
                <option value="0">Admin</option>
                <option value="1">User</option>
            </select>
      </div>
      <div class="field">
		  <button id="insert-btn" type="submit" class="ui button" id="insert-id" name="insert_eid">Insert</button>
	  </div>
    </div>
</div>
</form>
<div class="container-four ml-3 mr-5">
    <table style="width:61vw" class="ui celled table">
                <thead>
                    <tr id="table-head">
                        <th scope="col" >Empolyee ID</th>
                        <th scope="col">Role</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            $sql = "SELECT * FROM `verify_eid` WHERE 1";
            $result = $db-> query($sql);
            if($result-> num_rows > 0){	
                while ($row = $result-> fetch_assoc()) {
                    if ($row["role"] == 0) {
                        $role = "Admin";
                    } else {
                        $role = "User";
                    }
                    
                    echo "<tr><td>".$row["eid"]."</td><td>".$role."</td>
                    <td>
                    <form method='post' action='accounts.php' class='ui form delete'>
                                <button style='background-color:004BA8; color: #fff' onclick='return checkDelete()' type='submit' name='delete_two' value='".$row['id']."' id='delete' class='ui button delete'>
                                    Delete <i class='fa fa-trash ml-1' aria-hidden='true'></i>
                                </button>
                            </form>   
                    </td>
                    </tr>";
                }
            }
        ?>
                </tbody>
            </table>
</div>
 </div>
</div>
<?php include("sidenav-footer.php")?>
<?php 
   if (isset($_POST['insert_eid'])) {
    // receive all input values from the form
    $eid = mysqli_real_escape_string($db, $_POST['eid']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM `verify_eid` WHERE `eid`='$eid' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['eid'] === $eid) {
        array_push($errors, "Employee ID already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO `verify_eid` ( `eid`, `role`) 
                  VALUES('$eid', '$role')";
        mysqli_query($db, $query);
    }
    header("Refresh:0");
  }
  if(isset($_POST['delete_two'])) 
  {    
    $id = mysqli_real_escape_string($db, $_POST['delete_two']);
    $id=number_format($id);
    $query = "DELETE FROM `verify_eid` WHERE `id` = $id";
    mysqli_query($db, $query);
  }  
?>
 <?php include("footer.php")?>