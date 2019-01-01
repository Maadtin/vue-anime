<template>

	<v-toolbar>

		<v-toolbar-title class="headline text-uppercase">
			<router-link :to="{name: 'home'}" class="font-weight-light header-logo-text">
				AnimeList
			</router-link>
		</v-toolbar-title>

		<v-spacer></v-spacer>




		<div v-if="!loggedIn" class="auth-buttons">
			<v-btn active-class="darken-4" :to="{name: 'registro'}" color="indigo" class="anime-button">
				Registro
			</v-btn>
			<v-btn active-class="darken-4" :to="{name: 'login'}" color="indigo" class="anime-button">
				Login
			</v-btn>
		</div>

		<div v-else class="logged-data">
			<AvatarWidget></AvatarWidget>
		</div>

	</v-toolbar>
	
</template>

<script>
	import AvatarWidget from "./AvatarWidget";
	export default {
		name: "Header",
		components: {AvatarWidget},
		computed: {
			loggedIn () {
				return this.$store.getters.loggedIn;
			}
		}
	}
</script>

<style scoped>

	.header-logo-text {
		color: rgba(0,0,0,0.87) !important;;
		text-decoration: none;
	}

</style>