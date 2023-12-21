<template>
    <div class="videoContainer">
        <div class="videoPlayer">
            <video id="player" playsinline controls>
                <source src="" type="video/mp4">
            </video>
        </div>

        <div class="videoInfo">
            <p>{{ videoInfo }}</p>
        </div>

        <div class="CommentContainer">
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
            videoSrc: '',
            videoInfo: ''
        }
    },
    components: {
    },
    mounted() {
        this.initPlayer();
        this.getUrl();
    },
    methods: {
        initPlayer() {
            this.player = new Plyr('#player', {
                controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'download', 'fullscreen'],
                speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 2] },
            });
        },
        getUrl() {
            const id = this.$route.params.id;
            // 向后端发送登录请求
            axios.post('http://10.130.26.91:8080/api/getvideo?id=' + id)
                .then(response => {
                    this.videoSrc = response.data.VideoURL;
                    this.videoInfo = response.data.Description;
                    this.player.source = { type: 'video', sources: [{ src: this.videoSrc, type: 'video/mp4' }] };
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

.CommentContainer {
    display: flex;
    width: 100%;
    height: auto;
}
</style>
