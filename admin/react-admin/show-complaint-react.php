<script type="text/babel">
    const idFetcher = () => {
            const location = window.location.href,
            locationAndId = location.split("="),
            id = locationAndId[1];
            return id;
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
  class Applicant extends React.Component {
    state = {
          applicant: {},
          crimeDate:"",
          createdDate: "",
          updatedDate: "",
        }
        componentDidMount(){
            this.fetchApplicantData();
        }
        fetchApplicantData(){
                let id = idFetcher();               
                fetch('../api/data/read_all_complainee.php')
                .then(res => res.json())
                .then((data) => {
                const applicant = data.complainee.filter(complaint => complaint.complaint_id == id);
                this.setState({ applicant: applicant[0] });
                let updatedDate = timeDateFormatter(applicant[0].last_updated);
                this.setState({ updatedDate: updatedDate});
                let createdDate = timeDateFormatter(applicant[0].created_date);
                this.setState({ createdDate: createdDate});
                let crimeDateRev = applicant[0].crime_date,
                    crimeDate = dateFormatter(crimeDateRev);
                this.setState({ crimeDate: crimeDate});
                })
                .catch(console.log)
        }
        render() {    
            return ( 
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">शिकायत व आवेदक की जानकारी</h1>
                            <table class="ui celled table">
                            <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 style={{color:"red"}} class="ui header mb-1 mt-1">शिकायत क्रमांक</h4>{this.state.applicant.complaint_no}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का नाम</h4>{this.state.applicant.ap_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की उम्र</h4>{this.state.applicant.ap_age} साल</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का मोबाइल नंबर</h4>{this.state.applicant.ap_mob}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का पता</h4>{this.state.applicant.ap_address}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का लिंग</h4>{this.state.applicant.ap_gender}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का देश</h4>{this.state.applicant.ap_country}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का राज्य</h4>{this.state.applicant.ap_state}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का शहर</h4>{this.state.applicant.ap_city}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पिन कोड</h4>{this.state.applicant.ap_pin_code}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आधार क्रमांक</h4>{this.state.applicant.ap_adhar}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का प्रकार</h4>{this.state.applicant.complaint_type}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का तरीका</h4>{this.state.applicant.sub_complaint_type}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आई टी ऐक्ट धारा</h4>{this.state.applicant.it_act}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">भा द वि धारा</h4>{this.state.applicant.bh_dv}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना की दिनांक</h4>{this.state.crimeDate}</td>
                                </tr>
                               <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना का समय</h4>{this.state.applicant.crime_time}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की राशि</h4>{this.state.applicant.amount}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">जांचकर्ता का नाम</h4>{this.state.applicant.checker_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत दर्ज की दिनांक</h4>{this.state.createdDate}</td> 
                                </tr>
                               <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत की स्थिति</h4>{this.state.applicant.complaint_status==0?"नहीं":"हाँ"}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            </table>
                            </div>
                        </center>                    
                    </div>          
                );
        }
    }

    class Suspect extends React.Component {
        state = {
            suspects: [],
        }
        componentDidMount(){
        }
        fetchApplicantData(){
                let id = idFetcher();               
                fetch(`../api/data/read_suspect_number.php?complaint_id =${id}`)
                .then(res => res.json())
                .then((data) => {
                   
                })
                .catch(console.log)
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">संदेहियों की जानकारी</h1>
                            <table class="ui celled table">
                                <tbody>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का नाम</h4></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का पता</h4></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का ईमेल</h4></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का डोमेन नाम</h4></td>
                                    </tr>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI फोन नंबर</h4></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI VPA </h4></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">सॉफ्टवेयर का नाम</h4></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत की कार्रवाई</h4></td>
                                    </tr>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">लंबित का कारण</h4></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">टिप्पणी</h4></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </center>                    
                    </div>          
            )
        }
    }
    class Numbers extends React.Component {
        state = {
           numbers:[],
        }
        componentDidMount(){
            this.fetchNumbers();
        }
        fetchNumbers(){
                let id = idFetcher();               
                fetch(`../api/data/read_suspect_number.php?complaint_id=${id}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({numbers: data.numbers})
                })
                .catch(console.log)
        }
        
        render(){
            const pdfButtonStyle = {
                background:"#C50202",
                color:"#fff",
                border: "2px solid #C50202",
            }
            const infoButtonStyle ={
                backgroundColor: "#004ba8",
                border: "2px solid #004ba8",
                color:"#FFF",
            };
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">शिकायत संबंधी फोन नंबर</h1>
                        {
                            this.state.numbers ? this.state.numbers.map((number) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">फ़ोन नंबर</h4>{number.number}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">कंपनी</h4>{number.company}</td>
                                    <td class={dateFormatter(number.email_sent)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(number.email_sent)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(number.email_sent)!="00-00-0000"?dateFormatter(number.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(number.email_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(number.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(number.email_received)!="00-00-0000"?dateFormatter(number.email_received):"मेल अभी तक नहीं मिला "}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">दस्तावेज़</h4>{number.files}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का नाम</h4>{number.suspect_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का पता</h4>{number.suspect_address}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शहर</h4>{number.city}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">राज्य</h4>{number.state}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">रिटेलर का नाम</h4>{number.retailer_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UID नंबर</h4>{number.uid_num}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अन्य फोन नंबर</h4>{number.other_num}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पुष्टीकरण</h4>{number.confirmation}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">टिप्पणी</h4>{number.remark?number.remark : "खाली"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मेल आई.डी.</h4>{number.mail_id?number.mail_id : "खाली"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">CAF तारीख</h4>{dateFormatter(number.caf_date)}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        <a style={{color:"#fff"},infoButtonStyle} class="ui right floated small btn btn-primary button ml-2 info-button" href={"more-info-number.php?num_id=" + number.number_id + "&com_id=" + idFetcher()}>More Info</a> 
                                        <a style={{color:"#fff"},pdfButtonStyle} class="ui small button pdf-button" href="#">Download PDF</a> 
                                    </th>
                                </tr>
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No phone numbers addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
    
    class BankAccounts extends React.Component {
        state = {
           accounts:[],
        }
        componentDidMount(){
            this.fetchAccounts();
        }
        fetchAccounts(){
                let id = idFetcher();               
                fetch(`../api/data/read_bank_account.php?complaint_id=${id}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({accounts: data.accounts});
                })
                .catch(console.log)
        }
        
        render(){
            const pdfButtonStyle = {
                background:"#C50202",
                border: "2px solid #C50202",
                color:"#fff",
            }
            const infoButtonStyle ={
                backgroundColor: "#004ba8",
                border: "2px solid #004ba8",
                color:"#FFF",
            };
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">शिकायत संबंधी बैंक खाते</h1>
                        {
                            this.state.accounts ? this.state.accounts.map((account) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">खाता नंबर</h4>{account.acc_number}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक का नाम</h4>{account.bank_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">राज्य</h4>{account.state}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शाखा का नाम</h4>{account.branch_name}</td>
                                </tr>
                                <tr>
                                    <td class={dateFormatter(account.mail_date)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(account.mail_date)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(account.mail_date)!="00-00-0000"?dateFormatter(account.mail_date):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(account.mail_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(account.mail_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(account.mail_received)!="00-00-0000"?dateFormatter(account.mail_received):"मेल अभी तक नहीं मिला "}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">फ्रीज राशि</h4>{account.freeze_amount}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">KYC में नाम</h4>{account.kyc_name}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पता</h4>{account.address}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शहर</h4>{account.city}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">द्वितीय राज्य</h4>{account.state_twice}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वैकल्पिक फोन नंबर</h4>{account.alternate_number}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">लाभ खाता</h4>{account.profit_acc}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">इंटरनेट बैंकिंग</h4>{account.internet_banking}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक मैनेजर का नाम</h4>{account.bank_manager_name}</td>
                                      <td></td>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        
                                         <a style={{color:"#fff"},infoButtonStyle} class="info-button ui right floated small btn btn-primary button ml-2" href={"more-info-bank.php?acc_id=" + account.acc_id + "&com_id=" + idFetcher()}>More Info</a> 
                                           <a style={{color:"#fff"},pdfButtonStyle}  class="ui small button pdf-button mr-2" href="#">Download KYC PDF</a> 
                                           <a style={{color:"#fff"},pdfButtonStyle} class="ui small button pdf-button" href="#">Bank Statement File</a> 
                                    </th>
                                </tr>
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No bank accounts addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
    
    class Ewallets extends React.Component {
        state = {
           ewallets:[],
        }
        componentDidMount(){
            this.fetchEwallets();
        }
        fetchEwallets(){
                let id = idFetcher();               
                fetch(`../api/data/read_suspect_ewallet.php?complaint_id=${id}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({ewallets: data.ewallet});
                })
                .catch(console.log)
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">शिकायत संबंधी ई-वॉलेट</h1>
                        {
                            this.state.ewallets ? this.state.ewallets.map((ewallet) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI का नाम</h4>{ewallet.upi_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मोबाइल नंबर</h4>{ewallet.mob_number}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">VPA ID</h4>{ewallet.vpa_id}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">कथन (Statement)</h4>{ewallet.statement}</td>
                                </tr>
                                <tr>
                                    <td class={dateFormatter(ewallet.email_sent)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(ewallet.email_sent)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(ewallet.email_sent)!="00-00-0000"?dateFormatter(ewallet.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(ewallet.email_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(ewallet.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(ewallet.email_received)!="00-00-0000"?dateFormatter(ewallet.email_received):"मेल अभी तक नहीं मिला "}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">जुड़ा हुआ खाता</h4>{ewallet.linked_account}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IP Address</h4>{ewallet.ip_address}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IP Address नंबर</h4>{ewallet.ip_add_number}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">डिवाइस आईडी</h4>{ewallet.device_id}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">व्यापार (Merchandise)</h4>{ewallet.merchandise}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मौजूद राशि</h4>{ewallet.hold_amount}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">नंबर</h4>{ewallet.number}</td>
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
                                <div class="alert alert-warning not-found-alert" role="alert">No ewallets addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
    
    class Websites extends React.Component {
        state = {
           websites:[],
        }
        componentDidMount(){
            this.fetchWebsites();
        }
        fetchWebsites(){
                let id = idFetcher();               
                fetch(`../api/data/read_suspect_website.php?complaint_id=${id}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({websites: data.website});
                })
                .catch(console.log)
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">शिकायत संबंधी वेबसाइट</h1>
                        {
                            this.state.websites ? this.state.websites.map((website) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट का नाम</h4>{website.website_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट का डोमेन</h4>{website.website_domain}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल आईडी</h4>{website.mail_id}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट मोबाइल नंबर</h4>{website.website_mobile_number}</td>
                                </tr>
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No websites addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
    

    class AllDetails extends React.Component {
        state = {
            applicant: {},
        }
        componentDidMount(){
            this.fetchApplicantData();

        }
        fetchApplicantData(){
                let id = idFetcher();               
                fetch('../api/data/read_all_complainee.php')
                .then(res => res.json())
                .then((data) => {
                const applicant = data.complainee.filter(complaint => complaint.complaint_id == id);
                this.setState({ applicant: applicant[0] });
                })
                .catch(console.log)
        }
        render(){

            return(
                <center>
                    <h1 class="h1 mt-3 h1-complaint">शिकायत क्रमांक <span style={{color:"red"}}>{this.state.applicant.complaint_no}</span> का पूरा विवरण</h1>
                    <Applicant />
                    <Suspect />
                    <Numbers />
                    <BankAccounts />
                    <Ewallets />
                    <Websites />
                </center>
            )
        }
    }
  ReactDOM.render(<AllDetails />, document.getElementById('show-complaint'))

</script>