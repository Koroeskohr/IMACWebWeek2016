<template>
  <div class="post-list">
    <div class="header_rubrique">
      <h3 class="title_rubrique">Liste des posts</h3>
    </div>
    <post-component
      v-for='post in posts'
      :post='post'>
    </post-component>
  </div>
</template>

<script>
  import PostComponent from '../components/PostComponent.vue'
  import CommentComponent from '../components/CommentComponent.vue'

  export default {
    name: "ListView",
    components: { PostComponent, CommentComponent },
    data () {
      return {
        topic: {},
        posts: []
      }
    },
    route: {
      data ({ to }) {
        //to.params.id = topic_id
        this.$http.get('topic/'+ to.params.id +'/posts').then( 
          (response) => {
            this.posts = response.data
          }, (response) => {
            console.log("post all fail " + response)
          }
        )

        this.$http.get('topic/'+ to.params.id).then( 
          (response) => {
            this.topic = response.data
          }, (response) => {
            console.log("post all fail " + response)
          }
        )
      }
    }
  }
</script>