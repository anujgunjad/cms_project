<?php include('../server.php')?>
<?php 
//   Checking For logged in user
include_once "../includes/config.php";
    $database = new Database();
   $db = $database->getConnection();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /cms_project/login.php');
}
//Session User ID Variable
$id = $_SESSION['user_id'];
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

<?php include('user-header.php')?>

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
                    <?php 
                         $stmt = $db->query("SELECT * from basic_details where user_id = '$id'");
                         $num = $stmt->rowCount();
                        
                         if($num > 0)
                        {   
                           $count = 1;
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $states.= " <tr>
                            <th scope='row'>$count</th>
                            <td>".$row['complaint_no']."</td>
                            <td>".$row['ap_name']."</td>
                            <td>
                                <div class='field'>
                                    <a class='btn btn-success' href='update-complaint.php?".$row['complaint_id']."' name='number_form'>Edit</a>
                                    <button type='button' class='btn btn-danger'>Delete</button>
                                </div>
                            </td>
                            </tr>";
                            $count++;
                            }   
                        }
                        
                        echo $states;
                     ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include('user-footer.php')?>
