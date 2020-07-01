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
            <div class="six wide field dropdown-search-form">
              <div class="my-js-slider"></div>
            </div>
            <!-- <div class="three wide field dropdown-search-form">
              <select id="min-amount" onchange="valueChange();" >
                <option value="1000">Min-Amount</option>
                <option value="1000">₹ 1000</option>
                <option value="2000">₹ 2000</option>
                <option value="3000">₹ 3000</option>
                <option value="4000">₹ 4000</option>
                <option value="5000">₹ 5000</option>
                <option value="6000">₹ 6000</option>
                <option value="7000">₹ 7000</option>
                <option value="8000">₹ 8000</option>
                <option value="9000">₹ 9000</option>
                <option value="10000">₹ 10000</option>
              </select>
            </div>
            <div class="three wide field dropdown-search-form">
                <select id="max-amount" onchange="valueChange();">
                    <option value="9000000">Max-Amount</option>
                    <option value="100000">1 lakhs</option>
                    <option value="200000">2 Lakhs</option>
                    <option value="300000">3 Lakhs</option>
                    <option value="400000">4 Lakhs</option>
                    <option value="500000">5 Lakhs</option>
                    <option value="600000">6 Lakhs</option>
                    <option value="700000">7 Lakhs</option>
                    <option value="800000">8 Lakhs</option>
                    <option value="900000">9 Lakhs</option>
                    <option value="1000000">10 Lakhs</option>
                </select>
            </div> -->
            <div class="three wide field dropdown-search-form pt-5">
                <select id="complaint-type" onchange="valueChange();">
                    <option value="2">Complaint Type</option>
                    <option value="1">सोशल मीडिया</option>
                    <option value="2">ऑनलाइन ठगी</option>
                    <option value="3">साइबर आतंकवाद</option>
                    <option value="4">अन्य</option>
                </select>
            </div>
            <div class="three wide field dropdown-search-form">
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
                <select id="gender" onchange="valueChange();">
                    <option value="male">Gender</option>
                    <option value="male">पुरुष</option>
                    <option value="female">महिला</option>
                    <option value="other">अन्य</option>
                </select>
            </div>
            <div class="two wide field dropdown-search-form">
                <select id="age" onchange="valueChange();">
                <option value="40">Age</option>
                <option value="17">less than 18</option>
                <option value="18">Equals to 18</option>
                <option value="19">More than 18</option>
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