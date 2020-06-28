<script type="text/babel">  
  class Card extends React.Component {
        render() {
            const cardButtonStyle ={
                backgroundColor: "#004ba8",
                border: "2px solid #004ba8",
            };
            return ( 
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{this.props.title}</h5>
                                <span class="card-text">{this.props.content}</span>
                                <p class="card-text">{this.props.contentSec}</p>
                                <a href="#" style={cardButtonStyle} class="btn btn-primary">Read More</a>
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
                    <Card title="Last record added at" content={"Date : " + this.state.contentOne[0]} contentSec={"Time : " + this.state.contentOne[1]} />
                    <Card title="Total number of complaints" content={"Total : " + this.state.contentTwo + " Complaints"} contentSec="-"/>
                    <Card title="Lorem ipsum amet consectetur." content={"lorem : " + this.state.contentTwo + " ipsum"} contentSec="amet consectetur"/>
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
            };
          return (
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th style={themeColor}>Complaint ID</th>
                        <th style={themeColor}>Complaint No.</th>
                        <th style={themeColor}>Complaint Date</th>
                        <th style={themeColor}>Applicant Name</th>
                        <th style={themeColor}>Applicant Age</th>
                        <th style={themeColor}>Applicant Phone</th>
                        <th style={themeColor}>Applicant Address</th>
                        <th style={themeColor}>View More</th>
                    </tr>
                </thead>
                <tbody>
                    {this.state.complaints.slice(-10).map((complaint) => (    
                            <tr>
                              <td>{complaint.complaint_id}</td>
                              <td>{complaint.complaint_no}</td>
                              <td>{complaint.complaint_date}</td>
                              <td>{complaint.app_name}</td>
                              <td>{complaint.ap_age}</td>
                              <td>{complaint.ap_mob}</td>
                              <td>{complaint.ap_address}</td>
                              <td><a href="#">View More <i class="fa fa-share fa-fw" aria-hidden="true"></i></a></td>
                            </tr>
                        ))}
                </tbody>
            </table>
              
              );
        }
  }
  ReactDOM.render(<ComplaintsTable />, document.getElementById('dashboard-complaints'))

</script>