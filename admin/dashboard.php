<?php include("header.php")?>
<?php include("sidenav-header.php")?>
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head">Admin Dashboard</h1>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link admin-name" href="#">WELCOME <?php echo $_SESSION['name']?><span class="sr-only">(current)</span></a>
            </li>
           
          </ul>
        </div>
            <a href="index.php?logout='1'" >
              <button class="btn btn-outline-info my-2 my-sm-0 btn-theme-color" type="submit">Log Out</button>
            </a>
        </nav>

<div class="container-fluid">
  <div id="dashboard-cards">
    <!-- react-components -->
  </div>
  <h1 class="recent-head">Recently Added Complaints</h1>
  <div id="dashboard-complaints">
    <!-- react-components -->
  </div>
  <div id="charts-row">
    <div class="first-chart-row">
      <center>
        <h1 style="padding-top:2vh" class="recent-head">Graphs Representation</h1>
      </center>
      <div class="two-charts mb-5">
        <div class="chart">
          <canvas id="complaintType"></canvas>
          <h1 class="chart-header">Complaint Type</h1>
        </div>
        <div class="chart">
          <canvas id="genderChart"></canvas>
          <h1 class="chart-header">Gender Type</h1>
        </div>
      </div>
    </div>
    <div class="chart bar-graph-chart">
        <h1 style="color:#004ba8" class="pl-5 ml-5 pt-5 mt-5">SUB COMPLAINT TYPE</h1>
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
   
