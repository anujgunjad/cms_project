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
const updateBasicDetails = () => {
    alert("updateclicked");
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
                console.log(applicant);
                console.log(document.getElementById("ap_name").value);
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
                                    <td style={{fontSize:"1.11rem"}}><h4 style={{color:"red"}} class="ui header mb-1 mt-1">शिकायत क्रमांक</h4>{this.state.applicant.complaint_no?this.state.applicant.complaint_no:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का नाम</h4><input class="rounded py-2 mt-1 px-2" id="ap_name" type="text" placeholder={this.state.applicant.ap_name} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की उम्र</h4><input class="rounded py-2 mt-1 px-2" id="ap_age" type="number" placeholder={this.state.applicant.ap_age} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का मोबाइल नंबर</h4><input class="rounded py-2 mt-1 px-2" id="ap_mob" type="number" placeholder={this.state.applicant.ap_mob} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का पता</h4><input class="rounded py-2 mt-1 px-2" id="ap_address" type="text" name="name" placeholder={this.state.applicant.ap_address} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का लिंग</h4><select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="gender" id="gender"><option value="">{this.state.applicant.ap_gender}</option><option value="1">Male</option><option value="2">Female</option></select></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का देश</h4><select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="country" id="country"><option value="">{this.state.applicant.ap_country}</option></select></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का राज्य</h4><select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="states" id="states"><option value="">{this.state.applicant.ap_state}</option></select></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का शहर</h4><select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="city" id="city"><option value="">{this.state.applicant.ap_city}</option></select></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पिन कोड</h4><input class="rounded py-2 mt-1 px-2" id="ap_pin_code" type="number"  placeholder={this.state.applicant.ap_pin_code} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आधार क्रमांक</h4><input class="rounded py-2 mt-1 px-2" id="ap_adhar" type="number"  placeholder={this.state.applicant.ap_adhar} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का प्रकार</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="complaint-type" id="complaint-type">
                                            <option value="">{this.state.applicant.sub_complaint_type}</option>
                                            <option value="1">सोशल मीडिया</option>
                                            <option value="2">ऑनलाइन ठगी</option>
                                            <option value="3">साइबर आतंकवाद</option>
                                            <option value="4">अन्य</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का तरीका</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="complaint-type" id="complaint-type">
                                            <option value="">{this.state.applicant.complaint_type}</option>
                                            <option value="1">Online Bank Fraud</option>
                                            <option value="2">Job Fraud</option>
                                            <option value="3">OLX Fraud</option>
                                            <option value="4">KYC Fraud</option>
                                            <option value="5">Link Fraud</option>
                                            <option value="6">Screen Sharing App</option>
                                            <option value="7">Fake Facebook</option>
                                            <option value="8">Fake Instagram</option>
                                            <option value="9">Facebook Hack</option>
                                            <option value="10">Instagram Hack</option>
                                            <option value="11">Gmail Hack</option>
                                            <option value="12">Social Media Harassment</option>
                                            <option value="13">Whatsapp Harassment</option>
                                            <option value="14">Whatsapp Hack</option>
                                            <option value="15">Metrimonial Fraud</option>
                                            <option value="16">Custom Fraud</option>
                                            <option value="17">Other</option>
                                        </select>
                                    </td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आई टी ऐक्ट धारा</h4><input class="rounded py-2 mt-1 px-2" id="it_act" type="text" placeholder={this.state.applicant.it_act} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">भा द वि धारा</h4><input class="rounded py-2 mt-1 px-2" id="bh_dv" type="text" placeholder={this.state.applicant.bh_dv} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना की दिनांक</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id="crime-date" type="date" placeholder={this.state.applicant.crimeDate} /></td>
                                </tr>
                               <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना का समय</h4><input style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" id="crime-time" type="time" placeholder={this.state.applicant.crime_time} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की राशि</h4><input class="rounded py-2 mt-1 px-2" id="amount" type="number" placeholder={this.state.applicant.amount} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की फ्रीज राशि</h4><input class="rounded py-2 mt-1 px-2" id="freeze_amount" type="number" placeholder={this.state.applicant.freeze_amount} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">जांचकर्ता का नाम</h4><input class="rounded py-2 mt-1 px-2" id="checker_name" type="text" placeholder={this.state.applicant.checker_name} /></td>
                                </tr>
                               <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत दर्ज की दिनांक</h4>{this.state.createdDate?this.state.createdDate:"अभी तक दर्ज नहीं है"}</td>
                                    <td><button class="ui button update-button py-3 px-5" onclick="updateBasicDetails()">Update</button></td>
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
            this.fetchSuspectsData();

        }
        fetchSuspectsData(){
                let id = idFetcher();               
                fetch(`../api/data/read_suspects.php?complaint_id=${id}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({suspects: data.suspects});
                })
                .catch(console.log)
        }
        
        render(){
            return(
                <div>
                <center>
                <div class="ui segment blue mt-4 mb-5">
                <h1 class=" h1 h2-complaint">संदेहियों की जानकारी</h1>
                {
                            this.state.suspects ? this.state.suspects.map((suspect,i) => (    
                                <table class="ui celled table">
                                <tbody>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> संदिग्ध का नाम</h4>{suspect.suspect_name?suspect.suspect_name:"अभी तक दर्ज नहीं है"}</td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का पता</h4>{suspect.suspect_address?suspect.suspect_address:"अभी तक दर्ज नहीं है"}</td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का ईमेल</h4>{suspect.email_id?suspect.email_id:"अभी तक दर्ज नहीं है"}</td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का डोमेन नाम</h4>{suspect.domin_name?suspect.domin_name:"अभी तक दर्ज नहीं है"}</td>
                                    </tr>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI फोन नंबर</h4>{suspect.upi_phone_no?suspect.upi_phone_no:"अभी तक दर्ज नहीं है"}</td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI VPA </h4>{suspect.upivpa?suspect.upivpa:"अभी तक दर्ज नहीं है"}</td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">सॉफ्टवेयर का नाम</h4>{suspect.software_name?suspect.software_name:"अभी तक दर्ज नहीं है"}</td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत की कार्रवाई</h4>{suspect.complaint_action?suspect.complaint_action:"अभी तक दर्ज नहीं है"}</td>
                                    </tr>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">लंबित का कारण</h4>{suspect.pending_reason?suspect.pending_reason:"अभी तक दर्ज नहीं है"}</td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">टिप्पणी</h4>{suspect.remark?suspect.remark:"अभी तक दर्ज नहीं है"}</td>
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
                                <div class="alert alert-warning not-found-alert" role="alert">No Suspects addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
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
                    this.setState({numbers: data.numbers});
                    console.log(this.state.numbers);
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
                            this.state.numbers ? this.state.numbers.map((number,i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> फ़ोन नंबर</h4>{number.number?number.number:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">कंपनी</h4>{number.company?number.company:"अभी तक दर्ज नहीं है"}</td>
                                    <td class={dateFormatter(number.email_sent)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(number.email_sent)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(number.email_sent)!="00-00-0000"?dateFormatter(number.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(number.email_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(number.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(number.email_received)!="00-00-0000"?dateFormatter(number.email_received):"मेल अभी तक नहीं मिला "}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">दस्तावेज़</h4>{number.files?number.files:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का नाम</h4>{number.suspect_name?number.suspect_name:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का पता</h4>{number.suspect_address?number.number:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शहर</h4>{number.city?number.city:"अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">राज्य</h4>{number.state?number.state:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">रिटेलर का नाम</h4>{number.retailer_name?number.retailer_name:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UID नंबर</h4>{number.uid_num?number.uid_num:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अन्य फोन नंबर</h4>{number.other_num?number.other_num:"अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पुष्टीकरण</h4>{number.confirmation?number.confirmation:"अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">टिप्पणी</h4>{number.remark?number.remark : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मेल आई.डी.</h4>{number.mail_id?number.mail_id : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">CAF तारीख</h4>{dateFormatter(number.caf_date)?dateFormatter(number.caf_date) : "अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        <a style={{color:"#fff"},infoButtonStyle} class="ui right floated small btn btn-primary button ml-2 info-button" href={"more-info-number.php?num_id=" + number.number_id + "&com_id=" + idFetcher()}>More Info</a> 
                                        <a style={{color:"#fff"},pdfButtonStyle} class={number.pdf?"ui small button pdf-button":"ui disabled small button pdf-button"} href={number.pdf ?"../insertFiles/" + number.pdf : ""} download><i class="fa fa-download fa-fw" aria-hidden="true"></i> Download PDF</a> 
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
                    console.log(this.state.accounts);
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
                            this.state.accounts ? this.state.accounts.map((account,i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> खाता नंबर</h4>{account.acc_number?account.acc_number : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक का नाम</h4>{account.bank_name?account.bank_name : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">राज्य</h4>{account.state?account.state : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शाखा का नाम</h4>{account.branch_name?account.branch_name : "अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td class={dateFormatter(account.mail_date)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(account.mail_date)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(account.mail_date)!="00-00-0000"?dateFormatter(account.mail_date):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(account.mail_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(account.mail_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(account.mail_received)!="00-00-0000"?dateFormatter(account.mail_received):"मेल अभी तक नहीं मिला "}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">फ्रीज राशि</h4>{account.freeze_amount?account.freeze_amount : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">KYC में नाम</h4>{account.kyc_name?account.kyc_name : "अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पता</h4>{account.address?account.address : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शहर</h4>{account.city?account.city : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">द्वितीय राज्य</h4>{account.state_twice?account.state_twice : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वैकल्पिक फोन नंबर</h4>{account.alternate_number?account.alternate_number : "अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">लाभ खाता</h4>{account.profit_acc?account.profit_acc : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">इंटरनेट बैंकिंग</h4>{account.internet_banking?account.internet_banking : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक मैनेजर का नाम</h4>{account.bank_manager_name?account.bank_manager_name : "अभी तक दर्ज नहीं है"}</td>
                                      <td></td>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        
                                         <a style={{color:"#fff"},infoButtonStyle} class="info-button ui right floated small btn btn-primary button ml-2" href={"more-info-bank.php?acc_id=" + account.acc_id + "&com_id=" + idFetcher()}>More Info</a> 
                                           <a style={{color:"#fff"},pdfButtonStyle} class={account.kyc_pdf?"ui small button pdf-button mr-2":"ui disabled small button pdf-button mr-r"} href={account.kyc_pdf ?"../insertFiles/" + account.kyc_pdf : ""} download><i class="fa fa-download fa-fw" aria-hidden="true"></i> Download KYC PDF</a> 
                                           <a style={{color:"#fff"},pdfButtonStyle} class={account.bank_statement_file?"ui small button pdf-button":"ui disabled small button pdf-button"} href={account.bank_statement_file ?"../insertFiles/" + account.bank_statement_file : ""} download><i class="fa fa-download fa-fw" aria-hidden="true"></i> Bank Statement File</a> 
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
                            this.state.ewallets ? this.state.ewallets.map((ewallet,i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> UPI का नाम</h4>{ewallet.upi_name?ewallet.upi_name : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मोबाइल नंबर</h4>{ewallet.mob_number?ewallet.mob_number : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">VPA ID</h4>{ewallet.vpa_id?ewallet.vpa_id : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">कथन (Statement)</h4>{ewallet.statement?ewallet.statement : "अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td class={dateFormatter(ewallet.email_sent)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(ewallet.email_sent)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल भेजने की तारीख</h4>{dateFormatter(ewallet.email_sent)!="00-00-0000"?dateFormatter(ewallet.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(ewallet.email_received)!="00-00-0000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={dateFormatter(ewallet.email_received)!="00-00-0000"?"ui header mb-1 mt-1 success-text":"ui header mb-1 mt-1 danger-text"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(ewallet.email_received)!="00-00-0000"?dateFormatter(ewallet.email_received):"मेल अभी तक नहीं मिला "}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">जुड़ा हुआ खाता</h4>{ewallet.linked_account?ewallet.linked_account : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IP Address</h4>{ewallet.ip_address?ewallet.ip_address : "अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IP Address नंबर</h4>{ewallet.ip_add_number?ewallet.ip_add_number : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">डिवाइस आईडी</h4>{ewallet.device_id?ewallet.device_id : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">व्यापार (Merchandise)</h4>{ewallet.merchandise?ewallet.merchandise : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मौजूद राशि</h4>{ewallet.hold_amount?ewallet.hold_amount : "अभी तक दर्ज नहीं है"}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">नंबर</h4>{ewallet.number?ewallet.number : "अभी तक दर्ज नहीं है"}</td>
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
                            this.state.websites ? this.state.websites.map((website,i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> वेबसाइट का नाम</h4>{website.website_name?website.website_name : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट का डोमेन</h4>{website.website_domain?website.website_domain : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल आईडी</h4>{website.mail_id?website.mail_id : "अभी तक दर्ज नहीं है"}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट मोबाइल नंबर</h4>{website.website_mobile_number?website.website_mobile_number : "अभी तक दर्ज नहीं है"}</td>
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
                    <h1 class="h1 mt-3 h1-complaint">शिकायत क्रमांक <span style={{color:"red"}}>{this.state.applicant.complaint_no}</span> को अपडेट करें</h1>
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