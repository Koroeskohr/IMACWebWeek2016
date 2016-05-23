<template>
  <div class="comment">
    <div class="info">
      <span class="date"></span>
      <span class="author"></span>
    </div>
    <div class="text">
      
    </div>

    <div class="sub-comments">
      
    </div>

  </div>
</template>

<script>
  export default {
    name: "CommentComponent",
    props: {
      comment: Object
    },
    data () {
      return {
        childComments: []
      }
    },
    created () {
      if (this.comment.childComments) {
        let ids = _.map(this.comment.childComments, _.property('id'))

      }
    }
  }
</script>