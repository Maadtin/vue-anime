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

  .message {
    font-size: 13px;
  }
  .error-message {
    color: crimson;
  }

  .anime-button {
    color: #fff !important;
    margin-left: 0;
  }

</style>