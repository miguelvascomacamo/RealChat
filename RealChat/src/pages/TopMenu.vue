<template>
  <nav class="navbar navbar-expand-md navbar-light bg-light" v-if="userStore.authUser !== null && userStore.authUser.access_token">
  <a class="navbar-brand" href="#">Real Chat by Miguel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown right">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav mr-auto navbar-right">
          <li class="nav-item dropdown right">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  username
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" v-on:click="LoginForm()">Logout</a>
              </div>
          </li>
    </ul>
  </div>
</nav>
</template>

<script>
import {mapState} from 'vuex'
export default {
  name: 'top-menu',
  computed: {

    ...mapState({
      userStore: state => state.userStore
    })
  },
  methods: {
    LoginForm () {
      this.$store.dispatch('clearAuthUser')
      window.localStorage.removeItem('authUser')
      this.$router.push({name: 'home'})
    }
  }
}
</script>

<style scoped>

</style>
