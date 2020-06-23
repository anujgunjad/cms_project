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
          return (
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Complaint No.</th>
                        <th>Complaint Date</th>
                        <th>Applicant Name</th>
                        <th>Applicant Age</th>
                        <th>Applicant Phone</th>
                        <th>Applicant Address</th>
                        <th>View</th>
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
                              <td><button class="ui button mini teal">View More</button></td>
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