import Vue from 'vue'
import Router from 'vue-router'
import App from './App.vue'

import HomeView from './views/HomeView.vue'
import ListView from './views/ListView.vue'
import PostView from './views/PostView.vue'

Vue.use(Router)
var router = new Router()
router.map({
  '/topics': {
    component: HomeView
  },
  '/topic/:id': {
    component: ListView
  },
  '/item/:id': {
    component: PostView
  }
})

router.beforeEach(function () {
  window.scrollTo(0, 0)
})

router.redirect({
  '*': '/topics'
})

router.start(App, '#app')

// new Vue({
//   el: 'body',
//   components: { App }
// })
