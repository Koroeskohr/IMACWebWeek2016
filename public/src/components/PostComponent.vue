<template>
<div class="row">
  <article class="post col-sm-10 col-sm-offset-1">
    <div class="row">
      <div class="col-sm-6 img">
        <img :src="post.image">
      </div>
      <div class="col-sm-6 info">
        <div class="title_post"><h1 class="titre">{{ post.titre }}</h1></div>
        <div class="date"><span>Proposé par {{ post.auteur }} il y a {{ post.date | fromNow }}</span><br></div>
        <div class="text">
          {{ post.texte | truncate 250 }}
        </div>
        <div class="nb_likes">
          <span class="likes">
            {{ post.likes }} likes
          </span>
        </div>

        <div class="tags">
          <span class="tag" v-for='tag in tags'>
            #{{tag.nom}}
          </span>
        </div>
      </div>
    </div>
  </article>
</div>
  
  
</template>

<script>
  export default {
    name: "PostComponent",
    props: {
      post: Object
    },
    data () {
      return {
        comments: [],
        tags: []
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

      this.$http.get('post/' + this.post.id + "/tags").then(
          (response) => {
            this.tags = response.data
          },
          (response) => {
            console.log("comment " + this.post.id + " fail " + response);
          }
        )
    }
  }


</script>