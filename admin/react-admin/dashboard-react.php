<script type="text/babel"> 
const jsonToArray = (object) =>{
    var result = [];
    for(var i in object)
     result.push(object [i]);
     return result;
}
// Chart data fecth
const fetchChartData = () => {
  let totalData =  fetch('../api/data/count.php')
                    .then(res => res.json())
                    .then((data) => {
                        let genderData = jsonToArray(data.gender[0]);
                        let complaintTypeData = jsonToArray(data.complaint_type[0]);
                        let subComplaintTypeData = jsonToArray(data.sub_complaint_type[0]);   
                        var totalData = [genderData,complaintTypeData,subComplaintTypeData];
                        return totalData;
                       
                    })
                    .catch(console.log)  
        return  totalData;
}
let totalData = fetchChartData();
totalData.then((data) => {
    let gender = data[0];
    // Gender graph
    var ctx = document.getElementById("genderChart").getContext('2d');
    let genderData = gender;
        var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Male", "Female", "Other"],
            datasets: [{
            backgroundColor: [
                "#FFCD56",
                "#FF6384",
                "#36A2EB",
            ],
            data: genderData
            }]
        }
    });
    let ct = data[1];
    // Complaint graph
    var ctx = document.getElementById("complaintType").getContext('2d');
    let complaintTypeData = ct;
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["सोशल मीडिया", "ऑनलाइन ठगी", "साइबर आतंकवाद","अन्य"],
        datasets: [{
        backgroundColor: [
            "#6DD3CE",
            "#FBF774",
            "#F7A278",
            "#A96DA3",
        ],
        data: complaintTypeData
        }]
    }
    });
    let sct = data[2];
    // Sub complaint Graph
    var ctx = document.getElementById("myChart");
    let subComplaintData = sct;
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Online Bank Fraud", "Job Fraud", "OLX Fraud", "KYC Fraud", "Link Fraud", "Screen Sharing App", "Fake Facebook", "Fake Instagram", "Facebook Hack", "Instagram Hack", "Gmail Hack", "Social Media Harassment","Whatsapp Harassment","Whatsapp Hack","Metrimonial Fraud","Custom Fraud","Other"],
        datasets: [{
        label: 'Total Sub Complaint',
        data: subComplaintData,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
        ],
        borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        scales: {
        xAxes: [{
            ticks: {
            maxRotation: 90,
            minRotation: 80
            }
        }],
        yAxes: [{
            ticks: {
            beginAtZero: true
            }
        }]
        }
    }
    });
});



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
  class Card extends React.Component {
        render() {
            return ( 
                    <div class="col-sm-6">
                        <div style={{border:"2px solid #004ba8"}} class="card">
                            <div class="card-body">
                                <h5 style={{color:"#004ba8",fontSize:"1.3rem"}} class="card-title">{this.props.title}</h5>
                                <span style={{fontWeight:"bold"}} class="card-text">{this.props.content}</span>
                            </div>
                        </div>
                    </div>          
                );
        }
    }

    class CardsRow extends Card{
        state = {
            cardData: [],
            contentOne: [],
            contentTwo: "",
        }
        componentDidMount(){
                const dateFormatter = (str) => {
                var splitString = str.split("-"); 
                var reverseArray = splitString.reverse(); 
                var realDate = reverseArray.join("-"); 
                return realDate;
            }
            fetch('../api/data/read_all_complainee.php')
            .then(res => res.json())
            .then((data) => {
                // console.log(data);
                this.setState({ cardData: data.complainee})
                this.setState({ contentTwo: this.state.cardData.length})
                let timeDate = this.state.cardData[this.state.cardData.length - 1].last_updated;
                let con = timeDate.split(" ");
                let date = con[0];
                let realDate = dateFormatter(date);
                let conOne = [realDate, con[1]];
                this.setState({ contentOne: conOne})
                const titleOne = this.state.cardData.length;
            })
            .catch(console.log)
           
        }
        render() {
            return(
                <div id="cards-row" class="row">
                    <Card title="Last record added at" content={"Date : " + this.state.contentOne[0]+ ", " + " Time : " + this.state.contentOne[1]} />
                    <Card title="Total number of complaints" content={"Total : " + this.state.contentTwo + " Complaints"} contentSec=""/>
                </div>
            );
        }
    }

  ReactDOM.render(<CardsRow />, document.getElementById('dashboard-cards'));

  class ComplaintsTable extends React.Component{
    state = {
          complaints: []
        }
        componentDidMount(){
          fetch('../api/data/read_all_complainee.php')
            .then(res => res.json())
            .then((data) => {
              this.setState({ complaints: data.complainee })
            //   console.log(this.state.complaints)
            })
            .catch(console.log)
        }
        render() {
            const themeColor ={
                color: "#fff",
                backgroundColor: "#004ba8",
                borderTop:"2px solid #004ba8",
                fontSize:"1.2rem",
            };
            const textStyle = {
                fontSize:"1.1rem",
                fontWeight:"bold",
            }
          return (
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th style={themeColor}>Complaint No.</th>
                        <th style={themeColor}>Applicant Name</th>
                        <th style={themeColor}>Applicant Phone Number</th>
                        <th style={themeColor}>Complaint Date</th>
                        <th style={themeColor}>View More</th>
                    </tr>
                </thead>
                <tbody>
                    {this.state.complaints.slice(-10).map((complaint) => (    
                            <tr>
                              <td style={textStyle}>{complaint.complaint_no}</td>
                              <td style={textStyle}>{complaint.ap_name}</td>
                              <td style={textStyle}>{complaint.ap_mob}</td>
                              <td style={textStyle}>{timeDateFormatter(complaint.created_date)}</td>
                              <td style={textStyle}><a href={"show-complaint.php?id=" + complaint.complaint_id}>View More <i class="fa fa-share fa-fw" aria-hidden="true"></i></a></td>
                            </tr>
                        ))}
                </tbody>
            </table>
              
              );
        }
  }
  ReactDOM.render(<ComplaintsTable />, document.getElementById('dashboard-complaints'))

</script>