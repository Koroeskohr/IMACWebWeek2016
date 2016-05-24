<template>
  <div class="home">
    HomePage


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