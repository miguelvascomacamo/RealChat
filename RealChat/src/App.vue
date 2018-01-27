<template>
    <div>
        <!--<pre>{{ userStore }}</pre>-->
        <top-menu></top-menu>
        <router-view></router-view>
    </div>

</template>

<script>
import TopMenu from './pages/TopMenu'
import {mapState} from 'vuex'
export default {
  components: {
    TopMenu
  },
  computed: {

    ...mapState({
      userStore: state => state.userStore
    })
  },
  created () {
    console.log(' i was created')
    const userObj = JSON.parse(window.localStorage.getItem('authUser'))
    this.$store.dispatch('setUserObject', userObj)
  }
}
</script>

<style lang="sass">
    @import 'assets/css/bootstrap.min.css'

</style>
