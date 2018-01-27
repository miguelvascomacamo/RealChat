<template>
    <div  class="container-fluid" id="login">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">

            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-title text-info font-bold text-capitalize text-center"> Real Chat</div>
                    <div class="card-body">
                        <form v-on:submit.prevent="loginForm()">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" v-model="login.email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" v-model="login.password" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
import {loginUrl, getHeaders, userUrl} from './../config'
import {ClientId, ClientSecret} from './../env'
import {mapState} from 'vuex'

export default {
  name: 'App',
  data () {
    return {
      users: [],
      login: {
        email: 'misaelvasco@gmail.com',
        password: '123456'
      }
    }
  },
  computed: {
    ...mapState({
      userStore: state => state.userStore
    })
  },

  created () {
    this.getUsers()

    const postData = {
      grant_type: 'password',
      client_id: 2,
      client_secret: 'O11dbVPLEGvVfDor3MR4r6QukRMzP4iJF2KtyL4W',
      username: 'misaelvasco@gmail.com',
      password: '123456',
      scope: ''
    }
    this.$http.post('http://localhost:8000/oauth/token', postData).then(response => {
      console.log(response)
      const header = {
        'Accept': 'application/json',
        'Authorization': 'Bearer' + response.body.access_token
      }
      this.$http.get('http://localhost:8000/api/users', {headers: header}).then(response => {
        // console.log(response)
      })
    })
  },

  methods: {
    getUsers () {
      this.$http.get('http://localhost:8000/api/users').then(response => {
        // console.log(response)
      })
    },
    loginForm () {
      const postData = {
        grant_type: 'password',
        client_id: ClientId,
        client_secret: ClientSecret,
        username: 'misaelvasco@gmail.com',
        password: '123456',
        scope: ''
      }
      const authUser = {}
      this.$http.post(loginUrl, postData).then(response => {
        if (response.status === 200) {
          console.log('Oauth token', response)
          authUser.access_token = response.data.access_token
          authUser.refresh_token = response.data.refresh_token
          window.localStorage.setItem('authUser', JSON.stringify(authUser))
          this.$http.get(userUrl, {headers: getHeaders()}).then(response => {
            console.log('User Token', response)
            authUser.email = response.body.email
            authUser.name = response.body.name
            window.localStorage.setItem('authUser', JSON.stringify(authUser))
            this.$store.dispatch('setUserObject', authUser)
            this.$router.push({name: 'dashboard'})
          })
        }
      })
    }
  }
}
</script>

<style scoped>
  #login {margin-top: 10px;}
</style>
