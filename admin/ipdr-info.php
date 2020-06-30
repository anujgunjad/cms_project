<?php include("header.php")?>
<link href="css/sidenav.css" rel="stylesheet" />
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head mt-1 ml-5">IP Detail Recors [IPDR] </h1>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link admin-name" href="#">Welcome xyz<span class="sr-only">(current)</span></a>
            </li>
           
          </ul>
        </div>
             <a href="javascript:history.back()" class="btn my-2 my-sm-0 btn-theme-color px-4 mx-2" type="submit">Back</a>
             <button class="btn my-2 my-sm-0 btn-theme-color" type="submit">Log Out</button>
        </nav>

<div class="container-fluid">
  <div id="show-number-cdr-info">
    <!-- react-components -->
  </div>
</div> 
<script type="text/babel">
const idsFetcher = () => {
            const location = window.location.href,
            locationAndId = location.split("="),
            comId = locationAndId[2],
            extraAndId = locationAndId[1],
            numIdAry = extraAndId.split("&"),
            numId = numIdAry[0],
            numAndComId = [numId,comId];
            return numAndComId;
}
const dateFormatter = (str) => {
                var revdate = str.split("-"),
                    reverseArray = revdate.reverse(),
                    realDate = reverseArray.join("-"); 
                return realDate;
            }
const timeDateFormatter = (arry) => {
                let str = arry.split(" "),
                          date = str[0];
                var revdate = date.split("-"),
                    reverseArray = revdate.reverse(),
                    realDate = reverseArray.join("-"); 
                return realDate;
            }

    
    
  ReactDOM.render(<IpDetailRecords />, document.getElementById('show-number-cdr-info'))

</script>
 <?php include("footer.php")?>
   