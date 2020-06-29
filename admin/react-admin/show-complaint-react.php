<script type="text/babel">
  class Applicant extends React.Component {
    state = {
          applicant: {},
        }
        
        
        componentDidMount(){
            this.fetchApplicantData();
        }
        fetchApplicantData(){
            const location = window.location.href,
            locationAndId = location.split("="),
            id = locationAndId[1];
                fetch('../api/data/read_all_complainee.php')
                .then(res => res.json())
                .then((data) => {
                const applicant = data.complainee.filter(complaint => complaint.complaint_id == id)
                this.setState({ applicant: applicant[0] })
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
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का नाम</h5>श्याम लाल</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक की उम्र</h5>40 साल</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का मोबाइल नंबर</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का पता</h5>गढ़ा</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का देश</h5>भारत</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का राज्य</h5>मध्य प्रदेश</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक का शहर</h5>मध्य प्रदेश</td>
                                    <td><h5 class="ui header mb-1 mt-1">पिन कोड</h5>482001</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">आधार क्रमांक</h5>11100025648</td>
                                    <td><h5 class="ui header mb-1 mt-1">अपराध का प्रकार</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">आई टी ऐक्ट धारा</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">भा द वि धारा</h5>777286377</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">घटना का दिनांक</h5>11100025648</td>
                                    <td><h5 class="ui header mb-1 mt-1">घटना का समय</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक की राशि</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">जांचकर्ता का नाम</h5>777286377</td>
                                </tr>
                                <tr>
                                    <td><h5 class="ui header mb-1 mt-1">शिकायत की दिनांक</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">आवेदक की राशि</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">जांचकर्ता का नाम</h5>777286377</td>
                                    <td><h5 class="ui header mb-1 mt-1">जांचकर्ता का नाम</h5>777286377</td>
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