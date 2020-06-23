<?php include("header.php")?>
<?php include("sidenav-header.php")?>
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link admin-name" href="#">Welcome xyz<span class="sr-only">(current)</span></a>
            </li>
           
          </ul>
        </div>
             <button class="btn btn-outline-info my-2 my-sm-0 btn-theme-color" type="submit">Log Out</button>
        </nav>

    <div id="mega-wrapper" class="container-fluid">
      <div class="ui blue segment admin-search-form">
        <div class="ui form">
          <div class="two fields">
            <div class="field">
              <input placeholder="Enter Complaint Id" type="text">
            </div>
            <div class="field">
              <div class="ui submit animated green button"> 
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
    <script type="text/babel">
      class Hello extends React.Component {
        render() {
          return <h1>Hello World!</h1>
        }
      }

      ReactDOM.render(<Hello />, document.getElementById('render-container'))
    </script>
 <?php include("sidenav-footer.php")?>
 <?php include("footer.php")?>