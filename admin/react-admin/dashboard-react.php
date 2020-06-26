<script type="text/babel">
      class Card extends React.Component {
        state = {
          cardData: []
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
            const cardStyle ={
            };
          return ( 
                            
              );
        }
      }

const renderComponent = () => {
    ReactDOM.render(<Card />, document.getElementById('render-container'))
}
</script>