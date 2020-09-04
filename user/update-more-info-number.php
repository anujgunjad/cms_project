<?php include("../server.php") ?>
<?php include('user-header.php')?>
<link rel="stylesheet" href="../admin/CSS/sidenav.css">
<link rel="stylesheet" href="../admin/CSS/styles-admin.css">
 <!--Semantic UI-->
 <link rel="stylesheet" type="text/css" href="../dependencies/semantic/dist/semantic.min.css" />
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head mt-1 ml-5">More Information</h1>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
            <a class="nav-link admin-name" href="#">WELCOME <?php echo $_SESSION['name']?><span class="sr-only">(current)</span></a>
            </li>
           
          </ul>
        </div>
             <a href="javascript:history.back()" class="btn my-2 my-sm-0 btn-theme-color px-4 mx-2" type="submit">Back</a>
             <a href="dashboard.php?logout='1'" >
              <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Log Out</button>
            </a>
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

    
    class CallDetailRecords extends React.Component {
        state = {
           cdr:[],
           num: "",
        }
        componentDidMount(){
            this.fetchCdr();
        }
        fetchCdr(){
                let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];          
                      
                fetch(`../api/data/read_suspect_number_cdr.php?number_id=${numId}&complaint_id=${comId}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({cdr: data.cdr});
                    this.setState({num: data.cdr[0].cdr})
                    console.log(data.cdr);
                })
                .catch(console.log)
        }
        updateCdrInfo = (cdr_id) => {
            let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];
            const cdrArry = this.state.cdr.filter(cdr => cdr.cdr_id == cdr_id);
            const cdr = cdrArry[0];
            let complaint_id_cdr = comId,
                number_id_cdr = numId,
                cdr_id_cdr = cdr_id,
                cdr_cdr = document.getElementById("cdr_cdr_" + cdr.cdr_id ).value?document.getElementById("cdr_cdr_" + cdr.cdr_id).value : cdr.cdr,
                email_sent_cdr = document.getElementById("cdr_email_sent_" + cdr.cdr_id ).value?document.getElementById("cdr_email_sent_" + cdr.cdr_id).value : cdr.email_sent,
                email_received_cdr = document.getElementById("cdr_email_received_" + cdr.cdr_id ).value?document.getElementById("cdr_email_received_" + cdr.cdr_id).value : cdr.email_received,
                imei_cdr = document.getElementById("cdr_imei_" + cdr.cdr_id ).value?document.getElementById("cdr_imei_" + cdr.cdr_id).value : cdr.imei,
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
                    last_updated_atm,
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
            const pdfButtonStyle = {
                background:"#C50202",
                border: "2px solid #C50202",
                color:"#fff",
            }
            return(
                <div>
                <center>
                <h1 class="mt-3 h1-complaint">इस नंबर <span style={{color:"red"}}>{this.state.num}</span> की अधिक जानकारी</h1>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">Call Detail Records</h1>                
                        {
                            this.state.cdr ? this.state.cdr.map((cdr, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> फ़ोन नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"cdr_cdr_" + cdr.cdr_id} type="text" placeholder={cdr.cdr} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल भेजने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"cdr_email_sent_" + cdr.cdr_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल प्राप्त करने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"cdr_email_received_" + cdr.cdr_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IMEI नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"cdr_imei_" + cdr.cdr_id} type="text" placeholder={cdr.imei} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IMSI नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"cdr_imsi_" + cdr.cdr_id} type="text" placeholder={cdr.imsi} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">स्थान (Location)</h4><input class="rounded py-2 mt-1 px-2" id={"cdr_location_" + cdr.cdr_id} type="text" placeholder={cdr.location} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">स्थान तारीख (Location Date)</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"cdr_location_date_" + cdr.cdr_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">रात्रि स्थान (Night Location)</h4><input class="rounded py-2 mt-1 px-2" id={"cdr_night_loc_" + cdr.cdr_id} type="text" placeholder={cdr.night_loc} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">सर्विस का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"cdr_service_name_" + cdr.cdr_id} type="text" placeholder={cdr.service_name} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"cdr_suspect_number_" + cdr.suspect_number} type="text" placeholder={cdr.suspect_number} /></td>
                                    <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateCdrInfo(cdr.cdr_id)}>Update</button></td>
                                    <td></td>
                                </tr>                         
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No CDR addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
    class IpDetailRecords extends React.Component {
        state = {
           ipdr:[],
        }
        componentDidMount(){
            this.fetchIpdr();
        }
        fetchIpdr(){
                let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];          
                      
                fetch(`../api/data/read_suspect_number_ipdr.php?number_id=${numId}&complaint_id=${comId}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({ipdr: data.ipdr});
                    // console.log(this.state.ipdr);
                })
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">IP Detail Records</h1>                
                             
                        {
                            this.state.ipdr ? this.state.ipdr.map((ipdr, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> IP Adress</h4>{ipdr.ipdr?ipdr.ipdr:"अभी तक दर्ज नहीं है"}</td>
                                    <td class={dateFormatter(ipdr.email_sent)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(ipdr.email_sent)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(ipdr.email_sent)!="00-00-0000"?dateFormatter(ipdr.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(ipdr.email_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(ipdr.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(ipdr.email_received)!="00-00-0000"?dateFormatter(ipdr.email_received):"मेल अभी तक नहीं मिला "}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">Location</h4>{ipdr.location?ipdr.location:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट</h4>{ipdr.website?ipdr.website:"अभी तक दर्ज नहीं है"}</td>
                                </tr>
                               
                                    
                                                               
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No IPDR info addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
    class UpiRecords extends React.Component {
        state = {
           upi:[],
        }
        componentDidMount(){
            this.fetchUpi();
        }
        fetchUpi(){
                let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];          
                      
                fetch(`../api/data/read_suspect_number_upi.php?number_id=${numId}&complaint_id=${comId}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({upi: data.upi});
                    // console.log(this.state.upi);
                })
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">UPI Information</h1>                
                             
                        {
                            this.state.upi ? this.state.upi.map((upi, i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> UPI</h4>{upi.upi?upi.upi:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI ID</h4>{upi.upi_id?upi.upi_id:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI Link</h4>{upi.upi_link?upi.upi_link:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI Name</h4>{upi.upi_name?upi.upi_name:"अभी तक दर्ज नहीं है"}</td>
                                </tr>                                 
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No UPI info addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
    class MoreDetailsNumber extends React.Component {
        render(){

            return(
                <center>
                    <CallDetailRecords />
                    <IpDetailRecords />
                    <UpiRecords />
                </center>
            )
        }
    }
  ReactDOM.render(<MoreDetailsNumber />, document.getElementById('show-number-cdr-info'))

</script>
<?php include("user-footer.php")?>

   