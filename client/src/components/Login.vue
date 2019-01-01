<template>


	<form class="login-form" @submit.prevent="login">
		<v-layout row wrap>
			<v-flex xs12>
				<v-text-field type="text" name="email" label="Email"></v-text-field>
			</v-flex>
			<v-flex xs12>
				<v-text-field type="password" name="password" label="Contraseña"></v-text-field>
			</v-flex>

			<v-flex xs12>
				<v-btn :loading="loading" type="submit" color="indigo anime-button">Entrar</v-btn>
			</v-flex>

			<span v-if="error" style="width: 100%" class="message error-message">
					{{ error }}
			</span>

		</v-layout>
	</form>


</template>

<script>

	export default {
		name: "Registro",
		data: () => ({
			error: '',
			loading: false
		}),
		methods: {
			login(event) {
				this.loading = true;
				// pasamos el form
				this.$store.dispatch('getToken', event.target)
					 .then(result => {
						 this.$router.push({name: 'home'});
						 this.loading = false;
					 })
					 .catch(error => {
						 this.loading = false;
						 this.error = error.message;
					 })
			}
		}
	}
</script>

<style scoped>

	.login-form {
		width: 700px;
		margin: 50px auto;
	}

</style>