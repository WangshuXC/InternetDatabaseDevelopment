<template>
    <div class="videoContainer">
        <div class="videoPlayer">
            <video id="player" playsinline controls>
                <source src="" type="video/mp4" />
            </video>
        </div>

        <div class="videoInfo">
            <p>{{ videoInfo }}</p>
        </div>

        <div class="CommentContainer">
            <div class="CommentForm">
                <textarea v-model="message" placeholder="留言内容"></textarea>
                <button id="submitBtn" @click="submitMessage">留言</button>
            </div>
            <div id="messageBoard">
                <div v-for="(msg, index) in messages" :key="index" class="message">
                    <div class="message-info">
                        <div class="info">
                            <strong>{{ msg.Username }}</strong>
                        </div>
                        <span>发布于: {{ msg.CommentDate }}</span>
                    </div>
                    <div class="content">{{ msg.Comment }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Plyr from 'plyr'
import 'plyr/dist/plyr.css'
import axios from 'axios'

export default {
    data() {
        return {
            videoSrc: '',
            videoInfo: '',
            messages: []
        }
    },
    components: {},
    mounted() {
        this.initPlayer()
        this.getUrl()
        this.getComments()
        this.addClick()
    },
    methods: {
        initPlayer() {
            this.player = new Plyr('#player', {
                controls: [
                    'play-large',
                    'play',
                    'progress',
                    'current-time',
                    'mute',
                    'volume',
                    'settings',
                    'fullscreen'
                ],
                speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 2] }
            })
        },
        getUrl() {
            const id = this.$route.params.id
            // 向后端发送登录请求
            axios
                .post('http://localhost:8080/api/getvideo?id=' + id)
                .then((response) => {
                    this.videoSrc = response.data.VideoURL
                    this.videoInfo = response.data.Description
                    this.player.source = {
                        type: 'video',
                        sources: [{ src: this.videoSrc, type: 'video/mp4' }]
                    }
                })
                .catch((error) => {
                    console.error('请求数据失败', error)
                })
        },
        getComments() {
            const id = this.$route.params.id
            axios
                .post('http://localhost:8080/api/getvideocomment?vid=' + id)
                .then((response) => {
                    this.messages = response.data
                })
                .catch((error) => {
                    console.error('请求数据失败', error)
                })
        },
        addClick() {
            const id = this.$route.params.id
            axios
                .post('http://localhost:8080/api/addclick?contentID=' + id + "&contenttype=Video")
                .then((response) => {

                })
                .catch((error) => {
                    console.error('请求失败', error)
                })
        },
        submitMessage() {
            const username = sessionStorage.getItem('Username')
            const id = this.$route.params.id
            if (this.message) {
                const url = `http://localhost:8080/api/addvideocomment?username=${username}&comment=${encodeURIComponent(
                    this.message
                )}&videoID=${id}`
                axios
                    .post(url)
                    .then((response) => {
                        const status = response.data.status
                        if (status === -1) {
                            this.$message.error('添加评论失败')
                        } else {
                            this.message = ''
                            this.getComments()
                        }
                    })
                    .catch((error) => {
                        console.error('发送数据失败', error)
                        this.$message.error('添加评论失败2')
                    })
            } else {
                this.$message.error('请填写留言内容！')
            }
        }
    }
}
</script>

<style scoped>
.videoContainer {
    display: flex;
    flex-direction: column;
    margin-top: 6vh;
    max-width: 80%;
    align-items: center;
}

.videoPlayer {
    min-width: 90%;

    display: flex;
    justify-content: center;
    border-radius: 15px;
    background-color: rgba(255, 255, 255, 0.7);
    padding: 20px;
}

.videoInfo {
    display: flex;
    margin-top: 5vh;
    margin-bottom: 5vh;
    font-size: 3vh;
    color: rgb(0, 0, 0);
    background-color: rgba(255, 254, 254, 0.7);
    border-radius: 15px;
    padding: 20px;
    justify-content: center;
    width: 100%;
}

.CommentContainer {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    background-color: rgba(240, 248, 255, 0.7);
    border-radius: 15px;
    width: 100%;
    height: auto;
}

.CommentForm {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    flex-direction: column;
    width: 100%;
    padding-bottom: 4vh;
}

.CommentForm textarea {
    border: none;
    outline: none;
    color: #000;
    margin-bottom: 4vh;
    font: 800 20px '';
    border-radius: 10px;
    padding: 30px;
    width: 90%;
    resize: none;
}

#submitBtn {
    position: absolute;
    right: 0;
    bottom: 0;
    background-image: linear-gradient(#00e5dd 0%, #00b8fc 100%);
    color: white;
    border: none;
    font-size: 3vh;
    letter-spacing: 5px;
    width: 10vw;
    height: 5vh;
    border-radius: 50px;
}

#messageBoard {
    width: 90%;
    text-align: left;
}

.message {
    width: 100%;
    margin: 10px;
    padding: 10px;
    opacity: 1;
    animation: messageFadeIn 0.5s ease forwards;
    /* background-image: linear-gradient(90deg, #8ec5fc 0%, #e0c3fc 100%); */
    background-color: #fff;
    margin: 70px 0;
    border-radius: 10px;
    box-shadow: 0 10px 20px #00000026;
    text-shadow: 0px 0px 20px #ffffff;
}

.message-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 2vh;
    position: relative;
    margin-bottom: 30px;
}

.message-info strong {
    position: absolute;
    top: 10px;
    left: 10px;
}

.message-info span {
    position: absolute;
    top: 10px;
    right: 10px;
}

.content {
    font-size: 2vh;
    margin-top: 5vh;
    margin-inline: 2vw;
    margin-bottom: 2vh;
    width: 95%;
}
</style>
