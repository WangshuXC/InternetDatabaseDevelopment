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
      name4: '王思宇',
      downloadSrc: [
        {
          title: '梁晓储',
          link: 'public/data/2110951梁晓储个人作业.zip',
        },
        {
          title: '方奕',
          link: 'public/data/2112106方奕个人作业.zip'
        },
        {
          title: '团队作业',
          link: 'public/data/LFZW_团队作业(2110951_2112106_2112414_2113419).zip'
        },
        {
          title: '张昊星',
          link: 'public/data/2113419张昊星个人作业.zip'
        },
        {
          title: '王思宇',
          link: 'public/data/2112414王思宇个人作业.zip'
        },
      ],
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

    <div class="download">
      <h2>作业下载</h2>
      <div class="homework">
        <!-- <li v-for="(item, index) in downloadSrc" :key="index">
          <a :href="item.link" :download="item.name">
            <p>{{ item.title }}</p>
          </a>
        </li> -->


        <a v-for="(item, index) in downloadSrc" :key="index" :href="item.link" download>
          <li :key="index">
            <p>{{ item.title }}</p>
          </li>
        </a>
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

.download {
  display: flex;
  flex-direction: column;
  align-items: center;

  padding: 20px;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 15px;
  margin-top: 0vh;
  margin-bottom: 10vh;
  width: 80%;
  min-height: 40vh;
}

.homework {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-around;

  background-color: white;
  border-radius: 15px;
  padding: 20px;

  margin-top: 3vh;
  margin-bottom: 3vh;
  width: 95%;
  min-height: 70%;
}

.homework a {
  justify-content: center;
  align-items: center;
  width: 15%;
  height: 80%;
  margin-bottom: 0;
  text-decoration: none;
}

.homework li {
  display: flex;
  justify-content: center;
  align-items: center;
  list-style: none;
  font-size: 3vh;
  height: 100%;
  background-color: #2196f3;
  border-radius: 10px;
  /* padding: 10px 20px; */
  transition: all 0.2s ease-in-out;
}

.homework li:hover {
  color: white;
  transform: scale(1.2);
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
