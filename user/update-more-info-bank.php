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
const currentDate = (date) => {
                var hours = date.getHours();
                var minutes = date.getMinutes();
                var secs = date.getSeconds();
                var month = date.getMonth() + 1;
                minutes = minutes < 10 ? '0'+minutes : minutes;
                var strTime = hours + ':' + minutes + ':' + secs;
                return (date.getFullYear()) + "-" + month + "-" + date.getDate() + " " + strTime;
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
            let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];
            const panArry = this.state.pans.filter(pan => pan.pan_info_id == pan_id);
            const pan = panArry[0];
            let complaint_id_pan = comId,
                acc_id_pan = numId,
                pan_info_id_pan = pan.pan_info_id,
                pan_pan = document.getElementById("pan_" + pan_id).value?document.getElementById("pan_" + pan_id).value : pan.pan,
                pan_verified_pan = document.getElementById("pan_verified_" + pan_id).value?document.getElementById("pan_verified_" + pan_id).value : pan.pan_verified,
                pan_username_pan = document.getElementById("pan_username_" + pan_id).value?document.getElementById("pan_username_" + pan_id).value : pan.pan_username,
                adhar_number_pan = document.getElementById("pan_adhar_number_" + pan_id).value?document.getElementById("pan_adhar_number_" + pan_id).value : pan.adhar_number,
                income_tax_pan = document.getElementById("pan_income_tax_" + pan_id).value?document.getElementById("pan_income_tax_" + pan_id).value : pan.income_tax,
                gst_in_pan = document.getElementById("pan_gst_in_" + pan_id).value?document.getElementById("pan_gst_in_" + pan_id).value : pan.gst_in,
                tin_pan = document.getElementById("pan_tin_" + pan_id).value?document.getElementById("pan_tin_" + pan_id).value : pan.tin,
                sales_tax_pan = document.getElementById("pan_sales_tax_" + pan_id).value?document.getElementById("pan_sales_tax_" + pan_id).value : pan.sales_tax,
                created_date_pan = pan.created_date,
                pan_info_date = new Date(),
                last_updated_pan = currentDate(pan_info_date);
                
            fetch("../api/data/update_account_pan.php", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_pan,
                    acc_id_pan,
                    pan_info_id_pan,
                    pan_pan,
                    pan_verified_pan,
                    pan_username_pan,
                    adhar_number_pan,
                    income_tax_pan,
                    gst_in_pan,
                    tin_pan,
                    sales_tax_pan,
                    created_date_pan,
                    last_updated_pan,
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
                    console.log(data.atm);
                })
        }
        updateAtmInfo = (atm_id) => {
            let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];
            const atmArry = this.state.atms.filter(atm => atm.atm_footage_id == atm_id);
            const atm = atmArry[0];
            let complaint_id_atm = comId,
                acc_id_atm = numId,
                atm_footage_id_atm = atm_id,
                atm_footage_atm = document.getElementById("atm_footage_" + atm.atm_footage_id ).value?document.getElementById("atm_footage_" + atm.atm_footage_id).value : atm.atm_footage,
                email_sent_atm = document.getElementById("atm_email_sent_" + atm.atm_footage_id ).value?document.getElementById("atm_email_sent_" + atm.atm_footage_id).value : atm.email_sent,
                email_received_atm = document.getElementById("atm_email_received_" + atm.atm_footage_id ).value?document.getElementById("atm_email_received_" + atm.atm_footage_id).value : atm.email_received,
                created_date_atm = atm.created_date,
                atm_update_date = new Date(),
                last_updated_atm = currentDate(atm_update_date);
                
            fetch("../api/data/update_account_atm.php", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_atm ,
                    acc_id_atm,
                    atm_footage_id_atm,
                    atm_footage_atm,
                    email_sent_atm,
                    email_received_atm,
                    created_date_atm,
                    last_updated_atm ,
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
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">ATM Information</h1>                
                             
                        {
                            this.state.atms ? this.state.atms.map((atm, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"> <span style={{color:"red"}}>[{i+1}]</span> Complaint Number</h4>{atm.complaint_number?atm.complaint_number:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ATM Footage</h4><input class="rounded py-2 mt-1 px-2" id={"atm_footage_" + atm.atm_footage_id } type="text" placeholder={atm.atm_footage} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल भेजने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"atm_email_sent_" + atm.atm_footage_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल प्राप्त करने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"atm_email_received_" + atm.atm_footage_id } type="date" /></td>
                                </tr>  
                                <tr>
                                    <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateAtmInfo(atm.atm_footage_id)}>Update</button></td>
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
                    console.log(data.iplogs);
                })
        }
        updateIplogInfo = (iplog_id) => {
            let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];
            const iplogArry = this.state.iplogs.filter(iplog => iplog.iplog_id == iplog_id);
            const iplog = iplogArry[0];
            let complaint_id_iplog = comId,
                acc_id_iplog = numId,
                iplog_id_iplog = iplog_id,
                iplog_iplog = document.getElementById("iplog_iplog_" + iplog.iplog_id ).value?document.getElementById("iplog_iplog_" + iplog.iplog_id ).value : iplog.iplog,
                email_sent_iplog = document.getElementById("iplog_email_sent_" + iplog.iplog_id  ).value?document.getElementById("iplog_email_sent_" + iplog.iplog_id ).value : iplog.email_sent,
                email_received_iplog = document.getElementById("iplog_email_received_" + iplog.iplog_id  ).value?document.getElementById("iplog_email_received_" + iplog.iplog_id ).value : iplog.email_received,
                created_date_iplog = iplog.created_date,
                iplog_update_date = new Date(),
                last_updated_iplog = currentDate(iplog_update_date);
                
            fetch("../api/data/update_account_iplogs.php", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_iplog,
                    acc_id_iplog,
                    iplog_id_iplog,
                    iplog_iplog,
                    email_sent_iplog,
                    email_received_iplog,
                    created_date_iplog,
                    last_updated_iplog ,
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
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">IP Logs</h1>                
                             
                {
                            this.state.iplogs ? this.state.iplogs.map((iplog, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> Complaint Number</h4>{iplog.complaint_number?iplog.complaint_number:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">iplog </h4><input class="rounded py-2 mt-1 px-2" id={"iplog_iplog_" + iplog.iplog_id } type="text" placeholder={iplog.iplog} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल भेजने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"iplog_email_sent_" + iplog.iplog_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल प्राप्त करने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"iplog_email_received_" + iplog.iplog_id } type="date" /></td>
                                </tr>
                                <tr>
                                <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateIplogInfo(iplog.iplog_id)}>Update</button></td>
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
   