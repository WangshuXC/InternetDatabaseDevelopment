<template>
  <div v-if="showNavBar" class="App-Header">
    <NavBar></NavBar>
  </div>

  <div class="App-Containner">
    <router-view></router-view>
  </div>

  <div class="App-Footer">
    <WaveFoot></WaveFoot>
  </div>
</template>

<script>
import NavBar from './components/NavBar.vue';
import WaveFoot from './components/WaveFoot.vue';

export default {
  name: 'App',
  components: {
    NavBar,
    WaveFoot
  },
  computed: {
    showNavBar() {
      const meta = this.$route.meta;

      return !meta || meta.showNavBar !== false;
    }
  },
}
</script>

<style>
.App-Header {
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.App-Containner {
  display: flex;
  justify-content: center;
}
</style>
