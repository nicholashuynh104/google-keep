import Vue from 'vue'
import VueRouter from 'vue-router'
import Notes from '../views/Notes.vue'
import Bins from '../views/Bins.vue'
import Main from '../views/Main.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import Achieve from '../views/Achieve.vue'

Vue.use(VueRouter)

const guest = (to,from,next) => {
  if(!localStorage.getItem('token')) {
    return next();
  }

  return next('/notes');
}

const auth = (to,from,next) => {
  if (localStorage.getItem('token')) {
    return next();
  }

  return next('/');
}

const routes = [
  {
    path:'/',
    name: 'main',
    component:Main,
    beforeEnter: guest
  },
  {
    path:'/register',
    name: 'register',
    component:Register,
  },
  {
    path:'/login',
    name: 'login',
    component:Login,
    beforeEnter: guest
  },
  {
    path:'/notes',
    name: 'notes',
    component:Notes,
    beforeEnter: auth
  },
  {
    path:'/bins',
    name: 'bins',
    component:Bins,
    beforeEnter: auth
  },
  {
    path:'/achieves',
    name: 'achieves',
    component:Achieve,
    beforeEnter: auth
  },
]
const router = new VueRouter ({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})
export default router