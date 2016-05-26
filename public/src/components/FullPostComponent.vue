<template>
  <div class="header_rubrique">
    <h1>{{ post.titre }}</h1>
    <h3 class="title_rubrique">Proposé par {{post.auteur}} le {{ post.date }}</h3>
  </div>
  <div class="row">
  <article class="post col-sm-10 col-sm-offset-1">
    <div class="row">
      <div class="col-sm-6 img">
        <img :src="post.image">
        <span v-for="tag in tags">#{{ tag.nom }}</span>
      </div>
      <div class="col-sm-6 info">
        <div class="text">
          {{ post.texte }}
        </div>
        <div class="nb_likes">
          <span class="likes">
            {{ post.likes }} likes
          </span>
        </div>
      </div>
    </div>

    <comment-component v-for="comment in comments" :comment="comment"></comment-component>
  </article>
</div>
</template>

<script>
  import CommentComponent from './CommentComponent.vue'
  export default {
    name: "FullPostComponent",
    components: { CommentComponent },
    props: {
      post: {
        type: Object,
        required: true,
      },
      comments: Array,
      tags: Array
    },
    ready () {
      // this.$http.get('post/' + this.post.id + "/comments").then(
      //   (response) => {
      //     this.comments = response.data
      //   },
      //   (response) => {
      //     console.log("comment " + this.post.id + " fail " + response);
      //   }
      // )
    }
  }
</script>