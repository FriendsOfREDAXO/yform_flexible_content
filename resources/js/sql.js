window.flexibleSQL = () => {
  return {
    choices: [],
    init() {
      const query = new URLSearchParams({
        'rex-api-call': 'fc_sql',
        'query': this.field.query,
      }).toString();

      fetch('/redaxo/index.php?' + query)
        .then((response) => response.json())
        .then((json) => this.choices = json);
    },
  };
};