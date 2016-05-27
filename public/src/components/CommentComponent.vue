<template>
  <div class="comment">
    <div class="info">
      <span class="date">{{ comment.date }}</span>
      <span class="author">{{ comment.auteur }}</span>
    </div>
    <div class="text">
      {{ comment.texte }}
    </div>
    <button class="answer" v-show="!answerVisible" @click="toggleAnswer">Répondre</button>
    <input class="comment-answer" placeholder="Commenter..." type="text" v-show="answerVisible" v-model="response" @keyup.enter="sendComment" @keyup.esc="hideAnswer"></input>
    <div class="sub-comments">
      <comment-component v-for='childComment in childComments' :comment='childComment' v-show="childComments != []">
    </div>

  </div>
</template>

<script>
  export default {
    name: "CommentComponent",
    props: {
      comment: Object,
      post: Object
    },
    methods: {

    },
    data () {
      return {
        childComments: [],
        response: '',
        answerVisible: false
      }
    },
    methods: {
      sendComment: function() {
        this.$http.post('post/'+ this.post.id + '/comment/' + this.comment.id, 
          {
            texte: this.response
          }
        ).then(
          (response) => {
            console.log('success sent comment')
          },
          (response) => {
            console.log('failed sent comment')
          }
        ).finally(
          () => {
            location.reload()
          }
        )
      },
      toggleAnswer: function() {
        this.answerVisible = !this.answerVisible
      },
      hideAnswer: function() {
        this.answerVisible = false
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