<template>
  <div class="post-list">
    <div class="header_rubrique">
      <h1>{{ topic.titre }}</h1>
      <h3 class="title_rubrique">{{topic.countPost}} posts</h3>
    </div>
    <list-post-component
      v-for='post in posts'
      :post='post'>
    </list-post-component>
  </div>
</template>

<script>
  import ListPostComponent from '../components/ListPostComponent.vue'
  import CommentComponent from '../components/CommentComponent.vue'

  export default {
    name: "ListView",
    components: { ListPostComponent, CommentComponent },
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