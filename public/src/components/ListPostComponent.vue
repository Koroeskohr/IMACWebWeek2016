<template>
  <post-component :post="post">
  </post-component>
</template>



<script>
  import PostComponent from './PostComponent.vue'

  export default {
    name: "ListPostComponent",
    components: {
      PostComponent
    },
    props: {
      post: Object
    },
    data () {
      return {
        comments: []
      }
    },
    created () {
      this.$http.get('post/' + this.post.id + "/comments").then(
          (response) => {
            this.comments = response.data
          },
          (response) => {
            console.log("comment " + this.post.id + " fail " + response);
          }
        )
    }
  }


</script>