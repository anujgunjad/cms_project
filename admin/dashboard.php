<?php include('../server.php')?>
<?php include("header.php")?>
<?php include("sidenav-header.php")?>
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head">Dashboard</h1>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link admin-name" href="#">WELCOME <?php echo $_SESSION['name']?><span class="sr-only">(current)</span></a>
            </li>
           
          </ul>
        </div>
             <button class="btn btn-outline-info my-2 my-sm-0 btn-theme-color" type="submit">Log Out</button>
        </nav>

<div class="container-fluid">
  <div id="dashboard-cards">
    <!-- react-components -->
  </div>
  <!-- <div id="charts-row">
  <canvas id="myChart"></canvas>
  </div> -->
  <h1>Recently Added Complaints</h1>
  <div id="dashboard-complaints">

    <!-- react-components -->
  </div>
</div>
  <!-- 'include' for React File  -->
  <?php include("react-admin/dashboard-react.php")?>  
 <?php include("sidenav-footer.php")?>
 <?php include("footer.php")?>
   
