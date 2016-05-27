<template>
<div class="row">
  <div class="form-post col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-4">
    <form id="post-add" @submit.prevent="addPost">
      <div class="close-button row" @click="closeForm">&times;</div>
      <input type="text" name='titre' id='titre' v-model="titre" placeholder="Titre">
      <input type="text" name='auteur' id='auteur' v-model="auteur" placeholder="Auteur">
      <input type="text" name='image' id='image' v-model="image" placeholder="Lien vers l'image">
      <textarea name='texte' id='texte' v-model="texte" placeholder="Corps du message"></textarea>
      <input type="hidden" name="sujet" id="sujet" value="{{topic.id}}" v-model="sujet">
      <input type="submit" value="Ajouter un post">
    </form>
  </div>
</div>
</template>

<script>
  export default {
    name: "PostFormComponent",
    props: {
      topic: Object
    },
    data () {
      return {
        titre: '',
        auteur: '',
        texte: '',
        sujet: '',
        image: ''
      }
    },
    methods: {
      addPost: function () {
        this.$http.post('topic/' + this.topic.id + '/posts', {
          auteur: this.auteur,
          titre: this.titre,
          texte: this.texte,
          sujet: this.sujet,
          image: this.image
        }).then(
          (response) => {
            console.log("success !")
            console.log(response)
          },
          (response) => {
            console.log("fail !")
            console.log(response)
          }
        ).finally(
          () => {
            location.reload();
          }
        )
      },
      closeForm: function() {
        this.$dispatch('closeAddPostForm')
      }
    }
  }

</script>