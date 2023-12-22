<script>
import axios from 'axios';
export default {
    data() {
        return {
            articleList: [
            ]
        }
    },
    mounted() {
        this.getUrl();
    },
    methods: {
        getUrl() {
            axios.post('http://10.130.26.91:8080/api/getarticle')
                .then(response => {
                    this.articleList = response.data;
                })
                .catch(error => {
                    console.error('请求失败', error);
                });
        },
        handlePageChange(page) {
            axios.post('http://10.130.26.91:8080/api/getarticle?page=' + page)
                .then(response => {
                    const elBacktop = document.querySelector('.el-backtop');
                    this.articleList = response.data;
                    elBacktop.click();
                })
                .catch(error => {
                    console.error('请求失败', error);
                });
        }
    }
}
</script>

<template>
    <div class="articleContainner">
        <div class="articleBox">
            <div v-for="item in articleList" :key="item.ArticleID" class="articleItem">
                <router-link :to="'/article/' + item.ArticleID">
                    <h2>{{ item.Title }}</h2>
                    <!-- <div class="contentBox" v-html="item.Content" /> -->
                </router-link>
            </div>
            <el-pagination background layout="prev, pager, next" :total="40" hide-on-single-page
                @current-change="handlePageChange" />
        </div>
    </div>
    <el-backtop :right="100" :bottom="100" />
</template>


<style>
.articleContainner {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-top: 10vh;
    width: 100vw;
    height: auto;
}

.articleBox {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;

    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 15px;

    width: 90%;
    height: auto;
    padding: 30px;
}

.articleItem {
    background-color: rgb(255, 255, 255);
    border-radius: 15px;
    justify-content: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    width: 90%;
    height: auto;
    margin: 20px 30px;
}

.articleItem a {
    text-decoration: none;
}

.articleItem h2 {
    margin-top: 0;
    margin-bottom: 10px;
    color: black;
}

.info {
    display: flex;

    width: 100%;
    height: 80%;
}

.contentBox {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;

    margin-left: 40px;
    height: 100%;
}

.contentBox p {
    margin-top: 0;
}
</style>
