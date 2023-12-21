<template>
    <div class="messages">
        <h1>留言板</h1>
        <div class="form">
            <input v-model="username" type="text" placeholder="用户名">
            <textarea v-model="message" placeholder="留言内容"></textarea>
            <button @click="submitMessage">留言</button>
        </div>
        <div id="messageBoard">
            <div v-for="(msg, index) in messages" :key="index" class="message">
                <div class="message-info">
                    <div class="info">
                        <img :src="msg.avatar" alt="头像" width="50" height="50">
                        <strong>{{ msg.username }}</strong>
                    </div>
                    <span>发布于: {{ msg.timestamp }}</span>
                </div>
                <div class="content">{{ msg.content }}</div>
            </div>
        </div>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            username: '',
            message: '',
            messages: [
                {
                    username: '山羊の前端小窝',
                    avatar: '1.jpg',
                    timestamp: '2023/11/07 08:00:00',
                    content: '这是一条留言内容的示例'
                },
                // 可以在这里预先加载一些默认留言数据
            ]
        };
    },
    methods: {
        submitMessage() {
            if (this.message === '') {
                alert('请输入内容');
                return;
            }
            const username = this.username || '匿名';
            const timestamp = this.getCurrentTime();
            this.messages.unshift({
                username: username,
                avatar: '1.jpg',
                timestamp: timestamp,
                content: this.message
            });
            this.username = '';
            this.message = '';
        },
        getCurrentTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = ('0' + (now.getMonth() + 1)).slice(-2);
            const day = ('0' + now.getDate()).slice(-2);
            const hours = ('0' + now.getHours()).slice(-2);
            const minutes = ('0' + now.getMinutes()).slice(-2);
            const seconds = ('0' + now.getSeconds()).slice(-2);
            return `${year}/${month}/${day} ${hours}:${minutes}:${seconds}`;
        }
    }
};
</script>

<style scoped>
* {
    padding: 0;
    margin: 0;
    color: #fff;
    box-sizing: border-box;
}

.messages {
    margin-top: 50px;
    width: 100%;
    padding: 50px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: linear-gradient(to right bottom,
            rgba(255, 255, 255, .6),
            rgba(255, 255, 255, .3),
            rgba(255, 255, 255, .2));
    background-color: rgba(255, 255, 255, 0.266);
    border-radius: 40px;
    box-shadow: 0 10px 50px #00000019;
}

.form {
    display: flex;
    justify-content: center;
    position: relative;
    flex-direction: column;
    width: 100%;
    padding-bottom: 90px;
}

input:focus,
textarea:focus {
    outline: none;
}

input,
textarea {
    border: none;
    color: #000;
    margin-bottom: 40px;
    font: 900 60px '';
    border-radius: 10px;
    padding: 30px;
}

#username {
    height: 90px;
}

#message {
    height: 200px;
}

.messages h1 {
    width: 100%;
    text-align: left;
    margin-bottom: 70px;
    font-size: 140px;
    background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: 10px;
}

#submitBtn {
    position: absolute;
    right: 0;
    bottom: 0;
    background-image: linear-gradient(90deg, #e0c3fc 0%, #8ec5fc 100%);
    border: none;
    font-size: 45px;
    letter-spacing: 5px;
    width: 250px;
    height: 80px;
    border-radius: 50PX;
}

#messageBoard {
    width: 100%;
    text-align: left;
}

@keyframes messageFadeIn {
    to {
        opacity: 1;
    }
}

.message {
    width: 100%;
    margin: 10px;
    padding: 10px;
    opacity: 0;
    animation: messageFadeIn 0.5s ease forwards;
    background-image: linear-gradient(90deg, #8ec5fc 0%, #e0c3fc 100%);
    background-color: #fff;
    margin: 70px 0;
    border-radius: 10px;
    box-shadow: 0 10px 20px #00000026;
    text-shadow: 0px 0px 20px #ffffff;
}

.message-info {
    height: 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 36px;
    position: relative;
}

.info {
    transform: translateY(-30px);
}

.info img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 10px #fff solid;
}

strong {
    position: absolute;
    width: 800px;
    letter-spacing: 3px;
    top: 70px;
    left: 170px;
}

.message-info span {
    position: absolute;
    top: 10px;
    right: 10px;
}

.content {
    font-size: 44px;
    margin: 30px;
    width: 95%;
}
</style>
