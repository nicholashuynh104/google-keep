import Vue from 'vue'
import VueRouter from 'vue-router'
import Notes from '../views/Notes.vue'
import Main from '../views/Main.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'

Vue.use(VueRouter)

const routes = [
  {
      path:'/',
      name: 'main',
      component:Main,
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
  },
  {
      path:'/notes',
      name: 'notes',
      component:Notes,
  },
]
const router = new VueRouter ({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})
export default router