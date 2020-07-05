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
        <button class="btn btn-outline-info my-2 my-sm-0 btn-theme-color" onclick="changeComponent();" type="submit">Log
            Out</button>
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
                        <div class="category-dropdown">
                            <div class="category-dropdown__item">
                                    <label>Complaint Type</label>
                            </div>
                            <div class="category-dropdown__item">
                                <div class="ui checkbox">
                                    <input type="checkbox" value="1" tabindex="0" class="hidden">
                                    <label>सोशल मीडिया</label>
                                </div>
                            </div>
                            <div class="category-dropdown__item">
                                <div class="ui checkbox">
                                    <input type="checkbox" value="2" tabindex="0" class="hidden">
                                    <label>ऑनलाइन ठगी</label>
                                </div>
                            </div>
                            <div class="category-dropdown__item">
                                <div class="ui checkbox">
                                    <input type="checkbox" value="3" tabindex="0" class="hidden">
                                    <label>साइबर आतंकवाद</label>
                                </div>
                            </div>
                            <div class="category-dropdown__item">
                                <div class="ui checkbox">
                                    <input type="checkbox" value="4" tabindex="0" class="hidden">
                                    <label>अन्य</label>
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