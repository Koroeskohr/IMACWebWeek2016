<template>
  <div id="wrapper">
    <header-component v-show="!isHome"></header-component>
    <router-view
      @route-data-loaded="updatePathName">
    </router-view>
  </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent.vue'
export default {
  components: { HeaderComponent },
  computed: {
    isHome () {
      return this.pathName === "/topics"
    }
  },
  created () {
    this.pathName = window.location.pathname;
  },
  data () {
    return {
      // note: changing this line won't causes changes
      // with hot-reload because the reloaded component
      // preserves its current state and we are modifying
      // its initial state.
      "pathName": ''
    }
  },
  methods: {
    updatePathName: (vm) => {
      console.log("upd path")
      this.pathName = window.location.pathname;
    }
  }
}
</script>

<style>
body {
  font-family: Helvetica, sans-serif;
}
</style>
