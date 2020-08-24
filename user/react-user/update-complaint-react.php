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
            this.getStates();
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
                c_id = c_dd.options[c_dd.selectedIndex].value;
            fetch(`../api/data/read_state.php?country_id=${c_id}`)
            .then(res => res.json())
            .then((data) => {
              this.setState({newstates: data.states});
            })
        }
        getCities = () => {
            let s_dd = document.getElementById("states"),
                s_id = s_dd.options[s_dd.selectedIndex].value;
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
                ap_gender_basic = 1,
                ap_mob_basic = document.getElementById("ap_mob").value?document.getElementById("ap_mob").value : this.state.applicant.ap_mob,
                ap_address_basic = document.getElementById("ap_address").value?document.getElementById("ap_address").value : this.state.applicant.ap_address,
                c_dd = document.getElementById("country"),
                ap_country_basic = c_dd.options[c_dd.selectedIndex].value,
                s_dd = document.getElementById("states"),
                ap_state_basic = s_dd.options[s_dd.selectedIndex].value,
                ci_dd = document.getElementById("city"),
                ap_city_basic = ci_dd.options[ci_dd.selectedIndex].value,
                ap_pin_code_basic = document.getElementById("ap_pin_code").value?document.getElementById("ap_pin_code").value : this.state.applicant.ap_pin_code,
                ap_adhar_basic = document.getElementById("ap_adhar").value?document.getElementById("ap_adhar").value : this.state.applicant.ap_adhar,
                ctdd = document.getElementById("complaint_type"),
                complaint_type_basic = ctdd.options[ctdd.selectedIndex].value,
                sctdd = document.getElementById("complaint_type"),
                sub_complaint_type_basic = sctdd.options[sctdd.selectedIndex].value,
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
                                            <option value="101">{this.state.applicant.ap_country}</option>
                                            {
                                                this.state.countries.map((country) => <option value={country.id}>{country.name}</option>)
                                            }
                                        </select>
                                    </td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का राज्य</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="states" id="states" onChange={this.getCities}>
                                            <option value="21">{this.state.applicant.ap_state}</option>
                                            {
                                                this.state.newstates.map((state) => <option value={state.id}>{state.name}</option>)
                                            }
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का शहर</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="city" id="city">
                                            <option value="21">{this.state.applicant.ap_city}</option>
                                            {
                                                this.state.cities.map((city) => <option value={city.id}>{city.name}</option>)
                                            }
                                        </select>
                                    </td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पिन कोड</h4><input class="rounded py-2 mt-1 px-2" id="ap_pin_code" type="number"  placeholder={this.state.applicant.ap_pin_code} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आधार क्रमांक</h4><input class="rounded py-2 mt-1 px-2" id="ap_adhar" type="number"  placeholder={this.state.applicant.ap_adhar} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का प्रकार</h4>
                                        <select style={{width:"16vw"}} class="rounded py-2 mt-1 pl-2 pr-5" name="complaint-type" id="complaint_type">
                                            <option value="1">{this.state.applicant.complaint_type}</option>
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
                                            <option value="1">{this.state.applicant.sub_complaint_type}</option>
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
        updateAccountDetails = (account_id) => {
            let id = idFetcher(); 
            const accountArry = this.state.accounts.filter(account => account.acc_id == account_id);
            const account = accountArry[0];
            let complaint_id_acc = id,
                acc_id_acc = account.acc_id,
                acc_number_acc = document.getElementById("acc_number").value?document.getElementById("acc_number").value : account.acc_number,
                bank_name_acc = document.getElementById("acc_bank_name").value?document.getElementById("acc_bank_name").value : account.bank_name,
                state_acc = document.getElementById("acc_state").value?document.getElementById("acc_state").value : account.state,
                branch_name_acc = document.getElementById("acc_branch_name").value?document.getElementById("acc_branch_name").value : account.branch_name,
                mail_date_acc = document.getElementById("acc_mail_date").value?document.getElementById("acc_mail_date").value : account.mail_date,
                mail_received_acc = document.getElementById("acc_mail_recieved").value?document.getElementById("acc_mail_recieved").value : account.mail_received,
                freeze_amount_acc = document.getElementById("acc_freeze_amount").value?document.getElementById("acc_freeze_amount").value : account.freeze_amount,
                kyc_name_acc = document.getElementById("acc_kyc_name").value?document.getElementById("acc_kyc_name").value : account.kyc_name,
                address_acc = document.getElementById("acc_address").value?document.getElementById("acc_address").value : account.address,
                city_acc = document.getElementById("acc_city").value?document.getElementById("acc_city").value : account.city,
                state_twice_acc = document.getElementById("acc_state_twice").value?document.getElementById("acc_state_twice").value : account.state_twice,
                altername_number_acc = document.getElementById("acc_alternate_number").value?document.getElementById("acc_alternate_number").value : account.alternate_number,
                profit_acc_acc = document.getElementById("acc_profit_acc").value?document.getElementById("acc_profit_acc").value : account.profit_acc,
                internet_banking_acc = document.getElementById("acc_internet_banking").value?document.getElementById("acc_internet_banking").value : account.internet_banking,
                bank_manager_name_acc = document.getElementById("acc_bank_manager_name").value?document.getElementById("acc_bank_manager_name").value : account.bank_manager_name,
                bank_manager_number_acc = account.bank_manager_number,
                kyc_pdf_acc = account.kyc_pdf,
                bank_statement_file_acc = account.bank_statement_file,
                created_date_acc = account.created_date,
                last_updated_acc = Date().toLocaleString();
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
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1"><span style={{color:"red"}}>[{i+1}]</span> खाता नंबर</h4><input class="rounded py-2 mt-1 px-2" id="acc_number" type="number" placeholder={account.acc_number} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक का नाम</h4><input class="rounded py-2 mt-1 px-2" id="acc_bank_name" type="text" placeholder={account.bank_name} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">राज्य</h4><input class="rounded py-2 mt-1 px-2" id="acc_state" type="text" placeholder={account.state} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शाखा का नाम</h4><input class="rounded py-2 mt-1 px-2" id="acc_branch_name" type="text" placeholder={account.branch_name} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल भेजने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id="acc_mail_date" type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">ईमेल प्राप्त करने की तारीख</h4><input class="rounded py-2 mt-1 pl-2 pr-5" id="acc_mail_recieved" type="date" /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">फ्रीज राशि</h4><input class="rounded py-2 mt-1 px-2" id="acc_freeze_amount" type="number" placeholder={account.freeze_amount} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">KYC में नाम</h4><input class="rounded py-2 mt-1 px-2" id="acc_kyc_name" type="text" placeholder={account.kyc_name} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पता</h4><input class="rounded py-2 mt-1 px-2" id="acc_address" type="text" placeholder={account.address} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शहर</h4><input class="rounded py-2 mt-1 px-2" id="acc_city" type="text" placeholder={account.city} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">द्वितीय राज्य</h4><input class="rounded py-2 mt-1 px-2" id="acc_state_twice" type="text" placeholder={account.state_twice} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">वैकल्पिक फोन नंबर</h4><input class="rounded py-2 mt-1 px-2" id="acc_alternate_number" type="number" placeholder={account.alternate_number} /></td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">लाभ खाता</h4><input class="rounded py-2 mt-1 px-2" id="acc_profit_acc" type="text" placeholder={account.profit_acc} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">इंटरनेट बैंकिंग</h4><input class="rounded py-2 mt-1 px-2" id="acc_internet_banking" type="text" placeholder={account.internet_banking} /></td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">बैंक मैनेजर का नाम</h4><input class="rounded py-2 mt-1 px-2" id="acc_bank_manager_name" type="text" placeholder={account.bank_manager_name} /></td>
                                    <td><button class="ui button update-button mt-2 py-3 px-5" onClick={() => this.updateAccountDetails(account.acc_id)}>Update</button></td>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                         <a style={{color:"#fff"},infoButtonStyle} class="info-button ui right floated small btn btn-primary button ml-2" href={"more-info-bank.php?acc_id=" + account.acc_id + "&com_id=" + idFetcher()}>More Info</a> 
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