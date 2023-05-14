window.flexibleSQL = () => {
  return {
    choices: [],
    message: null,
    async init () {
      const query = new URLSearchParams({
        'rex-api-call': 'fc_sql',
        'query': this.field.query,
      }).toString();

      const response = await fetch('/redaxo/index.php?' + query);
      const data = await response.json();

      if (response.ok) {
        this.choices = data;
      } else {
        this.message = data.message;
      }
    },
  };
};