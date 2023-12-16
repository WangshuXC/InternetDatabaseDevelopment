<template>
    <el-menu :default-active="getCurrentMenuUrl()" class="el-menu" mode="horizontal" router="false" menu-trigger="hover"
        :ellipsis="false" unique-opened>
        <el-menu-item index="/">首页</el-menu-item>

        <el-input v-model="searchText" class="search" size="large" placeholder="输入关键字进行搜索..." />

        <div class="flex-grow" />
        <el-menu-item index="/movie">视频</el-menu-item>
        <el-menu-item index="/artical">文章</el-menu-item>
        <el-menu-item index="/about">关于</el-menu-item>
        <el-menu-item index="/user">个人</el-menu-item>
    </el-menu>
</template>

<script>
import qqImage from '@/assets/imgs/qq.jpg';
export default {
    data() {
        return {
            searchText: '',
            imageUrl: qqImage,
        };
    },
    methods: {
        getCurrentMenuUrl() {
            return this.$route.path;
        },
    },
};
</script>

<style>
.flex-grow {
    flex-grow: 1;
}

.search {
    max-width: 50%;
    min-width: 35%;
    margin-left: 20%;
    margin-right: 10%;
    margin-bottom: 10px;
}
</style>
