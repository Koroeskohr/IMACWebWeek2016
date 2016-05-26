<template>
  <div class="comment">
    <div class="info">
      <span class="date">{{ comment.date }}</span>
      <span class="author">{{ comment.auteur }}</span>
    </div>
    <div class="text">
      {{ comment.texte }}
    </div>

    <div class="sub-comments">
      <comment-component v-for='childComment in childComments' :comment='childComment' v-show="childComments != []">
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
    ready () {
      console.log(this.comment)
      //let ids = _.map(this.comment.childComments, _.property('id'))
      this.$http.get('comment/' + this.comment.id).then(
        (response) => {
          this.childComments = response.data
        },
        (response) => {
          console.log("fetching subcomments failed")
        }
      )
    }
  }
</script>