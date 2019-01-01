import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home.vue'
import Registro from "./components/Registro";
import Login from "./components/Login";

import store from './store';
import Logout from "./components/Logout";

Vue.use(Router)

const router = new Router({
	mode: 'history',
	base: process.env.BASE_URL,
	routes: [
		{
			path: '/',
			redirect: '/login'
		},
		{
			path: '/home',
			name: 'home',
			component: Home,
			meta: {
				requiresAuth: true
			}
		},
		{
			path: '/registro',
			name: 'registro',
			component: Registro,
			meta: {
				requiresVisitor: true
			}
		},
		{
			path: '/login',
			name: 'login',
			component: Login,
			meta: {
				requiresVisitor: true
			}
		},
		{
			path: '/logout',
			name: 'logout',
			component: Logout
		}
	]
});


router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.getters.loggedIn) {
      next({name: 'login'})
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
  		if (store.getters.loggedIn) {
  			next({name: 'home'})
		} else {
  			next()
		}
  } else {
    next()
  }
});


export default router;
