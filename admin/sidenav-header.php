<link href="css/sidenav.css" rel="stylesheet" />

<div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Cyber Cell | CMS</div>
        <div class="list-group list-group-flush">
          <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard <i class="fa fa-desktop fa-fw" aria-hidden="true"></i></a>
          <a href="#" id="dropdown-complaint" onclick="showDropdown();" class="list-group-item list-group-item-action bg-light">Complaints <i class="fa fa-clipboard fa-fw" aria-hidden="true"></i> <i style="float:right; margin-top:3px" class="fa fa-chevron-down fa-fw" aria-hidden="true"></i></a>
          <div class="dropdown-sidenav">
            <a href="complaints.php" id="first-a-sub-dropdown" class="list-group-item list-group-item-action bg-light">Search By Keyword <i class="fa fa-search fa-fw" aria-hidden="true"></i></a>
            <a href="complaints-category.php" id="second-a-sub-dropdown" class="list-group-item list-group-item-action bg-light">Filter By Category <i class="fa fa-filter fa-fw" aria-hidden="true"></i></a>
          </div>
          <a href="generate_file.php" id="admin-panel-a" style="border-top:none" class="list-group-item list-group-item-action bg-light">Generate Excel File <i class="fa fa-table fa-fw" aria-hidden="true"></i></a>
          <a href="accounts.php" id="admin-panel-a" style="border-top:none" class="list-group-item list-group-item-action bg-light">Accounts Panel <i class="fa fa-cogs fa-fw" aria-hidden="true"></i></a>
          <a href="#" class="list-group-item list-group-item-action bg-light"></a>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
     