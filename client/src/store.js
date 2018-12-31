import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		token: null
	},
	mutations: {
		setToken (state, token) {
			state.token = token;
		}
	},
	actions: {
		getToken(context, form) {
			axios.post('http://vue-anime.test/api/login', new FormData(form))
				 .then(response => {
					 console.log(response.data);
					 context.commit('setToken', response.data.access_token);
				 })
		}
	}
})
