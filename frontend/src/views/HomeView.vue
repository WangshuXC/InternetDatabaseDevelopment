<script>
import Plyr from 'plyr'
import 'plyr/dist/plyr.css'
export default {
  data() {
    return {
      imagePaths: [
        'src/assets/imgs/1.png',
        'src/assets/imgs/2.png',
        'src/assets/imgs/3.png',
        'src/assets/imgs/4.png',
        'src/assets/imgs/5.png',
        'src/assets/imgs/6.png',
        'src/assets/imgs/7.png',
        'src/assets/imgs/8.png',
        'src/assets/imgs/9.png',
        'src/assets/imgs/10.png',
        'src/assets/imgs/11.png',
        'src/assets/imgs/12.png',
        'src/assets/imgs/13.png',
        'src/assets/imgs/14.png',
        'src/assets/imgs/15.png',
        'src/assets/imgs/16.png'
      ]
    }
  },
  mounted() {
    this.initPlayer()
  },
  methods: {
    initPlayer() {
      this.player = new Plyr('#player1', {
        controls: ['play-large', 'progress', 'current-time'],
        speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 2] }
      })
      this.player = new Plyr('#player2', {
        controls: ['play-large', 'progress', 'current-time'],
        speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 2] }
      })
    }
  }
}
</script>

<template>
  <div class="homeContainer">
    <h1>日本危害海洋环境的始末</h1>
    <div class="timeLine">
      <el-carousel :interval="3000" type="card" height="50vh" trigger="click">
        <el-carousel-item v-for="(imagePath, index) in imagePaths" :key="index">
          <img :src="imagePath" alt="pic" />
        </el-carousel-item>
      </el-carousel>
    </div>

    <div class="videoPlayer">
      <h1>福岛核废水轨迹模拟</h1>
      <video id="player1" playsinline controls>
        <source src="../assets/videos/扩散.mp4" type="video/mp4" />
      </video>
    </div>

    <div class="videoPlayer">
      <h1>百万吨核污染水入海，有何危害？</h1>
      <video id="player2" playsinline controls>
        <source src="../assets/videos/危害.mp4" type="video/mp4" />
      </video>
    </div>
  </div>
</template>

<style scoped>
.homeContainer {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 90%;
  min-height: 65vh;
  margin-top: 10vh;
}

.homeContainer h1 {
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  margin-bottom: 3vh;
}

.timeLine {
  display: block;
  width: 100%;
  height: 50vh;
}

.timeLine img {
  max-width: 100%;
  height: auto;
  display: block;
}


.videoPlayer {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  margin-top: 10vh;
  max-width: 50%;

  display: flex;
  justify-content: center;
  border-radius: 15px;
  background-color: rgba(255, 255, 255, 0.7);
  padding: 20px;
}

.videoPlayer h1 {
  color: #ffffff;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
</style>
