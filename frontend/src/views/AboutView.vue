<script>
import MenberBox from '../components/MenberBox.vue'
import axios from 'axios'
export default {
  data() {
    return {
      views: 0,
      Info: "",
      name1: '梁晓储',
      name2: '张昊星',
      name3: '方奕',
      name4: '王思宇'
    }
  },
  components: {
    MenberBox
  },
  mounted() {
    this.checkViews()
    this.getInfo()
  },
  methods: {
    checkViews() {
      axios.post('http://localhost:8080/api/checkwebviews')
        .then((response) => {
          this.views = response.data.Views
        })
        .catch((error) => {
          console.error('请求失败', error)
        })
    },
    getInfo() {
      axios.post('http://localhost:8080/api/getpersonalinfo?name=网站介绍')
        .then((response) => {
          this.Info = response.data.Info
        })
        .catch((error) => {
          console.error('请求失败', error)
        })
    }
  }
}
</script>

<template>
  <div class="aboutContainer">
    <h2>网站已经被访问了 {{ views }} 次，感谢您的宣传！</h2>
    <div class="webInfo0">
      <h2>关于网站</h2>
      <div class="Info0" v-html="Info">
      </div>
    </div>

    <div class="webInfo1">
      <MenberBox :fullname="name1"></MenberBox>
      <MenberBox :fullname="name2"></MenberBox>
    </div>
    <div class="webInfo2">
      <MenberBox :fullname="name3"></MenberBox>
      <MenberBox :fullname="name4"></MenberBox>
    </div>
    <el-backtop :right="100" :bottom="100" />
  </div>
</template>

<style>
.aboutContainer {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 10vh;
  width: 100%;
  min-height: 65vh;

  overflow-x: hidden;
  overflow-y: hidden;
}

.webInfo0 {
  display: flex;
  flex-direction: column;
  align-items: center;

  padding: 20px;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 15px;
  margin-top: 10vh;
  margin-bottom: 10vh;
  width: 80%;
  min-height: 40vh;
}

.Info0 {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: space-evenly;

  background-color: white;
  border-radius: 15px;
  padding: 20px;

  margin-top: 3vh;
  margin-bottom: 3vh;
  width: 95%;
  min-height: 70%;
}

.webInfo1 {
  display: flex;
  margin-top: 10vh;
  margin-bottom: 10vh;
  width: 100%;
  justify-content: space-evenly;
}

.webInfo2 {
  display: flex;
  margin-top: 10vh;
  margin-bottom: 10vh;
  width: 100%;
  justify-content: space-evenly;
}

.card {
  margin-inline: 30px;
}
</style>
