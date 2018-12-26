<template>

	<v-toolbar>

		<v-toolbar-title class="headline text-uppercase">
			<router-link :to="{name: 'home'}" class="font-weight-light header-logo-text">
				AnimeList
			</router-link>
		</v-toolbar-title>

		<v-spacer></v-spacer>

		<v-btn active-class="darken-4" :to="{name: 'registro'}" color="indigo" class="anime-button">
			Registro
		</v-btn>
		<v-btn active-class="darken-4" :to="{name: 'login'}" color="indigo" class="anime-button">
			Login
		</v-btn>

	</v-toolbar>
	
</template>

<script>
	export default {
		name: "Header"
	}
</script>

<style scoped>

	.header-logo-text {
		color: rgba(0,0,0,0.87) !important;;
		text-decoration: none;
	}

</style>