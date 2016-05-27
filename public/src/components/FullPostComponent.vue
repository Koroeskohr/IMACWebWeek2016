<template>
  <div class="row">
    <div class="breadcrumbs col-xs-10 col-xs-offset-1">
      <a v-link="'/topic/' + this.post.sujet">← Retour à la liste des posts</a>
    </div>
  </div>
  <div class="header_rubrique">
    <h1>{{ post.titre }}</h1>
    <h3 class="title_rubrique">Proposé par {{post.auteur}} le {{ post.date }}</h3>
  </div>
  <div class="row">
  <article class="post col-sm-10 col-sm-offset-1">
    <div class="row">
      <div class="col-sm-6 img">
        <img :src="post.image">
        <div class="list_tags">
          <div class="tag" v-for="tag in tags">
            <span>#{{ tag.nom }}</span>
          </div>
        </div>

      </div>
      <div class="col-sm-6 info">
        <div class="text">
          {{{ post.texte }}}
        </div>
        <div class="like-wrapper">
          <div class="nb_likes" @click="like">
            <div class="like-button">
              <img src="/assets/img/coeur.png">
            </div>
            <span class="likes">
              {{ post.likes }} likes
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="comments row">
      <h3 class="title-rubrique-com">Commentaires</h3>
      <div class="line"></div>
      <comment-component v-for="comment in comments" :comment="comment" :post="post"></comment-component>
    </div>
  </article>
</div>
</template>

<script>
  import CommentComponent from './CommentComponent.vue'
  export default {
    name: "FullPostComponent",
    components: { CommentComponent },
    props: {
      post: {
        type: Object,
        required: true,
      },
      comments: Array,
      tags: Array
    },
    methods: {
      like: function() {
        this.$http.post('post/' + this.post.id + '/like').then(
          (response) => {
            console.log('success like')
          },
          (response) => {
            console.log('failure like')
          }
        ).finally(() => { location.reload() })
      }
    },
    ready () {
      // this.$http.get('post/' + this.post.id + "/comments").then(
      //   (response) => {
      //     this.comments = response.data
      //   },
      //   (response) => {
      //     console.log("comment " + this.post.id + " fail " + response);
      //   }
      // )
    }
  }
</script>