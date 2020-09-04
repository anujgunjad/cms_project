<?php include("../server.php") ?>
<?php include('user-header.php')?>
<link rel="stylesheet" href="../admin/CSS/sidenav.css">
<link rel="stylesheet" href="../admin/CSS/styles-admin.css">
 <!--Semantic UI-->
 <link rel="stylesheet" type="text/css" href="../dependencies/semantic/dist/semantic.min.css" />
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head mt-1 ml-5"> Update More Info Bank</h1>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link admin-name" href="#">WELCOME <?php echo $_SESSION['name']?></a>
                </li>

            </ul>
        </div>
        <a href="javascript:history.back()" class="btn my-2 my-sm-0 btn-theme-color px-4 mx-2" type="submit">Back</a>
        <a href="user-dashboard.php?logout='1'" >
                <button type="button" class="btn btn-outline-light">Log Out</button>
        </a>
    </nav>


<div class="container-fluid">
  <div id="show-bank-account-info">
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

    
    class PAN extends React.Component {
        state = {
           pans:[],
        }
        componentDidMount(){
            this.fetchPan();
        }
        fetchPan(){
                let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];          
                      
                fetch(`../api/data/read_bank_account_pan.php?account_id=${numId}&complaint_id=${comId}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({pans: data.pan});
                    console.log(data.pan)
                })
                .catch(console.log)
        }
        updatePanInfo = (pan_id) => {
            let id = idFetcher(); 
            const numberArry = this.state.numbers.filter(number => number.number_id == number_id);
            const number = numberArry[0];
            let complaint_id_num = id,
                number_id_num = number.number_id,
                number_one_num = document.getElementById("num_number_" + number_id).value?document.getElementById("num_number_" + number_id).value : number.number,
                company_num = document.getElementById("num_company_" + number_id).value?document.getElementById("num_company_" + number_id).value : number.company,
                files_num = document.getElementById("num_files_" + number_id).value?document.getElementById("num_files_" + number_id).value : number.files,
                email_sent_num = document.getElementById("num_email_sent_" + number_id).value?document.getElementById("num_email_sent_" + number_id).value : number.email_sent,
                email_received_num = document.getElementById("num_email_received_" + number_id).value?document.getElementById("num_email_received_" + number_id).value : number.email_received,
                suspect_name_num = document.getElementById("num_suspect_name_" + number_id).value?document.getElementById("num_suspect_name_" + number_id).value : number.suspect_name,
                suspect_address_num = document.getElementById("num_suspect_address_" + number_id).value?document.getElementById("num_suspect_address_" + number_id).value : number.suspect_address,
                city_num = document.getElementById("num_city_" + number_id).value?document.getElementById("num_city_" + number_id).value : number.city,
                state_num = document.getElementById("num_state_" + number_id).value?document.getElementById("num_state_" + number_id).value : number.state,
                retailer_name_num = document.getElementById("num_retailer_name_" + number_id).value?document.getElementById("num_retailer_name_" + number_id).value : number.retailer_name,
                uid_num_num = document.getElementById("num_uid_num_" + number_id).value?document.getElementById("num_uid_num_" + number_id).value : number.uid_num,
                other_num_num = document.getElementById("num_other_num_" + number_id).value?document.getElementById("num_other_num_" + number_id).value : number.other_num,
                pdf_num = number.pdf,
                confirmation_num = document.getElementById("num_confirmation_" + number_id).value?document.getElementById("num_confirmation_" + number_id).value : number.confirmation,
                remark_num = document.getElementById("num_remark_" + number_id).value?document.getElementById("num_remark_" + number_id).value : number.remark,
                reminder_num = number.reminder,
                mail_id_num = document.getElementById("num_mail_id_" + number_id).value?document.getElementById("num_mail_id_" + number_id).value : number.mail_id,
                caf_date_num = document.getElementById("num_caf_date_" + number_id).value?document.getElementById("num_caf_date_" + number_id).value : number.caf_date,
                created_date_num = number.created_date,
                suspect_numbers_date = new Date(),
                last_updated_num = currentDate(suspect_numbers_date);
                
            fetch("../api/data/update_number.php", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_num,
                    number_id_num,
                    number_one_num,
                    company_num,
                    files_num,
                    email_sent_num,
                    email_received_num,
                    suspect_name_num,
                    suspect_address_num,
                    city_num,
                    state_num,
                    retailer_name_num,
                    uid_num_num,
                    other_num_num,
                    pdf_num,
                    confirmation_num,
                    remark_num,
                    reminder_num,
                    mail_id_num,
                    caf_date_num,
                    created_date_num,
                    last_updated_num,
                })
            }) 
                // update done
                .then(
                        swal({
                            title: 'Updated Successfuly',
                            icon: 'success',
                            button: 'Next',
                        })
                        .then(() => {
                            location.reload();
                        })
                    ); 
        }
        
        render(){
            return(
                <div>
                <center>
                <h1 class="mt-3 h1-complaint">बैंक खाते <span style={{color:"red"}}></span>की अधिक जानकारी</h1>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">Permanent account number [PAN]</h1>                
                        {
                            this.state.pans ? this.state.pans.map((pan, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> Permanent account number</h4><input class="rounded py-2 mt-1 px-2" id={"pan_" + pan.pan_info_id } type="text" placeholder={pan.pan} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">PAN Verified</h4><input class="rounded py-2 mt-1 px-2" id={"pan_verified_" + pan.pan_info_id } type="text" placeholder={pan.pan_verified} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">PAN Username</h4><input class="rounded py-2 mt-1 px-2" id={"pan_username_" + pan.pan_info_id } type="text" placeholder={pan.pan_username} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Aadhaar Number</h4><input class="rounded py-2 mt-1 px-2" id={"pan_adhar_number_" + pan.pan_info_id } type="text" placeholder={pan.adhar_number} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Income Tax</h4><input class="rounded py-2 mt-1 px-2" id={"pan_income_tax_" + pan.pan_info_id } type="text" placeholder={pan.income_tax} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">GST</h4><input class="rounded py-2 mt-1 px-2" id={"pan_gst_in_" + pan.pan_info_id } type="text" placeholder={pan.gst_in} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">TIN</h4><input class="rounded py-2 mt-1 px-2" id={"pan_tin_" + pan.pan_info_id } type="text" placeholder={pan.tin} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Sales Tax</h4><input class="rounded py-2 mt-1 px-2" id={"pan_sales_tax_" + pan.pan_info_id } type="text" placeholder={pan.sales_tax} /></td>
                                </tr>  
                                <tr>
                                <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updatePanInfo(pan.pan_info_id)}>Update</button></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>                 
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No PAN Info addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
                             </td>
                            </tr>
                          </tbody>
                        </table>
                        }
                           
                            </div>
                        </center>                    
                    </div>          
            )
        }
    }
    class ATM extends React.Component {
        state = {
           atms:[],
        }
        componentDidMount(){
            this.fetchAtm();
        }
        fetchAtm(){
                let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];          
                fetch(`../api/data/read_bank_account_atm.php?account_id=${numId}&complaint_id=${comId}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({atms: data.atm});
                    // console.log(this.state.atm);
                })
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">ATM Information</h1>                
                             
                        {
                            this.state.atms ? this.state.atms.map((atm, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"> <span style={{color:"red"}}>[{i+1}]</span> Complaint Number</h4>{atm.complaint_number?atm.complaint_number:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ATM Footage</h4>{atm.atm_footage?atm.atm_footage:"अभी तक दर्ज नहीं है"}</td>
                                    <td class={dateFormatter(atm.email_sent)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(atm.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(atm.email_sent)!="00-00-0000"?dateFormatter(atm.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(atm.email_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(atm.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(atm.email_received)!="00-00-0000"?dateFormatter(atm.email_received):"मेल अभी तक नहीं मिला "}</td>
                                </tr>                                   
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No ATM info addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
                             </td>
                            </tr>
                          </tbody>
                        </table>
                        }
                            </div>
                        </center>                    
                    </div>          
            )
        }
    }
    class IPLOGS extends React.Component {
        state = {
           iplogs:[],
        }
        componentDidMount(){
            this.fetchIplogs();
        }
        fetchIplogs(){
                let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];          
                      
                fetch(`../api/data/read_bank_account_iplogs.php?account_id=${numId}&complaint_id=${comId}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({iplogs: data.iplogs});
                    // console.log(this.state.upi);
                })
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">IP Logs</h1>                
                             
                {
                            this.state.iplogs ? this.state.iplogs.map((iplog, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> Complaint Number</h4>{iplog.complaint_number?iplog.complaint_number:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">iplog </h4>{iplog.iplog?iplog.iplog:"अभी तक दर्ज नहीं है"}</td>
                                    <td class={dateFormatter(iplog.email_sent)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(iplog.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(iplog.email_sent)!="00-00-0000"?dateFormatter(iplog.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(iplog.email_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(iplog.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(iplog.email_received)!="00-00-0000"?dateFormatter(iplog.email_received):"मेल अभी तक नहीं मिला "}</td>
                                </tr>                                   
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No IP Logs info addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
                             </td>
                            </tr>
                          </tbody>
                        </table>
                        }
                           
                            </div>
                        </center>                    
                    </div>          
            )
        }
    }
    class MoreDetailsBank extends React.Component {
        render(){

            return(
                <center>
                    <PAN />
                    <ATM />
                    <IPLOGS />
                </center>
            )
        }
    }
  ReactDOM.render(<MoreDetailsBank />, document.getElementById('show-bank-account-info'))

</script>
 <?php include("user-footer.php")?>
   