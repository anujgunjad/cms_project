<script type="text/babel">
      class Hello extends React.Component {
        render() {
          return (
              <h1>Component</h1>
              );
        }
      }

const renderComponent = () => {
    ReactDOM.render(<Hello />, document.getElementById('render-container'))
}

</script>