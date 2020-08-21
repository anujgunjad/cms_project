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
        <button class="btn btn-outline-info my-2 my-sm-0 btn-theme-color" onclick="changeComponent();" type="submit">LogOut</button>
    </nav>

    <div id="mega-wrapper" class="container-fluid">
        <div class="ui blue segment admin-search-form">
            <div class="ui form">
                <div class="fields">
                    <div class="field">
                        <label>Minimum Value</label>
                        <input type="number" id="min-amount" placeholder="Min Value" onkeyup="valueChange()">
                    </div>
                    <div class="field">
                        <label>Maximum Value</label>
                        <input type="number" id="max-amount" placeholder="Max Value" onkeyup="valueChange()">
                    </div>
                    <div class="field">
                        <label>Complaint Type</label>
                        <div class="category-dropdown-wrapper">
                            <div class="showing-item" onclick="showComplaintTypeDropdown();">
                                <label>Complaint Type <i style="float:right; margin-top:5px" class="fa fa-chevron-down fa-fw" aria-hidden="true"></i></label>
                            </div>
                            <div id="complaint-type" class="category-dropdown">                            
                                <div style="border-radius: 5px 5px 0 0"  class="category-dropdown__item pl-2 pt-1">
                                        <input name="complaint-type"  type="checkbox" value="1" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">सोशल मीडिया</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="complaint-type" type="checkbox" value="2" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">ऑनलाइन ठगी</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="complaint-type" type="checkbox" value="3" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">साइबर आतंकवाद</label>
                                </div>
                                <div style="border-radius:0 0 5px 5px; border-bottom: 1px solid #d6d6d6;" class="category-dropdown__item pl-2">
                                        <input name="complaint-type" type="checkbox" value="4" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">अन्य</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Sub Complaint Type</label>
                        <div class="category-dropdown-wrapper">
                            <div class="showing-item" onclick="showSubComplaintTypeDropdown();">
                                <label>Sub Complaint Type <i style="float:right; margin-top:5px" class="fa fa-chevron-down fa-fw" aria-hidden="true"></i></label>
                            </div>
                            <div id="sub-complaint-type" class="category-dropdown">                            
                                <div style="border-radius: 5px 5px 0 0" class="category-dropdown__item pl-2 pt-1">
                                        <input name="sub-complaint-type" type="checkbox" value="1" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Online Bank Fraud</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="2" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Job Fraud</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="3" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Olx Fraud</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="4" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">KYC Fraud</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="5" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Link Fraud</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="6" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Screen App Sharing</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type"  type="checkbox" value="7" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Fake Facebook</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="8" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Fake Instagram</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="9" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Facebook Hack</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="10" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Instagram Hack</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="11" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Gmail Hack</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="12" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Social Media Harassment</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="13" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Whatsapp Harassment</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="14" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Whatsapp Hack</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="15" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Metrimonial Fraud</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="16" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Custom Fraud</label>
                                </div>
                                <div style="" class="category-dropdown__item pl-2">
                                        <input name="sub-complaint-type" type="checkbox" value="17" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Other</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Gender</label>
                        <div class="category-dropdown-wrapper">
                            <div class="showing-item" onclick="showGenderDropdown();">
                                <label>Gender <i style="float:right; margin-top:5px" class="fa fa-chevron-down fa-fw" aria-hidden="true"></i></label>
                            </div>
                            <div id="gender" class="category-dropdown">                            
                                <div style="border-radius: 5px 5px 0 0"  class="category-dropdown__item pl-2 pt-1">
                                        <input name="gender" type="checkbox" value="1" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Male</label>
                                </div>
                                <div class="category-dropdown__item pl-2">
                                        <input name="gender" type="checkbox" value="2" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Female</label>
                                </div>
                                <div style="border-radius:0 0 5px 5px; border-bottom: 1px solid #d6d6d6;" class="category-dropdown__item pl-2">
                                        <input name="gender" type="checkbox" value="3" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">Other</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Age</label>
                        <div class="category-dropdown-wrapper">
                            <div class="showing-item" onclick="showAgeDropdown();">
                                <label>Age <i style="float:right; margin-top:5px" class="fa fa-chevron-down fa-fw" aria-hidden="true"></i></label>
                            </div>
                            <div id="age" class="category-dropdown">                            
                                <div style="border-radius: 5px 5px 0 0"  class="category-dropdown__item pl-2 pt-1">
                                        <input name="age" type="radio" value="0" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">All</label>
                                </div>
                                <div style="border-radius: 5px 5px 0 0"  class="category-dropdown__item pl-2 pt-1">
                                        <input name="age" type="radio" value="1" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">18 से कम</label>
                                </div>
                                <div style="border-radius:0 0 5px 5px; border-bottom: 1px solid #d6d6d6;" class="category-dropdown__item pl-2">
                                        <input name="age" type="radio" value="2" tabindex="0" class="mt-1" onclick="valueChange();">
                                        <label class="ml-1">18 से ज्यादा</label>
                                </div>
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
    <?php include("react-admin/complaints-category-react.php")?>

    <!-- End -->
    <?php include("sidenav-footer.php")?>
    <?php include("footer.php")?>