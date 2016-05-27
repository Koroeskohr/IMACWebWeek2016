<template>
  <div id="wrapper">
    <search-component v-show='searchToggled'></search-component>
    <header-component v-show="!isHome"></header-component>
    <router-view>
    </router-view>
  </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent.vue'
import SearchComponent from './components/SearchComponent.vue'
export default {
  components: { HeaderComponent, SearchComponent },
  computed: {
    isHome () {
      return this.$route.path === "/topics"
    },
    searchToggled() {
      console.log("app searchToggled")
      return this.searchIsOn;
    }
  },
  created () {
    this.$on('searchToggled', this.toggleSearch)
  },
  data () {
    return {
      // note: changing this line won't causes changes
      // with hot-reload because the reloaded component
      // preserves its current state and we are modifying
      // its initial state.
      searchIsOn: false
    }
  },
  methods: {
    toggleSearch: function () {
      console.log("app toggleSearch")

      this.searchIsOn = !this.searchIsOn;
    }
  }
}
</script>

<style>
body {
  font-family: 'Open Sans', sans-serif;
}
</style>
