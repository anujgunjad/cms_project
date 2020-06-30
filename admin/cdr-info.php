<?php include("header.php")?>
<link href="css/sidenav.css" rel="stylesheet" />
<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-admin-blue">
        <h1 class="nav-head mt-1 ml-5">Call detail record [CDR] </h1>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link admin-name" href="#">Welcome xyz<span class="sr-only">(current)</span></a>
            </li>
           
          </ul>
        </div>
             <a href="javascript:history.back()" class="btn my-2 my-sm-0 btn-theme-color px-4 mx-2" type="submit">Back</a>
             <button class="btn my-2 my-sm-0 btn-theme-color" type="submit">Log Out</button>
        </nav>

<div class="container-fluid">
  <div id="show-number-cdr-info">
    <!-- react-components -->
  </div>
</div> 
<script type="text/babel">
const idsFetcher = () => {
            const location = window.location.href,
            locationAndId = location.split("="),
            comId = locationAndId[2],
            extraAndId = locationAndId[1],
            numIdAry = extraAndId.split("&"),
            numId = numIdAry[0],
            numAndComId = [numId,comId];
            return numAndComId;
}
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

    
    class CallDetailRecords extends React.Component {
        state = {
           cdr:[],
           num: "",
        }
        componentDidMount(){
            this.fetchCdr();
        }
        fetchCdr(){
                let ids = idsFetcher(),
                    numId = ids[0],
                    comId = ids[1];          
                    console.log(ids[0],ids[1])    
                fetch(`../api/data/read_suspect_number_cdr.php?number_id=${numId}&complaint_id=${comId}`)
                .then(res => res.json())
                .then((data) => {
                    this.setState({cdr: data.cdr});
                    this.setState({num: data.cdr[0].cdr})
                    console.log(this.state.cdr);
                })
                .catch(console.log)
        }
        
        render(){
            return(
                <div>
                <center>
                <h1 class="mt-3 h1-complaint">इस नंबर <span style={{color:"red"}}>{ this.state.num}</span> की CDR जानकारी</h1>
                <div class="ui segment blue mt-4 mb-5">
                
                        {
                            this.state.cdr ? this.state.cdr.map((cdr) => (    
                            <table class="ui celled table">   
                                <tbody>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">फ़ोन नंबर</h4>{cdr.cdr}</td>
                                    <td class={dateFormatter(cdr.email_sent)!="00-00-000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={"ui header" + dateFormatter(cdr.email_sent)!="00-00-000"?"success-text":"danger-text" + "mb-1 mt-1"}>ईमेल भेजने की तारीख</h4>{dateFormatter(cdr.email_sent)!="00-00-000"?dateFormatter(cdr.email_sent):"मेल नहीं भेजा गया"}</td>
                                    <td class={dateFormatter(cdr.email_received)!="00-00-000"?"success-text":"danger-text"} style={{fontSize:"1.11rem"}}><h4 class={"ui header" + dateFormatter(cdr.email_received)!="00-00-000"?"success-text":"danger-text" + "mb-1 mt-1"}>ईमेल प्राप्त करने की तारीख</h4>{dateFormatter(cdr.email_received)!="00-00-000"?dateFormatter(cdr.email_received):"मेल अभी तक नहीं मिला "}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IMEI नंबर</h4>{cdr.imei}</td>
                                </tr>
                                <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">IMSI नंबर</h4>{cdr.imsi}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">स्थान (Location)</h4>{cdr.location}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">स्थान तारीख (Location Date)</h4>{cdr.location_date}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">रात्रि स्थान (Night Location)</h4>{cdr.night_loc}</td>
                                </tr>
                                    <tr>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">सर्विस का नाम</h4>{cdr.service_name}</td>
                                    <td style={{fontSize:"1.11rem"}}><h4 class="ui header theme-color mb-1 mt-1">संदिग्ध नंबर</h4>{cdr.suspect_number}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                                               
                           </tbody>
                        </table>
                        ))
                        : <table class="ui celled table">   
                            <tbody>
                             <tr>
                             <td class=" center aligned" colspan="8">
                                <div class="alert alert-warning not-found-alert" role="alert">No CDR info addded yet <i class="fa fa-exclamation-circle fa-fw" /></div>
                             </td>
                            </tr>
                          </tbody>
                        </table>
                        }
                           
                            </div>
                        </center>                    
                    </div>          
            )
        }
    }
  ReactDOM.render(<CallDetailRecords />, document.getElementById('show-number-cdr-info'))

</script>
 <?php include("footer.php")?>
   