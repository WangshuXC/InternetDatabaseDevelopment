<script>
import axios from 'axios';
export default {
    data() {
        return {
            articalList: [
                { id: 1, title: 'artical1', content: 'aaaaaaaa1', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
            ]
        }
    },
    methods: {
        handlePageChange(page) {
            axios.post('http://10.130.26.91:8080/api/getvideo?page=' + page)
                .then(response => {
                    const elBacktop = document.querySelector('.el-backtop');
                    this.movieList = response.data;
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
    <div class="articalContainner">
        <div class="articalBox">
            <div v-for="item in  articalList " :key="item.id" class="articalItem">
                <h2>{{ item.title }}</h2>
                <div class="info">
                    <div class="picBox">
                        <el-image style="width: auto; height: auto" :src=item.picurl :fit="contain" />
                    </div>
                    <div class="contentBox">
                        <p>{{ item.content }}</p>
                    </div>
                </div>
            </div>
            <el-pagination background layout="prev, pager, next" :total="60" hide-on-single-page
                @current-change="handlePageChange" />
        </div>
    </div>
    <el-backtop :right="100" :bottom="100" />
</template>


<style>
.articalContainner {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-top: 10vh;
    width: 100vw;
    height: auto;
}

.articalBox {
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

.articalItem {
    background-color: rgb(255, 255, 255);
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;
    width: 90%;
    height: 200px;
    margin: 20px 30px;
}

.articalItem h2 {
    margin-top: 0;
    margin-bottom: 10px;
}

.info {
    display: flex;

    width: 100%;
    height: 80%;
}

.picBox {
    display: flex;
    height: 100%;
    width: auto;
}

.picBox img {
    display: flex;
    border-radius: 15px;
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
