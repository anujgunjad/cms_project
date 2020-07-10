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
  <h1 style="color:#004ba8">Recently Added Complaints</h1>
  <div id="dashboard-complaints">
    <!-- react-components -->
  </div>
  <div id="charts-row">
    <div class="two-charts mb-5">
      <div class="chart">
        <h1 class="chart-header">Complaint Type</h1>
        <canvas id="complaintType"></canvas>
      </div>
      <div class="chart">
        <h1 class="chart-header">Gender Type</h1>
        <canvas id="genderChart"></canvas>
      </div>
    </div>
    <div class="chart">
        <h1 style="color:#004ba8" class="pl-5 ml-5 pt-5 mt-5">Sub Complaint Type</h1>
       <center>
        <canvas id="myChart" width="900" height="450"></canvas>
       </center> 
      </div>
  </div>
  
</div>
  <!-- 'include' for React File  -->
  <?php include("react-admin/dashboard-react.php")?>  
 <?php include("sidenav-footer.php")?>
 <?php include("footer.php")?>
   
