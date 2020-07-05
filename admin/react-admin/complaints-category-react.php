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
          maxAmount:"",
        }
        componentDidMount(){
           this.allComplainee();
            // this.valueChange();
        }
        allComplainee = () => {
          fetch('../api/data/read_all_complainee.php')
                  .then(res => res.json())
                  .then((data) => {
                    this.setState({ complaints: data.complainee})
                    this.setState({ maxAmount: data.more_data[0].max_amount })
                    console.log(this.state.maxAmount)
                  })
                  .catch(console.log)
          }
        filterComplaints = (minAmount,maxAmount,complaintType,subComplaintType,gender,age) => {
             let maxNewAmount = maxAmount == 0 ?this.state.maxAmount:maxAmount;
             console.log(maxNewAmount);
          fetch(`../api/data/filter.php?min_amount=${minAmount}&max_amount=${maxNewAmount}&complaint_type=${complaintType}&sub_complaint_type=${subComplaintType}&applicant_gender=${gender}&applicant_age=${age}`)
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
                      this.state.complaints ? this.state.complaints.slice(-10).map((complaint) => (    
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

      const complaintsTable =  ReactDOM.render(<Complaints />, document.getElementById('render-container'));
      const valueChange = () => {
      let selectedMinAmt = document.getElementById("min-amount").value?document.getElementById("min-amount").value:0,
       selectedMaxAmt = document.getElementById("max-amount").value?document.getElementById("max-amount").value:0;
       var complaintTypeArray = [];
       $.each($("input[name='complaint-type']:checked"), function(){
         complaintTypeArray.push($(this).val());
            });
            var argComplaintType = complaintTypeArray.join();
            var subComplaintTypeArray = [];
            $.each($("input[name='sub-complaint-type']:checked"), function(){
                subComplaintTypeArray.push($(this).val());
              });
    var argSubComplaintType = subComplaintTypeArray.join();
    var genderArray = [];
            $.each($("input[name='gender']:checked"), function(){
                genderArray.push($(this).val());
              });
              var argGender = genderArray.join();
    var ageArray = [];
            $.each($("input[name='age']:checked"), function(){
              ageArray.push($(this).val());
            });
            var argAge = ageArray.join();
    console.log(` ==============START===========`);
    console.log(` Min-Amount : ${selectedMinAmt}`);
    console.log(` Max-amount : ${selectedMaxAmt}`);
    console.log(` Complaint-type : ${argComplaintType}`);
    console.log(` Sub-complaint-type : ${argSubComplaintType}`);
    console.log(` Gender : ${argGender}`);
    console.log(` Age : ${argAge}`);
    console.log(` ==============END===========`);
    complaintsTable.filterComplaints(selectedMinAmt, selectedMaxAmt,argComplaintType,argSubComplaintType,argGender,argAge);
  }
</script>