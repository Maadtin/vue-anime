import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		token: localStorage.getItem('access_token') || null,
	},
	getters: {
		loggedIn(state) {
			return !!state.token;
		}
	},
	mutations: {
		setToken(state, token) {
			state.token = token;
		},
		destroyToken(state) {
			state.token = null;
			localStorage.removeItem('access_token');
		}
	},
	actions: {
		getToken(context, form) {
			return new Promise((resolve, reject) => {
				axios.post('http://vue-anime.test/api/login', new FormData(form))
					 .then(response => {
						 if (response.data.access_token) {
							 resolve(response);
							 localStorage.setItem('access_token', response.data.access_token);
							 context.commit('setToken', response.data.access_token);
						 } else {
							 reject(response.data);
						 }
					 })
					 .catch(error => {
						 reject(error);
					 })
			})
		},
		destroyToken(context) {
			axios.defaults.headers.common['Authorization'] = `Bearer ${context.state.token}`;
			if (context.getters.loggedIn) {
				return new Promise((resolve, reject) => {
					axios.post('http://vue-anime.test/api/logout')
						 .then(response => {
							 resolve(response);
							 context.commit('destroyToken');
						 })
						 .catch(error => {
							 reject(error);
							 context.commit('destroyToken');
						 })
				})
			}
		}
	}
})
