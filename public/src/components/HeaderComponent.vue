<template>
  <header>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-1">
        <a v-link="'/topics'">
          <img src="/assets/img/logo_small_trans.png">
        </a>
      </div>
      <div class="col-sm-3">
        <a @click="toggleSearch">Recherche</a>
      </div>
    </div>

  </header><!-- /header -->
</template>

<script>
  export default {
    methods: {
      toggleSearch: function() {
        console.log("header toggleSearch")
        console.log(this)

        this.$dispatch('searchToggled')
      }
    }

  }

</script>