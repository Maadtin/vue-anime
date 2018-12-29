<template>

	<div>
		<pre>
		{{ errors }}
	</pre>
		<form class="register-form" @submit.prevent="register">
			<v-layout row wrap>
				<v-flex xs12>
					<v-text-field label="Avatar" prepend-icon='attach_file'></v-text-field>
				</v-flex>
				<v-flex xs6>
					<v-text-field v-model="username" label="Nombre de usuario"></v-text-field>
				</v-flex>
				<v-flex xs6>
					<v-text-field type="text" v-model="email" label="Email"></v-text-field>
				</v-flex>
				<v-flex xs12>
					<v-text-field type="password" v-model="password" label="Contraseña"></v-text-field>
				</v-flex>
				<v-flex xs12>
					<v-text-field type="password" v-model="confirmPassword" label="Confirmar contraseña"></v-text-field>
				</v-flex>

				<v-flex xs12>
					<v-btn type="submit" color="indigo anime-button">Registrar</v-btn>
				</v-flex>

			</v-layout>
		</form>
	</div>





</template>

<script>

	import axios from 'axios';

	export default {
		name: "Registro",
		data: () => ({
			errors: {},
			username: '',
			email: '',
			password: '',
			confirmPassword: '',
			picture: ''
		}),
		methods: {
			register() {
				axios.post(`http://localhost:8000/api/register`, this.$data)
					 .then(response => {
					 	console.log(response.data);
					 })
					 .catch(error => {
					 	let { errors } = error.response.data;
					 	this.errors = errors;
					 })
			}
		}
	}
</script>

<style scoped>

	.register-form {
		width: 700px;
		margin: 50px auto;
	}

</style>