<template>
  <div class="post-view">
    <post-component :post='post'></post-component>
  </div>


</template>

<script>
  import PostComponent from '../components/PostComponent.vue'
  export default {
    data () {
      return {
        post: {},
        comments: {}
      }
    },
    components: { PostComponent },
    route: {
      data ({to}) {
        this.$http.get('post/' + to.params.id).then(
          (response) => {
            this.post = response.data
          },
          (response) => {
            console.log("post " + to.params.id + " fail " + response);
          }
        )
      }
    }
  }
</script>