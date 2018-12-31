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
				<v-btn type="submit" color="indigo anime-button">Entrar</v-btn>
			</v-flex>

		</v-layout>
	</form>


</template>

<script>

	export default {
		name: "Registro",
		methods: {
			login(event) {
				// pasamos el form
				this.$store.dispatch('getToken', event.target);
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