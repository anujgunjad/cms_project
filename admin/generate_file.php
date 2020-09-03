
<?php
include("header.php");
include("sidenav-header.php");
?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head">Generate Excel File</h1>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link admin-name" href="#">WELCOME <?php echo $_SESSION['name']?><span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
            <a href="dashboard.php?logout='1'" >
              <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Log Out</button>
            </a>
    </nav>
    <div class="ui form pl-3 mt-2">
            <div class=" four fields">
                    <div class="field">
                        <h2 style="color:#004ba8" class="mb-0 mt-3">Complaint No</h2>
                    </div>
                    <div class="field"> 
                    </div>
                </div>
                <div class=" four fields">
                    <div class="field">
                        <input type="text" name="genfile_compliaint_no" id="genfile_compliaint_no" placeholder="Enter complaint no" >
                    </div>
                    <div style="width:fit-content" class="field">
                      <button style="background-color:#004ba8; color:#fff" class="ui button" id="generate_btn">Download Basic details</button>
                    </div>
                    <div style="width:fit-content;" class="field">
                      <button style="background-color:#004ba8; color:#fff" class="ui button" id="generate_all_btn" >Download all details</button>
                    </div>
                </div>
    </div>
    <div id="data_fetch"></div>
    
</div>
<script src="../dependencies/jquery/jquery.min.js"></script>
<script src='../dependencies/sweetalert/sweetalert.min.js'></script>
<script>
    $("#generate_btn").click(function(){
      var gen_complaint_no =  $("#genfile_compliaint_no").val();
      if(gen_complaint_no=="" || gen_complaint_no==null)
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
        fetch(`http://localhost/cms_project/api/data/read_complainee.php?complaint_no=`+gen_complaint_no)
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
                        window.location = 'download_excel.php?file_name='+response;
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
    $("#generate_all_btn").click(function(){
      var gen_complaint_no =  $("#genfile_compliaint_no").val();
      if(gen_complaint_no=="" || gen_complaint_no==null)
      {
        swal({
              title: 'OOPs',
              text:'Please enter complaint number',
              icon: 'warning',
              button: 'ok',
            }).then(() => {
                console.log('alert');
            });
      }
      else{
        fetch(`http://localhost/cms_project/api/data/read_complainee.php?complaint_no=`+gen_complaint_no)
			.then((result)=> {
				return result.json();
			})
			.then((data)=> {
                  
                    if(!data.message)
                    {
                        var sendbasic =data.complainee[0];  
                        var complainee_num =sendbasic.complaint_id;
                        console.log(complainee_num);
                        ///number FETCH
                        fetch(`http://localhost/cms_project/api/data/read_suspect_number.php?complaint_id=`+complainee_num)
                        .then((result)=> {
                            return result.json();
                        })
                        .then((numres)=> { 
                            if(!numres.message)
                            {
                                var numbersbasic =numres.numbers;  
                                var count_number = Object.keys(numres.numbers).length;
                                console.log(numres);
                            }
                            else{
                                var numbersbasic ='empty';  
                            }
                               ///Accounts FETCH
                            fetch(`http://localhost/cms_project/api/data/read_bank_account.php?complaint_id=`+complainee_num)
                            .then((result)=> {
                                return result.json();
                                
                            })
                            .then((accres)=> { 
                                console.log(accres);
                                if(!accres.message)
                                {
                                    var accountsbasic =accres.accounts;  
                                    var count_accounts = Object.keys(accres.accounts).length;
                                
                                }
                                else{
                                    var accountsbasic ='empty';  
                                }
                                  ///SUSPECTS FETCH
                                    fetch(`http://localhost/cms_project/api/data/read_suspects.php?complaint_id=`+complainee_num)
                                    .then((result)=> {
                                        return result.json();
                                    })
                                    .then((susres)=> { 
                                        console.log(susres);
                                        if(!susres.message)
                                        {
                                            var suspectsbasic =susres.suspects;  
                                            var count_suspects = Object.keys(susres.suspects).length;
                                        
                                        }
                                        else{
                                            var suspectsbasic ='empty';  
                                        }
                                               ///EWALLET FETCH
                                                fetch(`http://localhost/cms_project/api/data/read_suspect_ewallet.php?complaint_id=`+complainee_num)
                                                .then((result)=> {
                                                    return result.json();
                                                })
                                                .then((ewallres)=> { 
                                                    console.log(ewallres);
                                                    if(!ewallres.message)
                                                    {
                                                        var ewalletbasic =ewallres.ewallet;  
                                                        var count_ewallet = Object.keys(ewallres.ewallet).length;
                                                    
                                                    }
                                                    else{
                                                        var ewalletbasic ='empty';  
                                                    }
                                                       ///WEBSITE FETCH
                                                        fetch(`http://localhost/cms_project/api/data/read_suspect_website.php?complaint_id=`+complainee_num)
                                                        .then((result)=> {
                                                            return result.json();
                                                        })
                                                        .then((webres)=> { 
                                                            console.log(webres);
                                                            if(!webres.message)
                                                            {
                                                                var websitebasic =webres.website;  
                                                                var count_website = Object.keys(webres.website).length;
                                                            
                                                            }
                                                            else{
                                                                var websitebasic ='empty';  
                                                            }
                                                        //    window.location ='generate_all_file.php?sendbasic='+sendbasic+'&numbersbasic='+numbersbasic+'&accountsbasic='+accountsbasic+'&suspectsbasic='+suspectsbasic+'&ewalletbasic='+ewalletbasic+'&websitebasic='+websitebasic;
                                                             $.ajax({
                                                                url:'generate_all_file.php',
                                                                type:"POST",
                                                                data:{sendbasic:sendbasic,numbersbasic:numbersbasic,accountsbasic:accountsbasic,suspectsbasic:suspectsbasic,ewalletbasic:ewalletbasic,websitebasic:websitebasic},
                                                                success:function(result_excel)
                                                                {  
                                                                  console.log(result_excel);  
                                                                 window.location = 'download_excel.php?file_name='+result_excel;
                                                                }
                                                                });
                                                        });
                                                });
                                    });
                            });
                       
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