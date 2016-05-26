<template>
  <div class="post-view">
    <full-post-component :post='post' :comments="comments" :tags="tags"></full-post-component>
  </div>


</template>

<script>
  import FullPostComponent from '../components/FullPostComponent.vue'
  export default {
    data () {
      return {
        post: {},
        tags: [],
        comments: []
      }
    },
    components: { FullPostComponent },
    route: {
      data ({to}) {
        this.$http.get('post/' + to.params.id).then(
          (response) => {
            this.post = response.data[0]
          },
          (response) => {
            console.log("post " + to.params.id + " fail " + response);
          }
        )

        this.$http.get('post/' + to.params.id + '/tags').then(
          (response) => {
            this.tags = response.data
          },
          (response) => {
            console.log("tags " + to.params.id + " fail " + response);
          }
        )

        this.$http.get('post/' + to.params.id + "/comments").then(
          (response) => {
            this.comments = response.data
          },
          (response) => {
            console.log("comment " + this.post.id + " fail " + response);
          }
        )
      }
    }
  }
</script>