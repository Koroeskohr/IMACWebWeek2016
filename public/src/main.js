import Vue from 'vue'
import Router from 'vue-router'
import Resource from 'vue-resource'
import App from './App.vue'
import { fromNow } from './filters'

import HomeView from './views/HomeView.vue'
import ListView from './views/ListView.vue'
import PostView from './views/PostView.vue'

Vue.use(Router)
Vue.use(Resource)

Vue.filter('fromNow', fromNow)


const API_BASE_URL = "http://192.168.33.10"
Vue.http.options.root = API_BASE_URL + '/api/public';

var router = new Router({
  hashbang: false,
  history: true,
  mode: "html5"
})

router.map({
  '/topics': {
    component: HomeView
  },
  '/topic/:id': {
    component: ListView
  },
  '/post/:id': {
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