<template>

<div class="modal-bg" @click.self='searchToggled'>
  <div class="search">
    <div class="header_rubrique">
      <h1>Recherche</h1>
      <h3 class="title_rubrique">{{ posts.length }} post{{ posts.length >= 2 ? 's' : '' }}</h3>
      <input type="text" v-model="query" debounce="200" placeholder="Recherche..."></input>
    </div>
    <div class="results row">
      <div class="col-sm-10 col-sm-offset-1">
        <search-post-component
          v-for='post in posts'
          :post='post'>
        </search-post-component>
      </div>
    </div>
  </div>
</div>
</template>

<script>
  import SearchPostComponent from '../components/SearchPostComponent.vue'

  export default {
    name: "SearchComponent",
    components: { SearchPostComponent },
    data () {
      return {
        posts: [],
        query: ''
      }
    },
    methods: {
      searchToggled: function() {
        this.$dispatch('searchToggled')
      }
    },
    watch: {
      'query': function(val, oldVal){
        if (val.length == 0){
          this.posts = []
          return
        }
        this.$http.get('post/search?id=' + val).then(
          (response) => {
            this.posts = response.data
          },
          (response) => {
            this.posts = []
            console.log("no results")
          }
        )
      }
    }
  }
</script>