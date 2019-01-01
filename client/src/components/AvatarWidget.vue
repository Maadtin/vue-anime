<template>


	<v-avatar>
		<v-img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John"></v-img>


		<v-menu bottom>
			<v-btn slot="activator" icon>
				<v-icon>more_vert</v-icon>
			</v-btn>

			<v-list>
				<v-list-tile>
					<router-link :to="{name: 'logout'}">
						Salir <v-icon style="margin-left: 10px;">exit_to_app</v-icon>
					</router-link>
				</v-list-tile>
			</v-list>
		</v-menu>

	</v-avatar>


</template>

<script>
	export default {
		name: "AvatarWidget",
		methods: {
		}
	}
</script>

<style scoped>

</style>