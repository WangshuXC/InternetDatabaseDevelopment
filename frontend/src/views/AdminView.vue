<script>
import axios from 'axios'
export default {
  data() {
    return {
      ifAdmin: '',
    }
  },
  mounted() {
    this.register()
  },
  methods: {
    register() {
      // 获取用户名和密码
      const username = sessionStorage.getItem('Username')
      const password = sessionStorage.getItem('Password')

      // 向后端发送请求
      axios
        .post('http://localhost:8080/api/adminlogin?username=' + username + '&password=' + password)
        .then((response) => {
          const status = response.data.status
          if (status === 1) {
            this.$message.success('验证成功')
            setTimeout(() => {
              window.location.href = 'http://localhost:8080/'
            }, 1000)
          } else if (status === 0) {
            // 注册失败
            this.$message.error('验证失败')
          }
        })
        .catch((error) => {
          console.error('发送请求失败:', error)
          this.$message.error('发送请求失败')
        })
    },
  }
}
</script>

<template>
  <div class="admin">管理员验证界面</div>
</template>

<style>
.admin {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: aliceblue;
  width: 100vw;
  height: 100vh;
}
</style>
