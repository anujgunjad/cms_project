<?php include('../server.php')?>
<?php 
//   Checking For logged in user
if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /cms_project/login.php');
}
if($_SESSION['role'] != "1")
   {
    header('location: /cms_project/error.php');
   }
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header("location: /cms_project/login.php?logout=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../dependencies/bootstrap/dist/css/bootstrap.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="../dependencies/fontawesome/css/all.css">
    <!--External CSS-->
    <link rel="stylesheet" href="style/userDashStyle.css" />
    <title>CMS | User Dashboard</title>
</head>
<body>


    <div class="main-dash container-fluid">
        <div class="side-bar">

        </div>
        <div class="main-body">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="navbar-brand text-white" href="#">User Dashboard</a>
                    </li>
                </ul>
                <p style="color:#fff" class="pr-2">WELCOME <?php echo $_SESSION['name']?></p>
                
                <a href="user-dashboard.php?logout='1'" >
                    <button type="button" class="btn btn-outline-light">Log Out</button>
                </a>
            </nav>
            <div class="complaint-box p-4">
                <button type="button" onclick="document.location = 'user.php'" class="insert-new btn">
                    Insert New Complaint
                </button>
                <br>
                <table class="table table-bordered mt-4">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Complaint No.</th>
                            <th scope="col">आवेदक</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Random</td>
                            <td>Test</td>
                            <td>
                                <div class="field">
                                    <button class="btn btn-success" name="number_form">Update</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>