<template>





			<v-form class="register-form" @submit.prevent="register" v-model="valid">
				<v-layout row wrap>
					<v-flex xs12>
						<v-text-field label="Avatar" prepend-icon='attach_file'></v-text-field>
					</v-flex>
					<v-flex xs6>
						<v-text-field v-model="username" label="Nombre de usuario" required></v-text-field>
					</v-flex>
					<v-flex xs6>
						<v-text-field type="email" v-model="email" label="Email" required></v-text-field>
					</v-flex>
					<v-flex xs12>
						<v-text-field type="password" v-model="password" label="Contraseña" required></v-text-field>
					</v-flex>
					<v-flex xs12>
						<v-text-field type="password" v-model="confirmPassword" label="Confirmar contraseña" required></v-text-field>
					</v-flex>

					<v-flex xs12>
						<v-btn color="indigo anime-button">Registrar</v-btn>
					</v-flex>

				</v-layout>
			</v-form>



</template>

<script>
	export default {
		name: "Registro",
		data: () => ({
			username: '',
			email: '',
			password: '',
			confirmPassword: '',
			picture: '',
			valid: false
		}),
		methods: {
			register() {
				console.log(this.$data);
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