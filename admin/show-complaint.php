<?php include("alternate-header.php")?>
<link href="css/sidenav.css" rel="stylesheet" />
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head mt-1 ml-5">Complaint Details</h1>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                <a class="nav-link admin-name" href="#">WELCOME <?php echo $_SESSION['name']?><span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <a href="javascript:history.back()" class="btn my-2 my-sm-0 btn-theme-color px-4 mx-2" type="submit">Back</a>
            <a href="dashboard.php?logout='1'" >
              <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Log Out</button>
            </a>
    </nav>

    <div class="container-fluid">
        <div id="show-complaint">
            <!-- react-components -->
        </div>
    </div>
    <!-- 'include' for React File  -->
    <?php include("react-admin/show-complaint-react.php")?>
    <?php include("footer.php")?>