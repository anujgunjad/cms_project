<?php include("header.php")?>
<?php include("sidenav-header.php")?>
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
          <h1 class="nav-head">Search By Keyword</h1>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link admin-name" href="#">Welcome xyz<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
             <button class="btn btn-outline-info my-2 my-sm-0 btn-theme-color" onclick="changeComponent();" type="submit">Log Out</button>
        </nav>

    <div id="mega-wrapper" class="container-fluid">
      <div class="ui blue segment admin-search-form">
        <div class="ui form">
          <div class="fields">
            <div class="five wide field dropdown-search-form">
              <select id="search-category">
                <option value="">Search Category</option>
                <option value="1">Applicant Name</option>
                <option value="2">Complaint Number</option>
                <option value="3">Applicant Phone Number</option>
                <option value="4">Suspect Name</option>
                <option value="5">Address</option>
              </select>
            </div>
            <div class="fifteen wide field">
              <input id="search-keyword" placeholder="Enter text for search" type="text">
            </div>
            <div class="field">
              <div class="ui submit animated green button" onclick="filterTwo();"> 
                <div class="visible content">Search</div>
                <div class="hidden content">
                  <i class="fa fa-search"></i>
                </div>
              </div>
            </div>
          </div>    
        </div>
      </div>
      <div id="render-container">
        <!-- React element -->
      </div>
    </div>
    <!-- 'include' for React File  -->
    <?php include("react-admin/complaints-react.php")?>

  <!-- End -->
 <?php include("sidenav-footer.php")?>
 <?php include("footer.php")?>