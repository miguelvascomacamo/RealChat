<template>
  <div id="app">
    <img src="./assets/logo.png">

    <router-view/>

    Users
  </div>
</template>

<script>
export default {
  name: 'App',
  data () {
    return {
      users: []
    }
  },

  created () {
    this.getUsers()
  },

  methods: {
    getUsers () {
      this.$http.get('http://localhost:8000/api/users').then(response => {
        console.log(response)
      })
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
