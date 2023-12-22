<template>
    <div class="userContainer">
        <div class="UserInfo">
            <img src="../assets/imgs/touxiang.jpg" />
            <div class="Info">
                <strong>{{ username }}</strong>
                <button @click="clearSession">取消登录</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: ''
        }
    },
    mounted() {
        const username = sessionStorage.getItem('Username');
        if (username) {
            this.username = username;
        }
    },
    methods: {
        clearSession() {
            sessionStorage.clear();
            window.location.href = '/login';
        }
    }
}
</script>

<style>
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

button {
    background-image: linear-gradient(#00e5dd 0%, #00b8fc 80%);
    margin-top: 3vh;
    color: white;
    border: none;
    font-size: 2vh;
    letter-spacing: 5px;
    width: 10vw;
    height: 4vh;
    border-radius: 50PX;
}
</style>
