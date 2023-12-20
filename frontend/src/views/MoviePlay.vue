<template>
    <div class="videoContainer">
        <div class="videoPlayer">
            <video id="player" playsinline controls>
                <source src="videoSrc" type="video/mp4">
            </video>
        </div>

        <div class="videoInfo">
            <p>{{ videoInfo }}</p>
        </div>
    </div>
</template>

<script>
import Plyr from 'plyr';
import 'plyr/dist/plyr.css';
import axios from 'axios';

export default {
    data() {
        return {
            videoSrc: '', // Store video source URL
            videoInfo: '' // Store video information
        };
    },
    mounted() {
        this.initPlayer();
    },
    methods: {
        initPlayer() {
            this.player = new Plyr('#player', {
                controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'download', 'fullscreen'],
                speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 2] },
            });
        },
        getUrl() {
            // 获取用户名和密码
            const username = this.loginData.username;
            const password = this.loginData.password;

            // 向后端发送登录请求
            axios.post('http://localhost:8080/api/login', {
                username: username,
                password: password
            })
                .then(response => {
                    const status = response.data.status;
                })
                .catch(error => {
                    console.error('请求数据失败', error);
                });
        },
    },
};
</script>

<style>
.videoContainer {
    display: flex;
    flex-direction: column;
    margin-top: 6vh;
    max-width: 80%;
    max-height: 80vh;
}

.videoPlayer {
    margin-top: 3%;

    display: flex;
    justify-content: center;
    border-radius: 15px;
    background-color: aliceblue;
    padding: 20px;
}

.videoInfo {
    display: flex;
    margin-top: 5vh;
    margin-bottom: 5vh;
    font-size: larger;
    color: white;
    background-color: grey;
    border-radius: 15px;
    padding: 20px;
    justify-content: center;
}
</style>
