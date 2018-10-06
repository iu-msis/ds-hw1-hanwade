var riderProfileApp = new Vue({
  el: '#riderProfileVue',
  data: {
    "results":[
        {
          "gender":"",
          "name":
            {
              "title":"",
              "first":"",
              "last":""
            },
          "location":
            {
              "street":"",
              "city":"",
              "state":"",
              "postcode":null
              },
          "email":"",
          "dob":
            {
              "date":"",
              "age": null
            },
          "phone":"",
          "cell":"",
          "picture":
            {
              "large":"",
              "medium":"",
              "thumbnail":""
            }
        }
      ],
      },
  computed: {
    current_age: function() {
      return moment().diff(this.results.results[0].dob.date, 'years');
    },
    pretty_birthdate: function() {
      return this.pretty_date(this.results.results[0].dob.date);
    }
  },
  methods: {
    pretty_date: function (d) {
      return moment(d).format('l');
    },
    fetchRider() {
      fetch( 'https://randomuser.me/api' )
      .then( (response) => response.json() )
      .then( (json) => {riderProfileApp.results = json})
      .catch( function(err) {
        console.log('RIDER FETCH ERROR:')
        console.log(err)
      })
    },
  },
  created() {
    this.fetchRider()
  }

});
