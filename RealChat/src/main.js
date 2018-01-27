// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
//  import router from './router'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import DashboardPage from './pages/DashBoardPage'
import LoginPage from './pages/LoginPage'
import store from './store'

Vue.config.productionTip = false
Vue.use(VueResource)
Vue.use(VueRouter)
Vue.component('app', App)
/* eslint-disable no-new */
const routes = [
  {path: '/', component: LoginPage, name: 'home'},
  {path: '/dashboard', component: DashboardPage, name: 'dashboard', meta: { requiresAuth: true }}
]

const router = new VueRouter({
  mode: 'history',
  routes
})
router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth) {
    const authUser = JSON.parse(window.localStorage.getItem('authUser'))
    if (authUser && authUser.access_token) {
      next()
    } else {
      next({name: 'home'})
    }
  }
  next()
})

new Vue({
  router,
  store
}).$mount('#app')

// new Vue({
//   el: '#app',
//   router,
//   components: { App },
//   template: '<App/>'
// })
