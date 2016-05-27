<template>
  <div class="post-list">
    <div class="header_rubrique">
      <h1>{{ topic.titre }}</h1>
      <h3 class="title_rubrique">{{topic.countPost}} posts</h3>
    </div>
    <div class="button row">
      <button v-show="!addPostToggled" @click="toggleAddPost">Ajouter un post</button>
    </div>
    <post-form-component :topic="topic" v-show="addPostToggled" @keyup.esc="hideAddForm"></post-form-component>
    <list-post-component
      v-for='post in posts'
      :post='post'>
    </list-post-component>
  </div>
</template>

<script>
  import PostFormComponent from '../components/PostFormComponent.vue'
  import ListPostComponent from '../components/ListPostComponent.vue'
  import CommentComponent from '../components/CommentComponent.vue'

  export default {
    name: "ListView",
    components: { ListPostComponent, CommentComponent, PostFormComponent },
    data () {
      return {
        topic: {},
        posts: [],
        addPostToggled: false
      }
    },
    methods: {
      toggleAddPost: function () {
        this.addPostToggled = !this.addPostToggled
      },
      hideAddForm: function () {
        this.addPostToggled = false;
      }
    },
    route: {
      data ({ to }) {
        this.$on('closeAddPostForm', this.hideAddForm)
        //to.params.id = topic_id
        this.$http.get('topic/'+ to.params.id +'/posts').then( 
          (response) => {
            this.posts = response.data
          }, (response) => {
            console.log("post all fail " + response)
          }
        )

        this.$http.get('topic/'+ to.params.id).then( 
          (response) => {
            this.topic = response.data
          }, (response) => {
            console.log("post all fail " + response)
          }
        )
      }
    }
  }
</script>