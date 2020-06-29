<script type="text/babel">
  class Applicant extends React.Component {
    state = {
          applicant: {},
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
                this.setState({ createdDate: createdDate})
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
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का नाम</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक की उम्र</h5>{this.state.applicant.app_name} साल</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का मोबाइल नंबर</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का पता</h5>{this.state.applicant.app_name}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का देश</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का राज्य</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का शहर</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">पिन कोड</h5>{this.state.applicant.app_name}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">आधार क्रमांक</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">अपराध का प्रकार</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">आई टी ऐक्ट धारा</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">भा द वि धारा</h5>{this.state.applicant.app_name}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">घटना की दिनांक</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">घटना का समय</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक की राशि</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">जांचकर्ता का नाम</h5>{this.state.applicant.app_name}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">शिकायत की दिनांक</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक की राशि</h5>{this.state.applicant.app_name}</td>
                                    <td><h5 class="ui header mb-1 mt-1">शिकायत की दिनांक</h5>{this.state.createdDate}</td>
                                    <td><h5 class="ui header mb-1 mt-1">अपडेट  की दिनांक</h5>{this.state.updatedDate}</td>
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