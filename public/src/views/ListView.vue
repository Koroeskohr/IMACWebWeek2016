<template>
  <div class="home">
    ListView
    
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
        topic_id: 0,
        posts: []
      }
    },
    route: {
      data ({ to }) {
        //to.params.id = topic_id
        this.$http.get('topic/'+ to.params.id +'/posts').then( 
          (response) => {
            this.topic_id = to.params.id
            console.log(response)
          }, (response) => {
            console.log("post all fail " + response)
          }
        )
      }
    }
  }
</script>