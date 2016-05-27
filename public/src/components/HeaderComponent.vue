<template>
  <header>
    <div class="row">
      <div class="col-xs-8 col-xs-offset-1">
        <a v-link="'/topics'">
          <img src="/assets/img/logo_small_trans.png">
        </a>
      </div>
      <div class="col-xs-2 search-zone">
        <a @click="toggleSearch" class="search-button">
          <span class="search-link">
            Recherche
          </div>
        </a>
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