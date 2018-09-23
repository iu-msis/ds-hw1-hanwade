var riderProfileApp = new Vue({
  el: '#riderProfileVue',
  data: {
    "name" : "Frederick Ruiz",
    "country" : "Spain",
    "birthdate" : "1977-08-07",
    "email" : "Frederick.Ruiz@example.com"
  },
  computed: {
    current_age: function() {
      return moment().diff(this.birthdate, 'years');
    },
    pretty_birthdate: function() {
      return this.pretty_date(this.birthdate);
    }
  },
  methods: {
    pretty_date: function (d) {
      return moment(d).format('l');
    }
  }
});
