var commentApp = new Vue({
  el: '#commentVue',
  data: {
    comment: [ ],
    commentForm: { }
  },
  methods: {
    handleCommentForm(e) {

      const s = JSON.stringify(this.commentForm);

      console.log(s);

      //POST to remote DB_SERVER
      fetch('api/comment.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=utf-8",
        },
        body: s //body data type must match 'content-type' header
      })
      .then( response => response.json() )
      .then( json => {this.comment.push(json)} ) //append results to table
      .catch( err => {
        console.log('COMMENT POST ERROR:');
        console.log(err);
      })

      // reset commentForm
      this.commentForm = this.getEmptyCommentForm();
    },
    getEmptyCommentForm() {
      return {
        //id: this.comment.id,
        comment: null
      }
    },
  },
  created () {
    //do data fetchAll
    const url = new URL(window.location.href);
    const id = url.searchParams.get('id');
    console.log('Comment: ' + id);
    this.comment.id = id;

    //populate commmentForm with default values
    this.commentForm = this.getEmptyCommentForm();

    fetch('api/comment.php?id='+id)
    .then( response => response.json() )
    .then( json => {commentApp.work = json} )
    .catch( err => {
      console.log('COMMENT FETCH ERROR:');
      console.log(err);
    })
  }
})
