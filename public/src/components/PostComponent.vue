<template>
  <article class="post">
    <img src="" alt="">
    <h1 class="titre"></h1>
    <div class="text">
      
    </div>
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