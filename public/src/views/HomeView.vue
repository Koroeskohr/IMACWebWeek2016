<template>
  <div class="home">
    <div class="brand">
      <img src="assets/img" alt="">
      <h1>ReddBook</h1>
      <h2>Allez viens, on est bien !</h2>
    </div>
    <div class="topic-list col-sm-6" v-for="topic in topics">
      <a v-link="'/topic/' + topic.id">
        <span class="topic">
          {{ topic.titre }}
        </span>
      </a>
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