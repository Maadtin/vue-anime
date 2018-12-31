<template>


	<form class="register-form" @submit.prevent="register" enctype="multipart/form-data">
		<v-layout row wrap>


			<v-flex xs12>
				<v-text-field label="Avatar" @click="pickFile" prepend-icon='attach_file'></v-text-field>
				<div v-if="errors.avatar && errors.avatar.length" class="messages-container">
						<span class="message error-message" v-for="error in errors.avatar">
							{{ error }}
						</span>
				</div>
				<span class="message error-message" v-if="previewPictureError">
							{{ previewPictureError }}
				</span>
				<input @change="onFilePick" name="avatar" type="file" accept="image/*" style="display: none" ref="image"/>
				<v-flex>
					<v-img xs6 width="100" :src="previewPicture" v-if="previewPicture" alt="Avatar de usuario"
							 class="card-img"/>
				</v-flex>
			</v-flex>
			<v-flex xs6>
				<v-text-field name="username" label="Nombre de usuario"></v-text-field>
				<div v-if="errors.username && errors.username.length" class="messages-container">
						<span class="message error-message" v-for="error in errors.username">
							{{ error }}
						</span>
				</div>
			</v-flex>
			<v-flex xs6>
				<v-text-field type="text" name="email" label="Email"></v-text-field>
				<div v-if="errors.email && errors.email.length" class="messages-container">
						<span class="message error-message" v-for="error in errors.email">
							{{ error }}
						</span>
				</div>
			</v-flex>
			<v-flex xs12>
				<v-text-field type="password" name="password" label="Contraseña"></v-text-field>
				<div v-if="errors.password && errors.password.length" class="messages-container">
						<span class="message error-message" v-for="error in errors.password">
							{{ error }}
						</span>
				</div>
			</v-flex>
			<v-flex xs12>
				<v-text-field type="password" name="confirmPassword" label="Confirmar contraseña"></v-text-field>
				<div v-if="errors.confirmPassword && errors.confirmPassword.length" class="messages-container">
						<span class="message error-message" v-for="error in errors.confirmPassword">
							{{ error }}
						</span>
				</div>
			</v-flex>

			<v-flex xs12>
				<v-btn :loading="buttonLoading" :disabled="buttonLoading" type="submit" color="indigo anime-button">
					Registrar
				</v-btn>
				<v-alert
						  :value="alert.showing"
						  :type="alert.type"
						  :color="alert.type === 'info' ? 'indigo' : ''"
				>
					{{ alert.message }}
				</v-alert>
			</v-flex>

		</v-layout>
	</form>


</template>

<script>

	import axios from 'axios';

	export default {
		name: "Registro",
		data: () => ({
			alert: {
				showing: false,
				type: 'info',
				message: ''
			},
			errors: {},
			picture: '',
			previewPicture: '',
			previewPictureError: '',
			buttonLoading: false
		}),
		methods: {
			onFilePick(event) {
				let file = event.target.files[0];
				this.previewPictureError = '';
				if (file) {
					if (!file.type.includes('image')) {
						this.previewPictureError = 'Solo imagenes permitidas'
					} else {
						let reader = new FileReader();
						reader.onload = e => {
							this.previewPicture = e.target.result;
						};
						reader.readAsDataURL(file);
					}
				}
			},
			pickFile() {
				this.$refs.image.click();
			},
			register(event) {
				this.errors = {};
				this.buttonLoading = true;
				axios.post(`http://localhost:8000/api/register`, new FormData(event.target))
					 .then(response => {
						 this.buttonLoading = false;
						 this.alert.showing = true;
						 if (response.data.message) {
							 this.alert.message = response.data.message;
						 } else {
							 this.alert.message = response.data.error;
							 this.alert.type = 'error';
						 }
					 })
					 .catch(error => {
						 this.buttonLoading = false;
						 let {errors} = error.response.data;
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