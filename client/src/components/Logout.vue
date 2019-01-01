<template>
	
</template>

<script>
	export default {
		name: "Logout",
		created() {
			this.$store.dispatch('destroyToken')
				 .then(result => {
				 	console.log(result);
				 	// this.$router.push({name: 'login'})
				 })
				 .catch(error => {
				 	console.log(error.message);
				 })
		}
	}
</script>

<style scoped>

</style>