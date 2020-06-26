<script type="text/babel">
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
                                <a href="#" style={cardButtonStyle} class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>          
                );
        }
    }
    class CardsRow extends Card {
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
                </div>
            );
        }
    }
  ReactDOM.render(<CardsRow />, document.getElementById('admin-cards'))

</script>