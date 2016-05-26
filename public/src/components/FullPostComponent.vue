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
  </article>
</div>
</template>

<script>

  export default {
    name: "FullPostComponent",
    props: {
      post: Object
    },
    data () {
      return {
        comments: []
      }
    },
    created () {
    }
  }
</script>