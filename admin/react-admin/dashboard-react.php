<script type="text/babel"> 
var ctx = document.getElementById("genderChart").getContext('2d');
 let genderData = [12, 19, 3];
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
var ctx = document.getElementById("complaintType").getContext('2d');
 let complaintTypeData = [10, 12, 6, 7];
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
            const cardButtonStyle ={
                backgroundColor: "#004ba8",
                border: "2px solid #004ba8",
            };
            return ( 
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{this.props.title}</h5>
                                <span class="card-text">{this.props.content}</span>
                                <p class="card-text">{this.props.contentSec}</p>
                                <a href={this.props.href} style={cardButtonStyle} class="btn btn-primary">Read More</a>
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
            hrefOne:"",
            hrefTwo:"complaints-category.php",
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
                console.log(data);
                this.setState({ cardData: data.complainee})
                this.setState({ contentTwo: this.state.cardData.length})
                this.setState({hrefOne:`show-complaint.php?id=${this.state.cardData[this.state.cardData.length - 1].complaint_id}`}) 
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
                    <Card href={this.state.hrefOne} title="Last record added at" content={"Date : " + this.state.contentOne[0]} contentSec={"Time : " + this.state.contentOne[1]} />
                    <Card href={this.state.hrefTwo} title="Total number of complaints" content={"Total : " + this.state.contentTwo + " Complaints"} contentSec="-"/>
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
              console.log(this.state.complaints)
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