<template>
  <div class="home">
    <div class="row">
      <div class="info col-sm-10 col-sm-offset-1">
        <div class="center-block">
          <img src="/assets/img/logo.png">
          <h1><span class="red">Redd</span>book</h1>
          <h2>Allez viens, on est bien !</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="stats col-xs-12">
        <div class="col-sm-8 col-sm-8 col-sm-offset-2 col-xs-12">
          <div class="row">
            <div class="topics col-sm-4 col-xs-12">
              <span class="number">{{ topics.length }}</span> sujets
            </div>
            <div class="posts col-sm-4 col-xs-12">
              <span class="number">{{ posts.length }}</span> posts
            </div>
            <div class="comments col-sm-4 col-xs-12">
              <span class="number">{{ comments.length }}</span> commentaires
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="center-block">
          <h2 class="sujets">
            Les sujets
          </h2>
        </div>
        <div class="row">
          <div class="topic-list col-sm-4" v-for="topic in topics">
            <a v-link="'/topic/' + topic.id" class="topic-link">
              <span class="topic">
                {{ topic.titre }}
              </span>
            </a>          
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "HomeView",
    data () {
      return {
        comments: [],
        topics: [],
        posts: []
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

        this.$http.get('comments').then(
          (response) => {
            this.comments = response.data
          },
          (response) => {
            console.log("comments all fail" + response);
          }
        )

        this.$http.get('posts').then(
          (response) => {
            this.posts = response.data
          },
          (response) => {
            console.log("posts all fail" + response);
          }
        )
      }
    }
  }
</script>