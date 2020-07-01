<?php include("header.php")?>
<?php include("sidenav-header.php")?>
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
          <h1 class="nav-head">Filter complaints by category</h1>
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
            <div class="field">
              <label>Minimum Value</label>
              <input type="number" id="min-amount" placeholder="Min Value" onkeyup="valueChange()" >
            </div>
            <div class="field">
              <label>Maximum Value</label>
              <input type="number" id="max-amount" placeholder="Max Value" onkeyup="valueChange()">
            </div>
            <div class="three wide field dropdown-search-form">
                <label>Complaint Type</label>
                <select id="complaint-type" onchange="valueChange();">
                    <option value="2">Complaint Type</option>
                    <option value="1">सोशल मीडिया</option>
                    <option value="2">ऑनलाइन ठगी</option>
                    <option value="3">साइबर आतंकवाद</option>
                    <option value="4">अन्य</option>
                </select>
            </div>
            <div class="three wide field dropdown-search-form">
                <label>Sub Complaint Type</label>
                <select id="sub-complaint-type" onchange="valueChange();">
                    <option value="2">Sub-Complaint Type</option>
                    <option value="1">Online Bank Fraud</option>
                    <option value="2">Job Fraud</option>
                    <option value="3">OLX Fraud</option>
                    <option value="4">KYC Fraud</option>
                    <option value="5">Link Fraud</option>
                    <option value="6">Screen App Sharing</option>
                    <option value="7">Fake Facebook</option>
                    <option value="8">Fake Instagram</option>
                    <option value="9">Facebook Hack</option>
                    <option value="10">Instagram Hack</option>
                    <option value="11">Gmail Hack</option>
                    <option value="12">Social Media Harassment</option>
                    <option value="13">Whatsapp Harassment</option>
                    <option value="14">Whatsapp Hack</option>
                    <option value="15">Metrimonial Fraud</option>
                    <option value="16">Custom Fraud</option>
                    <option value="17">Other</option>
                </select>
            </div>
            <div class="two wide field dropdown-search-form">
                <label>Gender</label>
                <select id="gender" onchange="valueChange();">
                    <option value="male">Gender</option>
                    <option value="male">पुरुष</option>
                    <option value="female">महिला</option>
                    <option value="other">अन्य</option>
                </select>
            </div>
            <div class="two wide field dropdown-search-form">
                <label>Age</label>
                <select id="age" onchange="valueChange();">
                <option value="1">Age</option>
                <option value="2">less than 18</option>
                <option value="3">More than 18</option>
                </select>
            </div>
            
            
          </div>
        </div>
      </div>
      <div id="render-container">
        <!-- React element -->
      </div>
    </div>
    <!-- 'include' for React File  -->
    <?php include("react-admin/complaints-category-react.php")?>

  <!-- End -->
 <?php include("sidenav-footer.php")?>
 <?php include("footer.php")?>


























 