<template>
    <div class="userContainer">
        <div class="UserInfo">
            <img src="../assets/imgs/touxiang.jpg" />
            <div class="Info">
                <strong>{{ username }}</strong>
                <button @click="clearSession">取消登录</button>
                <button @click="toggleMessageBoard" id="checkcom">
                    {{ showMessageBoard ? '隐藏评论' : '查看评论' }}
                </button>
            </div>
        </div>

        <div id="messageBoard" v-show="showMessageBoard" key="messageBoard1">
            <div v-for="(msg, index) in messages1" :style="{ '--i': index }" :key="index" class="message">
                <div class="message-info">
                    <div class="info">
                        <router-link :to="'/article/' + msg.ArticleID">
                            <strong>文章id：{{ msg.ArticleID }}</strong>
                        </router-link>
                    </div>
                    <span>发布于: {{ msg.CommentDate }}</span>
                </div>
                <div class="content">{{ msg.Comment }}</div>
            </div>
        </div>

        <div id="messageBoard" v-show="showMessageBoard">
            <div v-for="(msg, index) in messages2" :style="{ '--i': index }" :key="index" class="message">
                <div class="message-info">
                    <div class="info">
                        <router-link :to="'/movie/' + msg.VideoID">
                            <strong>视频id：{{ msg.VideoID }}</strong>
                        </router-link>
                    </div>
                    <span>发布于: {{ msg.CommentDate }}</span>
                </div>
                <div class="content">{{ msg.Comment }}</div>
            </div>
        </div>

        <el-backtop :right="100" :bottom="100" />
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            username: '',
            showMessageBoard: false,
            messages1: [],
            messages2: []
        }
    },
    mounted() {
        const username = sessionStorage.getItem('Username')
        if (username) {
            this.username = username
        }
        this.getAComments()
        this.getVComments()
    },
    methods: {
        clearSession() {
            sessionStorage.clear()
            window.location.href = '/login'
        },
        getAComments() {
            axios
                .post('http://localhost:8080/api/getarticlecomment?username=' + this.username)
                .then((response) => {
                    this.messages1 = response.data
                })
                .catch((error) => {
                    console.error('请求失败:', error)
                    this.$message.error('请求失败')
                })
        },
        getVComments() {
            axios
                .post('http://localhost:8080/api/getvideocomment?username=' + this.username)
                .then((response) => {
                    this.messages2 = response.data
                })
                .catch((error) => {
                    console.error('请求失败:', error)
                    this.$message.error('请求失败')
                })
        },
        toggleMessageBoard() {
            this.showMessageBoard = !this.showMessageBoard
        }
    }
}
</script>

<style scoped>
.userContainer {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-top: 6vh;
    width: 100vw;
    height: auto;
}

.UserInfo {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 30%;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 15px;
    padding: 20px;
    margin-top: 6vh;
}

.UserInfo img {
    width: 40%;
    height: auto;
    border-radius: 15px;
    position: relative;
    z-index: 2;
}

.Info {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    background-color: rgb(255, 255, 255);
    border-radius: 10px;
    width: 100%;
    height: 60vh;
    position: relative;
    z-index: 1;
    margin-top: -20vh;
}

.Info button {
    background-image: linear-gradient(#00e5dd 0%, #00b8fc 80%);
    margin-top: 3vh;
    color: white;
    border: none;
    font-size: 2vh;
    letter-spacing: 5px;
    width: 10vw;
    height: 4vh;
    border-radius: 50px;
}

#checkcom {
    margin-bottom: -10vh;
}

#messageBoard {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 15px;
    width: 40%;
    height: auto;
    text-align: left;
    margin-top: 5vh;

    transition: opacity 0.5s ease;
    opacity: 1;
}

@keyframes messageFadeIn {
    from {
        opacity: 0;
        transform: translateY(50px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.message {
    width: 100%;
    padding: 10px;
    opacity: 1;
    animation: messageFadeIn 0.5s ease forwards;
    /* background-image: linear-gradient(90deg, #8ec5fc 0%, #e0c3fc 100%); */
    background-color: #fff;
    margin: 30px 0;
    border-radius: 10px;
    box-shadow: 0 10px 20px #00000026;
    text-shadow: 0px 0px 20px #ffffff;

    animation: messageFadeIn 0.5s ease forwards;
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
    color: black;
    text-decoration: underline;
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
