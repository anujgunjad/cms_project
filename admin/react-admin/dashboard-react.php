<script type="text/babel">
  class Card extends React.Component {
        render() {
            const cardStyle ={
            };
            return ( 
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{this.props.title}</h5>
                                <p class="card-text">{this.props.content}</p>
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>          
                );
        }
    }
    class CardsRow extends Card {
        state = {
            cardData: [],
            contentOne: "",
            contentTwo: "",
        }
        componentDidMount(){
            fetch('../api/data/read_all_complainee.php')
            .then(res => res.json())
            .then((data) => {
                this.setState({ cardData: data.complainee})
                this.setState({ contentTwo: this.state.cardData.length})
                console.log(this.state.cardData)
                const titleOne = this.state.cardData.length;
                console.log(titleOne);
            })
            .catch(console.log)
        }
        render() {
            return(
                <div id="cards-row" class="row">
                    <Card title={this.state.contentTwo} />
                    <Card title="Total Number of complaints" content="Total : " />
                </div>

            );
        }
    }
  ReactDOM.render(<CardsRow />, document.getElementById('admin-cards'))

</script>