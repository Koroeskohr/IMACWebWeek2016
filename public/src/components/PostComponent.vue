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
          {{ post.texte }}
        </div>
        <div class="nb_likes">
          <span class="likes">
            {{ post.likes }} likes
          </span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 button_post">
        <a v-link="'/post/' + post.id">
          <button>
              <span>Voir le post</span>
          </button>
        </a>
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