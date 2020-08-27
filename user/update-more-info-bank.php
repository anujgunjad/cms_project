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
        <button class="btn my-2 my-sm-0 btn-theme-color" type="submit">Log Out</button>
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
                })
                .catch(console.log)
        }
        
        render(){
            return(
                <div>
                <center>
                <h1 class="mt-3 h1-complaint">बैंक खाते <span style={{color:"red"}}></span>की अधिक जानकारी</h1>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">Permanent account number [PAN]</h1>                
                        {
                            this.state.pans ? this.state.pans.map((pan) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Permanent account number</h4>{pan.pan?pan.pan:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">PAN Verified</h4>{pan.pan_verified?pan.pan_verified:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">PAN Username</h4>{pan.pan_username?pan.pan_username:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Aadhaar Number</h4>{pan.adhar_number?pan.adhar_number:"अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Income Tax</h4>{pan.income_tax?pan.adhar_number:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">GST</h4>{pan.gst_in?pan.gst_in:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">TIN</h4>{pan.tin?pan.tin:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Sales Tax</h4>{pan.sales_tax?pan.sales_tax:"अभी तक दर्ज नहीं है"}</td>
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
                            this.state.atms ? this.state.atms.map((atm) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Complaint Number</h4>{atm.complaint_number?atm.complaint_number:"अभी तक दर्ज नहीं है"}</td>
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
                            this.state.iplogs ? this.state.iplogs.map((iplog) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Complaint Number</h4>{iplog.complaint_number?iplog.complaint_number:"अभी तक दर्ज नहीं है"}</td>
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
   