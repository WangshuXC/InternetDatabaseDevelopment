<template>
  <div v-if="show" class="App-Header">
    <NavBar></NavBar>
  </div>
  <transition name="fade">
    <div class="App-Containner">
      <router-view></router-view>
    </div>
  </transition>

  <div v-if="show" class="App-Footer">
    <WaveFoot></WaveFoot>
  </div>
</template>

<script>
import NavBar from './components/NavBar.vue'
import WaveFoot from './components/WaveFoot.vue'
import axios from 'axios'
export default {
  name: 'App',
  components: {
    NavBar,
    WaveFoot
  },
  computed: {
    show() {
      const meta = this.$route.meta

      return !meta || meta.showNavBar !== false
    }
  },
  mounted() {
    this.AddWebView()
  },
  methods: {
    AddWebView() {
      axios
        .post('http://localhost:8080/api/addwebviews')
        .catch((error) => {
          console.error('浏览量增加失败', error)
        })
    }
  }
}
</script>

<style>
html {
  background: linear-gradient(to top, rgba(0, 181, 255, 1) 0%, rgba(0, 231, 220, 1) 100%);
}

.App-Header {
  height: 3vh;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.App-Containner {
  display: flex;
  justify-content: center;
}

.App-Footer {}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
