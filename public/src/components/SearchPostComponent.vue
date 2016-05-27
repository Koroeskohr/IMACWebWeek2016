<template>
  <div class="search-post" @click="hideAddForm" v-link="'/post/' + post.id">
    <div class="title_post">
      <h3 class="titre">{{ post.titre }}</h3>
    </div>
    <div class="text">
      {{ post.texte | truncate 100 }}
    </div>
  </div>
</template>



<script>

  export default {
    name: "SearchPostComponent",
    props: {
      post: Object
    },
    methods: {
      hideAddForm: function() {
        this.$dispatch('searchToggle')
      }
    }
  }


</script>