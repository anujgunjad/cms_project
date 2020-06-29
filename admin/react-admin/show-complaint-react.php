<script type="text/babel">
const idFetcher = () => {
            const location = window.location.href,
            locationAndId = location.split("="),
            id = locationAndId[1];
            return id;
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
          complaintDate:"",
          createdDate: "",
          updatedDate: "",
        }
        componentDidMount(){
            this.fetchApplicantData();
        }
        
        dateFormatter(str){
                var revdate = str.split("-"),
                    reverseArray = revdate.reverse(),
                    realDate = reverseArray.join("-"); 
                return realDate;
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
                    crimeDate = this.dateFormatter(crimeDateRev);
                this.setState({ crimeDate: crimeDate});
                let complaintDateRev = applicant[0].complaint_date,
                    complaintDate = this.dateFormatter(complaintDateRev);
                this.setState({ complaintDate: complaintDate});
                // console.log(applicant[0])
                })
                .catch(console.log)
        }
        render() {    
            return ( 
                <div>
                <center>
                <div class="ui segment blue mt-4">
                <h1 class=" h1 h2-complaint">शिकायत व आवेदक की जानकारी</h1>
                            <table class="ui celled table">
                            <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem",color:"#fff"}} class="table-data"><h4 style={{color:"#fff"}} class="ui header mb-1 mt-1">शिकायत क्रमांक</h4>{this.state.applicant.complaint_no}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का नाम</h4>{this.state.applicant.app_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की उम्र</h4>{this.state.applicant.ap_age} साल</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का मोबाइल नंबर</h4>{this.state.applicant.ap_mob}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का पता</h4>{this.state.applicant.ap_address}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का देश</h4>{this.state.applicant.ap_country}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का राज्य</h4>{this.state.applicant.ap_state}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक का शहर</h4>{this.state.applicant.ap_city}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">पिन कोड</h4>{this.state.applicant.ap_pin_code}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आधार क्रमांक</h4>{this.state.applicant.ap_adhar}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का प्रकार</h4>{this.state.applicant.crime_type}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">अपराध का तरीका</h4>{this.state.applicant.way_of_crime}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आई टी ऐक्ट धारा</h4>{this.state.applicant.it_act}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">भा द वि धारा</h4>{this.state.applicant.bh_dv}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना की दिनांक</h4>{this.state.crimeDate}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">घटना का समय</h4>{this.state.applicant.crime_time}</td>
                                </tr>
                               <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">आवेदक की राशि</h4>{this.state.applicant.amount}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">जांचकर्ता का नाम</h4>{this.state.applicant.checker_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत की दिनांक</h4>{this.state.complaintDate}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">शिकायत दर्ज की दिनांक</h4>{this.state.createdDate}</td>
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

        }
        componentDidMount(){
        }
        fetchApplicantData(){
                let id = idFetcher();               
                fetch(`/api/data/read_suspects.php?complaint_id=${id}`)
                .then(res => res.json())
                .then((data) => {
                    console.log(data);
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
                                </tr>
                            </tbody>
                            </table>
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
                </center>
            )
        }
    }
  ReactDOM.render(<AllDetails />, document.getElementById('show-complaint'))

</script>