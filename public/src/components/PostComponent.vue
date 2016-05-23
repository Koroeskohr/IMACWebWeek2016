<template>
  <article class="post">
    <div class="info">
      <span class="date">{{ post.date }}</span>
    </div>
    <img src="{{ post.image }}" alt="">
    <h1 class="titre">{{ post.titre }}</h1>
    <div class="text">
      {{ post.texte }}
    </div>
    <span class="likes">
      {{ post.likes }}
    </span>
  </article>
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
    }
  }


</script>