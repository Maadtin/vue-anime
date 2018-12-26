import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home.vue'
import Registro from "./components/Registro";
import Login from "./components/Login";

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/registro',
      name: 'registro',
      component: Registro
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    }
  ]
})
