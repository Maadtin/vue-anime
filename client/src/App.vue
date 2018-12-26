<template>
  <v-app>

    <Header />



      <router-view></router-view>

  </v-app>
</template>

<script>

import Header from "./components/Header";

export default {
  name: 'App',
  components: {
    Header
  },
  data () {
    return {
      //
    }
  }
}
</script>


<style>

  .anime-button {
    color: #fff !important;
    margin-left: 0;
  }

</style>