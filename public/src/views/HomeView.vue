<template>
  <div class="home">
    HomePage
    <div class="brand">
      
    </div>
    <div class="topic-list col-sm-6" v-for="topic in topics">
      <span class="topic">
        {{ topic.titre }}
      </span>
    </div>
  </div>
</template>

<script>
  export default {
    name: "HomeView",
    data () {
      return {
        topics: []
      }
    },
    route: {
      data ({to}) {
        this.$http.get('topics').then(
          (response) => {
            this.topics = response.data
          },
          (response) => {
            console.log("topics all fail" + response);
          }

        )
      }
    }
  }
</script>