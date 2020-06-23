<script type="text/babel">
      class Hello extends React.Component {
        state = {
          complaints: []
        }
        componentDidMount(){
          fetch('../api/data/read_all_complainee.php')
            .then(res => res.json())
            .then((data) => {
              this.setState({ complaints: data.records })
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
                    {this.state.complaints.map((complaint) => (    
                            <tr>
                              <td>{complaint.complaint_id}</td>
                              <td>{complaint.complaint_no}</td>
                              <td>{complaint.complaint_date}</td>
                              <td>{complaint.app_name}</td>
                              <td>{complaint.ap_age}</td>
                              <td>{complaint.ap_mob}</td>
                              <td>{complaint.ap_address}</td>
                              <td><button style={{color:"#fff"}} class="ui button mini navbar-admin-blue">View More</button></td>
                            </tr>
                        ))}
                </tbody>
            </table>
              
              );
        }
      }

const renderComponent = () => {
    ReactDOM.render(<Hello />, document.getElementById('render-container'))
}
</script>