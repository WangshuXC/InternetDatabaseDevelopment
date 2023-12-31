<template>
  <div class="card" :class="{ active: isActive }">
    <div class="user">
      <div class="imgBx">
        <img :src="image" alt="user" />
      </div>
      <div class="content">
        <h2>
          {{ name }}<br /><br /><span>{{ info }}</span>
        </h2>
      </div>
      <span class="toggle" @click="toggle"></span>
    </div>
    <ul class="contact">
      <li v-for="(item, index) in contactList" :style="{ '--clr': item.color, '--i': index }" :key="index">
        <a :href="item.link" target="_blank">
          <div class="iconBx"><i :class="item.icon"></i></div>
          <p>{{ item.content }}</p>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: {
    fullname: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      isActive: false,
      name: '',
      info: '',
      image: '',
      contactList: [
        {
          color: '#c71610',
          icon: 'fa-solid fa-envelope',
          content: '',
          link: ''
        },
        {
          color: '#171515',
          icon: 'fa-brands fa-github',
          content: '',
          link: ''
        },
        {
          color: '#1ed76d',
          icon: 'fa-brands fa-weixin',
          content: ''
        }
      ]
    }
  },
  mounted() {
    axios
      .get(`http://localhost:8080/api/getpersonalinfo?name=${this.fullname}`)
      .then((response) => {
        const responseData = response.data
        this.name = responseData.Name
        this.info = responseData.Info
        this.image = responseData.AvatarURL

        this.contactList[0].content = responseData.Email
        this.contactList[0].link = 'mailto:' + responseData.Email
        this.contactList[1].content = responseData.GitHubAccount
        this.contactList[1].link = 'https://github.com/' + responseData.GitHubAccount
        this.contactList[2].content = responseData.WeChatID
      })
      .catch((error) => {
        console.error(error)
      })
  },
  methods: {
    toggle() {
      this.isActive = !this.isActive
    }
  }
}
</script>

<style scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.card {
  position: relative;
  transition: 0.5s;
  height: 100px;
  transition-delay: 0.5s;
}

.card.active {
  height: 450px;
  transition-delay: 0s;
}

.card .user {
  position: relative;
  width: 400px;
  min-height: 150px;
  background-color: #2196f3;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 60px 40px 30px;
  gap: 10px;
  border-radius: 10px;
}

.card .user .imgBx {
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  transform: translateY(-50%);
  border-radius: 100%;
  border: 6px solid #fff;
  overflow: hidden;
  transition: 0.5s;
  z-index: 10;
}

.card .user .imgBx img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.card .user .content {
  position: relative;
  text-align: center;
}

.card .user .content h2 {
  font-size: 1.2em;
  line-height: 1.05rem;
  font-weight: 600;
  color: #fff;
}

.card .user .content h2 span {
  font-size: 0.75em;
  font-weight: 400;
}

.card .user .toggle {
  position: absolute;
  bottom: 0;
  width: 120px;
  padding: 5px 15px;
  background-color: #ff4383;
  border-radius: 30px;
  transform: translateY(50%);
  border: 6px solid var(--bg);
  text-align: center;
  cursor: pointer;
  font-weight: 500;
  transition: 0.5s;
}

.card.active .user .toggle {
  background-color: #d0d0d0;
  color: #fff;
}

.card .user .toggle::before {
  content: 'Contact me';
}

.card.active .user .toggle::before {
  content: 'Close';
}

.card .contact {
  position: relative;
  top: 30px;
  width: 100%;
  height: 0;
  /* overflow: hidden; */
  display: flex;
  flex-direction: column;
  gap: 10px;
  transition: 0.5s;
}

.card.active .contact {
  height: 325px;
}

.card .contact li {
  list-style: none;
  width: 100%;
  min-height: 100px;
  background-color: #fff;
  border-radius: 10px;
  display: flex;
  opacity: 0;
  transform: scale(0);
  padding: 10px 20px;
  transition: 0.5s;
  transition-delay: 0.2s;
}

.card.active .contact li {
  opacity: 1;
  transform: scale(1);
  transition-delay: calc(0.25s * var(--i));
}

.card.active .contact:hover li {
  opacity: 0.15;
  filter: blur(2px);
  transition-delay: 0s;
}

.card.active .contact li:hover {
  opacity: 1;
  filter: blur(0px);
}

.card .contact li a {
  display: flex;
  align-items: center;
  text-decoration: none;
  gap: 10px;
}

.card .contact li a .iconBx {
  position: relative;
  width: 60px;
  height: 60px;
  background-color: var(--clr);
  border-radius: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card .contact li a .iconBx i {
  color: #fff;
  font-size: 1.5em;
}

.card .contact li a p {
  color: #666;
  font-size: 1.1em;
}

.card .contact li a:hover p {
  color: #111;
}
</style>
