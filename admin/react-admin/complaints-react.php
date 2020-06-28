<script type="text/babel">
     class Complaints extends React.Component {
        state = {
          complaints: [],
          message:"",
        }
        componentDidMount(){
          // this.allComplainee();
          // this.filterComplaints();
        }
        allComplainee = () => {
          fetch('../api/data/read_all_complainee.php')
                  .then(res => res.json())
                  .then((data) => {
                    this.setState({ complaints: data.complainee })
                    console.log(this.state.complaints)
                  })
                  .catch(console.log)
          }
        filterComplaints = (categoryId, keyWord) => {
           let category_id = categoryId,
               keyword = keyWord;
          fetch(`../api/data/search.php?category_id=${category_id}&keyword=${keyword}`)
                  .then(res => res.json())
                  .then((data) => {
                    this.setState({ complaints:data.applicant})
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
                    {
                      this.state.complaints ? this.state.complaints.slice(-10).map((complaint) => (    
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
                        ))
                        : <tr>
                             <td class="error center aligned" colspan="8"></td>
                          </tr>
                        
                      }
                </tbody>
            </table>
              );
        }
      }

const complaintsTable =  ReactDOM.render(<Complaints />, document.getElementById('render-container'));
const filterTwo = () => {
  var keyWord = document.getElementById("search-keyword").value;
  var e = document.getElementById("search-category");
  var categoryId = e.options[e.selectedIndex].value;
   complaintsTable.filterComplaints(categoryId, keyWord);
}
</script>