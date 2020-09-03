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
          countries: [],
          newstates:[],
          cities:[],
          crimeDate:"",
          createdDate: "",
          updatedDate: "",
        }
        componentDidMount(){
            this.getCountries();
            this.fetchApplicantData();
        }
        getCountries(){
            fetch("../api/data/read_country.php")
            .then(res => res.json())
            .then((data) => {
              this.setState({countries: data.country});
            })
        }
        getStates = () => {
            let c_dd = document.getElementById("country"),
                c_id = c_dd.options[c_dd.selectedIndex].value ? c_dd.options[c_dd.selectedIndex].value : this.state.applicant.country_id;
            fetch(`../api/data/read_state.php?country_id=${c_id}`)
            .then(res => res.json())
            .then((data) => {
              this.setState({newstates: data.states});
            })
        }
        getCities = () => {
            let s_dd = document.getElementById("states"),
                s_id = s_dd.options[s_dd.selectedIndex].value ? s_dd.options[s_dd.selectedIndex].value : this.state.applicant.state_id;
                console.log(s_id);
            fetch(`../api/data/read_city.php?state_id=${s_id}`)
            .then(res => res.json())
            .then((data) => {
              this.setState({cities: data.cities});
            })
        }
        fetchApplicantData(){
                let id = idFetcher();               
                fetch(`../api/data/read_complainee.php?complaint_id=${id}`)
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
         updateBasicDetails = () => {
             let complaint_id_basic = this.state.applicant.complaint_id,
                complaint_no_basic = this.state.applicant.complaint_no,
                ap_name_basic = document.getElementById("ap_name").value?document.getElementById("ap_name").value : this.state.applicant.ap_name,
                ap_age_basic = document.getElementById("ap_age").value?document.getElementById("ap_age").value : this.state.applicant.ap_age,
                gdd = document.getElementById("gender"),
                ap_gender_basic = gdd.options[gdd.selectedIndex].value?gdd.options[gdd.selectedIndex].value : this.state.applicant.gender_id,
                ap_mob_basic = document.getElementById("ap_mob").value?document.getElementById("ap_mob").value : this.state.applicant.ap_mob,
                ap_address_basic = document.getElementById("ap_address").value?document.getElementById("ap_address").value : this.state.applicant.ap_address,
                c_dd = document.getElementById("country"),
                ap_country_basic = c_dd.options[c_dd.selectedIndex].value ? c_dd.options[c_dd.selectedIndex].value : this.state.applicant.country_id,
                s_dd = document.getElementById("states"),
                ap_state_basic = s_dd.options[s_dd.selectedIndex].value ? s_dd.options[s_dd.selectedIndex].value : this.state.applicant.state_id,
                ci_dd = document.getElementById("city"),
                ap_city_basic = ci_dd.options[ci_dd.selectedIndex].value ? ci_dd.options[ci_dd.selectedIndex].value : this.state.applicant.city_id,
                ap_pin_code_basic = document.getElementById("ap_pin_code").value?document.getElementById("ap_pin_code").value : this.state.applicant.ap_pin_code,
                ap_adhar_basic = document.getElementById("ap_adhar").value?document.getElementById("ap_adhar").value : this.state.applicant.ap_adhar,
                ctdd = document.getElementById("complaint_type"),
                complaint_type_basic = ctdd.options[ctdd.selectedIndex].value ? ctdd.options[ctdd.selectedIndex].value : this.state.applicant.complaint_type_id,
                sctdd = document.getElementById("complaint_type"),
                sub_complaint_type_basic = sctdd.options[sctdd.selectedIndex].value ? sctdd.options[sctdd.selectedIndex].value : this.state.applicant.sub_complaint_type_id,
                it_act_basic = document.getElementById("it_act").value?document.getElementById("it_act").value : this.state.applicant.it_act,
                bh_dv_basic = document.getElementById("bh_dv").value?document.getElementById("bh_dv").value : this.state.applicant.bh_dv,
                crime_date_basic = document.getElementById("crime_date").value?document.getElementById("crime_date").value : this.state.applicant.crime_date,
                crime_time_basic = document.getElementById("crime_time").value?document.getElementById("crime_time").value : this.state.applicant.crime_time,
                amount_basic = document.getElementById("amount").value?document.getElementById("amount").value : this.state.applicant.amount,
                freeze_amount_basic = document.getElementById("freeze_amount").value?document.getElementById("freeze_amount").value : this.state.applicant.freeze_amount,
                checker_name_basic = document.getElementById("checker_name").value?document.getElementById("checker_name").value : this.state.applicant.checker_name,
                created_date_basic =  this.state.applicant.created_date,
                last_update_basic =  Date.toLocaleString(),
                complaint_status_basic =  this.state.applicant.complaint_status;
            fetch("../api/data/update_basic.php", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_basic, 
                    complaint_no_basic, 
                    ap_name_basic, 
                    ap_age_basic, 
                    ap_gender_basic, 
                    ap_mob_basic, 
                    ap_address_basic, 
                    ap_country_basic, 
                    ap_state_basic, 
                    ap_city_basic, 
                    ap_pin_code_basic, 
                    ap_adhar_basic, 
                    complaint_type_basic, 
                    sub_complaint_type_basic, 
                    it_act_basic, 
                    bh_dv_basic, 
                    crime_date_basic, 
                    crime_time_basic, 
                    amount_basic, 
                    freeze_amount_basic, 
                    checker_name_basic, 
                    created_date_basic, 
                    last_update_basic, 
                    complaint_status_basic, 
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
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का देश</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="country" id="country" onChange={this.getStates}>
                                            <option value="">{this.state.applicant.ap_country}</option>
                                            {
                                                this.state.countries.map((country) => <option value={country.id}>{country.name}</option>)
                                            }
                                        </select>
                                    </td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का राज्य</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="states" id="states" onChange={this.getCities}>
                                            <option value="">{this.state.applicant.ap_state}</option>
                                            {
                                                this.state.newstates.map((state) => <option value={state.id}>{state.name}</option>)
                                            }
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का शहर</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="city" id="city">
                                            <option value="">{this.state.applicant.ap_city}</option>
                                            {
                                                this.state.cities.map((city) => <option value={city.id}>{city.name}</option>)
                                            }
                                        </select>
                                    </td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पिन कोड</h4><input class="rounded py-2 mt-1 px-2" id="ap_pin_code" type="number"  placeholder={this.state.applicant.ap_pin_code} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आधार क्रमांक</h4><input class="rounded py-2 mt-1 px-2" id="ap_adhar" type="number"  placeholder={this.state.applicant.ap_adhar} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का प्रकार</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="complaint-type" id="complaint_type">
                                            <option value="">{this.state.applicant.complaint_type}</option>
                                            <option value="1">सोशल मीडिया</option>
                                            <option value="2">ऑनलाइन ठगी</option>
                                            <option value="3">साइबर आतंकवाद</option>
                                            <option value="4">अन्य</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का तरीका</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="sub_complaint_type" id="sub_complaint_type">
                                            <option value="">{this.state.applicant.sub_complaint_type}</option>
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
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना की दिनांक</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id="crime_date" type="date" placeholder={this.state.applicant.crimeDate} /></td>
                                </tr>
                               <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना का समय</h4><input style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" id="crime_time" type="time" placeholder={this.state.applicant.crime_time} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की राशि</h4><input class="rounded py-2 mt-1 px-2" id="amount" type="number" placeholder={this.state.applicant.amount} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की फ्रीज राशि</h4><input class="rounded py-2 mt-1 px-2" id="freeze_amount" type="number" placeholder={this.state.applicant.freeze_amount} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">जांचकर्ता का नाम</h4><input class="rounded py-2 mt-1 px-2" id="checker_name" type="text" placeholder={this.state.applicant.checker_name} /></td>
                                </tr>
                               <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत दर्ज की दिनांक</h4>{this.state.createdDate?this.state.createdDate:"अभी तक दर्ज नहीं है"}</td>
                                    <td><button class="ui button update-button py-3 px-5" onClick={this.updateBasicDetails}>Update</button></td>
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
                    console.log("hiadfhsdkjf");
                    console.log(data.suspects);
                })
                .catch(console.log)
        }
        updateSuspectDetails = (suspect_id) => {
            let id = idFetcher(); 
            const suspectArry = this.state.accounts.filter(suspect => suspect.suspect_id == suspect_id);
            const account = accountArry[0];
            let complaint_id_suspect = id,
                suspect_id_suspect = account.suspect_id,
                suspect_name_suspect = document.getElementById("sus_suspect_name_" + suspect_id).value?document.getElementById("sus_suspect_name_" + suspect_id).value : suspect.suspect_name,
                suspect_address_suspect = document.getElementById("sus_suspect_address_" + suspect_id).value?document.getElementById("sus_suspect_address_" + suspect_id).value : suspect.suspect_address,
                suspect_mob_suspect = document.getElementById("sus_suspect_address_" + suspect_id).value?document.getElementById("sus_suspect_address_" + suspect_id).value : suspect.suspect_address,
                
                created_date_acc = account.created_date,
                last_updated_acc = Date().toLocaleString();
                console.log(acc_number_acc);
            fetch("", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_acc,
                    acc_id_acc,
                    acc_number_acc,
                    bank_name_acc,
                    state_acc,          
                    branch_name_acc,
                    mail_date_acc,
                    bank_manager_number_acc,
                    kyc_pdf_acc,
                    bank_statement_file_acc,
                    created_date_acc,
                    last_updated_acc,
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
                <h1 class=" h1 h2-complaint">संदेहियों की जानकारी</h1>
                {
                            this.state.suspects ? this.state.suspects.map((suspect,i) => (    
                                <table class="ui celled table">
                                <tbody>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> संदिग्ध का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"sus_suspect_name_" + suspect.suspect_id } type="text" placeholder={suspect.suspect_name} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का पता</h4><input class="rounded py-2 mt-1 px-2" id={"sus_suspect_address_" + suspect.suspect_id } type="text" placeholder={suspect.suspect_address} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का फोन नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"sus_suspect_mob_" + suspect.suspect_id } type="text" placeholder={suspect.suspect_mob} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का ईमेल</h4><input class="rounded py-2 mt-1 px-2" id={"sus_email_id_" + suspect.suspect_id } type="text" placeholder={suspect.email_id} /></td>
                                    </tr>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का डोमेन नाम</h4><input class="rounded py-2 mt-1 px-2" id={"sus_domain_name_" + suspect.suspect_id } type="text" placeholder={suspect.domain_name} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI फोन नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"sus_upi_phone_no_" + suspect.suspect_id } type="number" placeholder={suspect.upi_phone_no} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UPI VPA </h4><input class="rounded py-2 mt-1 px-2" id={"sus_upivpa_" + suspect.suspect_id } type="text" placeholder={suspect.upivpa} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">सॉफ्टवेयर का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"sus_software_name_" + suspect.suspect_id } type="text" placeholder={suspect.software_name} /></td>
                                    </tr>
                                    <tr>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत की कार्रवाई</h4><input class="rounded py-2 mt-1 px-2" id={"sus_somplaint_action_" + suspect.suspect_id } type="text" placeholder={suspect.somplaint_action} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">लंबित का कारण</h4><input class="rounded py-2 mt-1 px-2" id={"sus_pending_reason_" + suspect.suspect_id } type="text" placeholder={suspect.pending_reason} /></td>
                                        <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">टिप्पणी</h4><input class="rounded py-2 mt-1 px-2" id={"sus_remark_" + suspect.suspect_id } type="text" placeholder={suspect.remark} /></td>
                                        <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateSuspectDetails(suspect.suspect_id)}>Update</button></td>
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
        updateNumberDetails = (number_id) => {
            let id = idFetcher(); 
            const accountArry = this.state.accounts.filter(account => account.acc_id == account_id);
            const account = accountArry[0];
            let complaint_id_acc = id,
                acc_id_acc = account.acc_id,
                acc_number_acc = document.getElementById("acc_number_" + account_id).value?document.getElementById("acc_number_" + account_id).value : account.acc_number,
                bank_name_acc = document.getElementById("acc_bank_name_" + account_id).value?document.getElementById("acc_bank_name_" + account_id).value : account.bank_name,
                state_acc = document.getElementById("acc_state_" + account_id).value?document.getElementById("acc_state_" + account_id).value : account.state,
                branch_name_acc = document.getElementById("acc_branch_name_" + account_id).value?document.getElementById("acc_branch_name_" + account_id).value : account.branch_name,
                mail_date_acc = document.getElementById("acc_mail_date_" + account_id).value?document.getElementById("acc_mail_date_" + account_id).value : account.mail_date,
                mail_received_acc = document.getElementById("acc_mail_recieved_" + account_id).value?document.getElementById("acc_mail_recieved_" + account_id).value : account.mail_received,
                freeze_amount_acc = document.getElementById("acc_freeze_amount_" + account_id).value?document.getElementById("acc_freeze_amount_" + account_id).value : account.freeze_amount,
                kyc_name_acc = document.getElementById("acc_kyc_name_" + account_id).value?document.getElementById("acc_kyc_name_" + account_id).value : account.kyc_name,
                address_acc = document.getElementById("acc_address_" + account_id).value?document.getElementById("acc_address_" + account_id).value : account.address,
                city_acc = document.getElementById("acc_city_" + account_id).value?document.getElementById("acc_city_" + account_id).value : account.city,
                state_twice_acc = document.getElementById("acc_state_twice_" + account_id).value?document.getElementById("acc_state_twice_" + account_id).value : account.state_twice,
                altername_number_acc = document.getElementById("acc_alternate_number_" + account_id).value?document.getElementById("acc_alternate_number_" + account_id).value : account.alternate_number,
                profit_acc_acc = document.getElementById("acc_profit_acc_" + account_id).value?document.getElementById("acc_profit_acc_" + account_id).value : account.profit_acc,
                internet_banking_acc = document.getElementById("acc_internet_banking_" + account_id).value?document.getElementById("acc_internet_banking_" + account_id).value : account.internet_banking,
                bank_manager_name_acc = document.getElementById("acc_bank_manager_name_" + account_id).value?document.getElementById("acc_bank_manager_name_" + account_id).value : account.bank_manager_name,
                bank_manager_number_acc = account.bank_manager_number,
                kyc_pdf_acc = account.kyc_pdf,
                bank_statement_file_acc = account.bank_statement_file,
                created_date_acc = account.created_date,
                last_updated_acc = Date().toLocaleString();
                console.log(acc_number_acc);
            fetch("", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_acc,
                    acc_id_acc,
                    acc_number_acc,
                    bank_name_acc,
                    state_acc,          
                    branch_name_acc,
                    mail_date_acc,
                    mail_received_acc,
                    freeze_amount_acc,
                    kyc_name_acc,
                    address_acc,
                    city_acc,
                    state_twice_acc,
                    altername_number_acc,
                    profit_acc_acc,
                    internet_banking_acc,
                    bank_manager_name_acc,
                    bank_manager_number_acc,
                    kyc_pdf_acc,
                    bank_statement_file_acc,
                    created_date_acc,
                    last_updated_acc,
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
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> फ़ोन नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"num_number_" + number.number_id } type="number" placeholder={number.number} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">कंपनी</h4><input class="rounded py-2 mt-1 px-2" id={"num_company_" + number.number_id } type="text" placeholder={number.company} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल भेजने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"num_email_sent_" + number.number_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल प्राप्त करने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"num_email_received_" + number.number_id } type="date" /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">दस्तावेज़</h4><input class="rounded py-2 mt-1 px-2" id={"num_files_" + number.number_id } type="text" placeholder={number.files} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"num_suspect_name_" + number.number_id } type="text" placeholder={number.suspect_name} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध का पता</h4><input class="rounded py-2 mt-1 px-2" id={"num_suspect_address_" + number.number_id } type="text" placeholder={number.suspect_address} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शहर</h4><input class="rounded py-2 mt-1 px-2" id={"num_city_" + number.number_id } type="text" placeholder={number.city} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">राज्य</h4><input class="rounded py-2 mt-1 px-2" id={"num_state_" + number.number_id } type="text" placeholder={number.state} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">रिटेलर का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"num_retailer_name_" + number.number_id } type="text" placeholder={number.retailer_name} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">UID नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"num_uid_num_" + number.number_id } type="number" placeholder={number.uid_num} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अन्य फोन नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"num_other_num_" + number.number_id } type="number" placeholder={number.other_num} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पुष्टीकरण</h4><input class="rounded py-2 mt-1 px-2" id={"num_confirmation_" + number.number_id } type="text" placeholder={number.confirmation} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">टिप्पणी</h4><input class="rounded py-2 mt-1 px-2" id={"num_remark_" + number.number_id } type="text" placeholder={number.remark} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मेल आई.डी.</h4><input class="rounded py-2 mt-1 px-2" id={"num_mail_id_" + number.number_id } type="text" placeholder={number.mail_id} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">CAF तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"num_caf_date_" + number.number_id } type="date" /></td>
                                </tr>
                                <tr>
                                    <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateNumberDetails(number.number_id)}>Update</button></td>
                                    <th colspan="3">
                                        <a style={{color:"#fff"},infoButtonStyle} class="ui right floated small btn btn-primary button ml-2 info-button" href={"more-info-number.php?num_id=" + number.number_id + "&com_id=" + idFetcher()}>Edit More Info</a> 
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
        updateAccountDetails = (account_id) => {
            let id = idFetcher(); 
            const accountArry = this.state.accounts.filter(account => account.acc_id == account_id);
            const account = accountArry[0];
            let complaint_id_acc = id,
                acc_id_acc = account.acc_id,
                acc_number_acc = document.getElementById("acc_number_" + account_id).value?document.getElementById("acc_number_" + account_id).value : account.acc_number,
                bank_name_acc = document.getElementById("acc_bank_name_" + account_id).value?document.getElementById("acc_bank_name_" + account_id).value : account.bank_name,
                state_acc = document.getElementById("acc_state_" + account_id).value?document.getElementById("acc_state_" + account_id).value : account.state,
                branch_name_acc = document.getElementById("acc_branch_name_" + account_id).value?document.getElementById("acc_branch_name_" + account_id).value : account.branch_name,
                mail_date_acc = document.getElementById("acc_mail_date_" + account_id).value?document.getElementById("acc_mail_date_" + account_id).value : account.mail_date,
                mail_received_acc = document.getElementById("acc_mail_recieved_" + account_id).value?document.getElementById("acc_mail_recieved_" + account_id).value : account.mail_received,
                freeze_amount_acc = document.getElementById("acc_freeze_amount_" + account_id).value?document.getElementById("acc_freeze_amount_" + account_id).value : account.freeze_amount,
                kyc_name_acc = document.getElementById("acc_kyc_name_" + account_id).value?document.getElementById("acc_kyc_name_" + account_id).value : account.kyc_name,
                address_acc = document.getElementById("acc_address_" + account_id).value?document.getElementById("acc_address_" + account_id).value : account.address,
                city_acc = document.getElementById("acc_city_" + account_id).value?document.getElementById("acc_city_" + account_id).value : account.city,
                state_twice_acc = document.getElementById("acc_state_twice_" + account_id).value?document.getElementById("acc_state_twice_" + account_id).value : account.state_twice,
                altername_number_acc = document.getElementById("acc_alternate_number_" + account_id).value?document.getElementById("acc_alternate_number_" + account_id).value : account.alternate_number,
                profit_acc_acc = document.getElementById("acc_profit_acc_" + account_id).value?document.getElementById("acc_profit_acc_" + account_id).value : account.profit_acc,
                internet_banking_acc = document.getElementById("acc_internet_banking_" + account_id).value?document.getElementById("acc_internet_banking_" + account_id).value : account.internet_banking,
                bank_manager_name_acc = document.getElementById("acc_bank_manager_name_" + account_id).value?document.getElementById("acc_bank_manager_name_" + account_id).value : account.bank_manager_name,
                bank_manager_number_acc = account.bank_manager_number,
                kyc_pdf_acc = account.kyc_pdf,
                bank_statement_file_acc = account.bank_statement_file,
                created_date_acc = account.created_date,
                last_updated_acc = Date().toLocaleString();
                console.log(acc_number_acc);
            fetch("../api/data/update_account.php", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_acc,
                    acc_id_acc,
                    acc_number_acc,
                    bank_name_acc,
                    state_acc,          
                    branch_name_acc,
                    mail_date_acc,
                    mail_received_acc,
                    freeze_amount_acc,
                    kyc_name_acc,
                    address_acc,
                    city_acc,
                    state_twice_acc,
                    altername_number_acc,
                    profit_acc_acc,
                    internet_banking_acc,
                    bank_manager_name_acc,
                    bank_manager_number_acc,
                    kyc_pdf_acc,
                    bank_statement_file_acc,
                    created_date_acc,
                    last_updated_acc,
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
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> खाता नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"acc_number_" + account.acc_id } type="number" placeholder={account.acc_number} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"acc_bank_name_" + account.acc_id } type="text" placeholder={account.bank_name} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">राज्य</h4><input class="rounded py-2 mt-1 px-2" id={"acc_state_" + account.acc_id } type="text" placeholder={account.state} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शाखा का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"acc_branch_name_" + account.acc_id } type="text" placeholder={account.branch_name} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल भेजने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"acc_mail_date_" + account.acc_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल प्राप्त करने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"acc_mail_recieved_" + account.acc_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">फ्रीज राशि</h4><input class="rounded py-2 mt-1 px-2" id={"acc_freeze_amount_" + account.acc_id } type="number" placeholder={account.freeze_amount} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">KYC में नाम</h4><input class="rounded py-2 mt-1 px-2" id={"acc_kyc_name_" + account.acc_id } type="text" placeholder={account.kyc_name} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पता</h4><input class="rounded py-2 mt-1 px-2" id={"acc_address_" + account.acc_id } type="text" placeholder={account.address} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शहर</h4><input class="rounded py-2 mt-1 px-2" id={"acc_city_" + account.acc_id } type="text" placeholder={account.city} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">द्वितीय राज्य</h4><input class="rounded py-2 mt-1 px-2" id={"acc_state_twice_" + account.acc_id } type="text" placeholder={account.state_twice} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वैकल्पिक फोन नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"acc_alternate_number_" + account.acc_id } type="number" placeholder={account.alternate_number} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">लाभ खाता</h4><input class="rounded py-2 mt-1 px-2" id={"acc_profit_acc_" + account.acc_id } type="text" placeholder={account.profit_acc} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">इंटरनेट बैंकिंग</h4><input class="rounded py-2 mt-1 px-2" id={"acc_internet_banking_" + account.acc_id } type="text" placeholder={account.internet_banking} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक मैनेजर का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"acc_bank_manager_name_" + account.acc_id } type="text" placeholder={account.bank_manager_name} /></td>
                                    <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateAccountDetails(account.acc_id)}>Update</button></td>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                         <a style={{color:"#fff"},infoButtonStyle} class="info-button ui right floated small btn btn-primary button ml-2" href={"update-more-info-bank.php?acc_id=" + account.acc_id + "&com_id=" + idFetcher()}>Edit More Info</a> 
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
        
        updateEwalletsDetails = (suspect_ewallet_id) => {
            let id = idFetcher(); 
            const accountArry = this.state.accounts.filter(account => account.acc_id == account_id);
            const account = accountArry[0];
            let complaint_id_acc = id,
                acc_id_acc = account.acc_id,
                acc_number_acc = document.getElementById("acc_number_" + account_id).value?document.getElementById("acc_number_" + account_id).value : account.acc_number,
                bank_name_acc = document.getElementById("acc_bank_name_" + account_id).value?document.getElementById("acc_bank_name_" + account_id).value : account.bank_name,
                state_acc = document.getElementById("acc_state_" + account_id).value?document.getElementById("acc_state_" + account_id).value : account.state,
                branch_name_acc = document.getElementById("acc_branch_name_" + account_id).value?document.getElementById("acc_branch_name_" + account_id).value : account.branch_name,
                mail_date_acc = document.getElementById("acc_mail_date_" + account_id).value?document.getElementById("acc_mail_date_" + account_id).value : account.mail_date,
                mail_received_acc = document.getElementById("acc_mail_recieved_" + account_id).value?document.getElementById("acc_mail_recieved_" + account_id).value : account.mail_received,
                freeze_amount_acc = document.getElementById("acc_freeze_amount_" + account_id).value?document.getElementById("acc_freeze_amount_" + account_id).value : account.freeze_amount,
                kyc_name_acc = document.getElementById("acc_kyc_name_" + account_id).value?document.getElementById("acc_kyc_name_" + account_id).value : account.kyc_name,
                address_acc = document.getElementById("acc_address_" + account_id).value?document.getElementById("acc_address_" + account_id).value : account.address,
                city_acc = document.getElementById("acc_city_" + account_id).value?document.getElementById("acc_city_" + account_id).value : account.city,
                state_twice_acc = document.getElementById("acc_state_twice_" + account_id).value?document.getElementById("acc_state_twice_" + account_id).value : account.state_twice,
                altername_number_acc = document.getElementById("acc_alternate_number_" + account_id).value?document.getElementById("acc_alternate_number_" + account_id).value : account.alternate_number,
                profit_acc_acc = document.getElementById("acc_profit_acc_" + account_id).value?document.getElementById("acc_profit_acc_" + account_id).value : account.profit_acc,
                internet_banking_acc = document.getElementById("acc_internet_banking_" + account_id).value?document.getElementById("acc_internet_banking_" + account_id).value : account.internet_banking,
                bank_manager_name_acc = document.getElementById("acc_bank_manager_name_" + account_id).value?document.getElementById("acc_bank_manager_name_" + account_id).value : account.bank_manager_name,
                bank_manager_number_acc = account.bank_manager_number,
                kyc_pdf_acc = account.kyc_pdf,
                bank_statement_file_acc = account.bank_statement_file,
                created_date_acc = account.created_date,
                last_updated_acc = Date().toLocaleString();
                console.log(acc_number_acc);
            fetch("", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_acc,
                    acc_id_acc,
                    acc_number_acc,
                    bank_name_acc,
                    state_acc,          
                    branch_name_acc,
                    mail_date_acc,
                    mail_received_acc,
                    freeze_amount_acc,
                    kyc_name_acc,
                    address_acc,
                    city_acc,
                    state_twice_acc,
                    altername_number_acc,
                    profit_acc_acc,
                    internet_banking_acc,
                    bank_manager_name_acc,
                    bank_manager_number_acc,
                    kyc_pdf_acc,
                    bank_statement_file_acc,
                    created_date_acc,
                    last_updated_acc,
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
                <h1 class=" h1 h2-complaint">शिकायत संबंधी ई-वॉलेट</h1>
                        {
                            this.state.ewallets ? this.state.ewallets.map((ewallet,i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> UPI का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_upi_name_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.upi_name} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मोबाइल नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_mob_number_" + ewallet.suspect_ewallet_id } type="number" placeholder={ewallet.mob_number} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">VPA ID</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_vpa_id_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.vpa_id} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">कथन (Statement)</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_statement_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.statement} /></td>
                                </tr>
                                <tr>
                                <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल भेजने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"ewallet_email_sent_" + ewallet.suspect_ewallet_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल प्राप्त करने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id={"ewallet_email_received_" + ewallet.suspect_ewallet_id } type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">जुड़ा हुआ खाता</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_linked_account_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.linked_account} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IP Address</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_ip_address_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.ip_address} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IP Address नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_ip_add_number_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.ip_add_number} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">डिवाइस आईडी</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_device_id_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.device_id} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">व्यापार (Merchandise)</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_merchandise_" + ewallet.suspect_ewallet_id } type="text" placeholder={ewallet.merchandise} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">मौजूद राशि</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_hold_amount_" + ewallet.suspect_ewallet_id } type="number" placeholder={ewallet.hold_amount} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"ewallet_number_" + ewallet.suspect_ewallet_id } type="number" placeholder={ewallet.number} /></td>
                                    <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateEwalletsDetails(ewallet.suspect_ewallet_id)}>Update</button></td>
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
        
        updateWebsiteDetails = (website_id) => {
            let id = idFetcher(); 
            const accountArry = this.state.accounts.filter(account => account.acc_id == account_id);
            const account = accountArry[0];
            let complaint_id_acc = id,
                acc_id_acc = account.acc_id,
                acc_number_acc = document.getElementById("acc_number_" + account_id).value?document.getElementById("acc_number_" + account_id).value : account.acc_number,
                bank_name_acc = document.getElementById("acc_bank_name_" + account_id).value?document.getElementById("acc_bank_name_" + account_id).value : account.bank_name,
                state_acc = document.getElementById("acc_state_" + account_id).value?document.getElementById("acc_state_" + account_id).value : account.state,
                created_date_acc = account.created_date,
                last_updated_acc = Date().toLocaleString();
                console.log(acc_number_acc);
            fetch("", { 
                // Adding method type 
                method: "POST", 
                // Adding body or contents to send 
                body: JSON.stringify({ 
                    complaint_id_acc,
                    acc_id_acc,
                    acc_number_acc,
                    bank_name_acc,
                    state_acc,          
                    branch_name_acc,
                    bank_statement_file_acc,
                    created_date_acc,
                    last_updated_acc,
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
                <h1 class=" h1 h2-complaint">शिकायत संबंधी वेबसाइट</h1>
                        {
                            this.state.websites ? this.state.websites.map((website,i) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> वेबसाइट का नाम</h4><input class="rounded py-2 mt-1 px-2" id={"web_website_name_" + website.website_id } type="text" placeholder={website.website_name } /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट का डोमेन</h4><input class="rounded py-2 mt-1 px-2" id={"web_website_domain_" + website.website_id } type="text" placeholder={website.website_domain } /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल आईडी</h4><input class="rounded py-2 mt-1 px-2" id={"web_mail_id_" + website.website_id } type="text" placeholder={website.mail_id } /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वेबसाइट मोबाइल नंबर</h4><input class="rounded py-2 mt-1 px-2" id={"web_website_mobile_number_" + website.website_id } type="number" placeholder={website.website_mobile_number } /></td>
                                </tr>
                                <tr>
                                <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateWebsiteDetails(website.website_id)}>Update</button></td>
                                <td colspan="3"></td>
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