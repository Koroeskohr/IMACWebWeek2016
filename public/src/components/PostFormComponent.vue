<template>
<div class="row">
  <div class="form-post col-sm-4 col-sm-offset-4">
    <form id="post-add" @submit.prevent="addPost">
      <label for="titre">Titre : </label>
      <input type="text" name='titre' id='titre' v-model="titre">

      <label for="auteur">Votre nom : </label>
      <input type="text" name='auteur' id='auteur' v-model="auteur">

      <label for="image">Lien vers l'image : </label>
      <input type="text" name='image' id='image' v-model="image">

      <label for="texte">Texte : </label>
      <textarea name='texte' id='texte' v-model="texte"></textarea>

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
        )
      }
    }
  }

</script>