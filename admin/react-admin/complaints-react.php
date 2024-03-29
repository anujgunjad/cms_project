<script type="text/babel">
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
          //  let category_id = categoryId,
          //      keyword = keyWord;
          fetch(`../api/data/search.php?category_id=${categoryId}&keyword=${keyWord}`)
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
            const textStyle = {
                fontSize:"1.1rem",
            };
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
                    {
                      this.state.complaints ? this.state.complaints.map((complaint) => (    
                            <tr>
                            <td style={textStyle}>{complaint.complaint_no}</td>
                              <td style={textStyle}>{complaint.ap_name}</td>
                              <td style={textStyle}>{complaint.ap_mob}</td>
                              <td style={textStyle}>{timeDateFormatter(complaint.created_date)}</td>
                              <td><a href={"show-complaint.php?id=" + complaint.complaint_id}>View More <i class="fa fa-share fa-fw" aria-hidden="true"></i></a></td>
                            </tr>
                        ))
                        : <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-danger not-found-alert" role="alert">No records found  <i class="fa fa-exclamation-circle fa-fw" /></div>
                             </td>
                          </tr>
                        
                      }
                </tbody>
            </table>
              );
        }
      }
let keywordInput = document.getElementById("search-keyword");
keywordInput.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
        filterTwo();
    }
});
const filterTwo = () => {
  const complaintsTable =  ReactDOM.render(<Complaints />, document.getElementById('render-container'));
  let keyWord = document.getElementById("search-keyword").value,
      e = document.getElementById("search-category"),
      categoryId = e.options[e.selectedIndex].value;
   complaintsTable.filterComplaints(categoryId, keyWord);
}
</script>