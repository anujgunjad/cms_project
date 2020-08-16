<?php include("header.php")?>
<?php include("sidenav-header.php")?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head">Generate File</h1>
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
    <div class="ui form">
            <div class=" four fields">
                    <div class="field">
                        <label>Complaint Id</label>
                    </div>
                    <div class="field"> 
                    </div>
                </div>
                <div class=" four fields">
                    <div class="field">
                        <input type="number" name="genfile_compliaint_id" id="genfile_compliaint_id" placeholder="Enter complaint id" >
                    </div>
                    <div class="field">
                      <button class="ui blue button" id="generate_btn" >Download Basic details</button>
                    </div>
                </div>
    </div>
    <div id="data_fetch"></div>
    <?php
    if(isset($_GET['basicdownload_id']))
    {  $basicdownload_id = $_GET['basicdownload_id'];
         $file = 'basicdetails_'.$basicdownload_id.'.xlsx';
        $mime ='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        ob_end_clean(); // this is solution
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $mime);
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        readfile($file);
        unlink($file);
        exit;
    }
    ?>
</div>
<script src="../dependencies/jquery/jquery.min.js"></script>
<script src='../dependencies/sweetalert/sweetalert.min.js'></script>
<script>
    $("#generate_btn").click(function(){
      var gen_complaint_id =  $("#genfile_compliaint_id").val();
      if(gen_complaint_id=="" || gen_complaint_id==null)
      {
        swal({
              title: 'OOPs',
              text:'Please enter complaint id',
              icon: 'warning',
              button: 'ok',
            }).then(() => {
                console.log('alert');
            });
      }
      else{
        fetch(`http://localhost/cms_project/api/data/read_complainee.php?complaint_id=`+gen_complaint_id)
			.then((result)=> {
				return result.json();
			})
			.then((data)=> {
                    console.log(data);
                    if(!data.message)
                    {
                    var sendbasic =data.complainee[0];   
                    $.ajax({
                    url:'generate_file_action.php',
                    data:{sendbasic:sendbasic},
                    type:"POST",
                    success:function(response){
                        window.location = 'generate_file.php?basicdownload_id='+gen_complaint_id;
                        }
                    });
                    }
                    else{
                        swal({
                            title: 'OOPs',
                            text:'No complainee Found',
                            icon: 'error',
                            button: 'ok',
                            }).then(() => {
                                console.log('alert');
                        });
                        }

                });
         
        }
   
    
    
    });

</script>
<!-- End -->
<?php include("sidenav-footer.php")?>
<?php include("footer.php")?>
