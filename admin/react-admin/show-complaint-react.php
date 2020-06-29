<script type="text/babel">
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
                var splitString = str.split("-"); 
                var reverseArray = splitString.reverse(); 
                var realDate = reverseArray.join("-"); 
                return realDate;
            }
        fetchApplicantData(){
            const location = window.location.href,
            locationAndId = location.split("="),
            id = locationAndId[1];
                fetch('../api/data/read_all_complainee.php')
                .then(res => res.json())
                .then((data) => {
                const applicant = data.complainee.filter(complaint => complaint.complaint_id == id);
                this.setState({ applicant: applicant[0] });
                let timeDateUpdate = applicant[0].last_updated,
                    con = timeDateUpdate.split(" "),
                    date = con[0],
                    updatedDate = this.dateFormatter(date);
                this.setState({ updatedDate: updatedDate})
                let timeDateCreate = applicant[0].created_date,
                    conSec = timeDateCreate.split(" "),
                    dateSec = conSec[0],
                    createdDate = this.dateFormatter(dateSec);
                this.setState({ createdDate: createdDate});
                let crimeDateRev = applicant[0].crime_date,
                    crimeDate = this.dateFormatter(crimeDateRev);
                this.setState({ crimeDate: crimeDate});
                let complaintDateRev = applicant[0].complaint_date,
                    complaintDate = this.dateFormatter(complaintDateRev);
                this.setState({ complaintDate: complaintDate});

                console.log(applicant[0])
                })
                .catch(console.log)
        }
        render() {    
            return ( 
                <div>
                <center>
                <div class="ui segment blue mt-4">
                <h1 class=" h1 h1-complaint">शिकायत व आवेदक की जानकारी</h1>
                            <table class="ui celled table">
                            <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}} class="table-data"><h4 style={{color:"red"}} class="ui header mb-1 mt-1">शिकायत क्रमांक</h4>{this.state.applicant.complaint_no}</td>
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
  ReactDOM.render(<Applicant />, document.getElementById('show-complaint'))

</script>