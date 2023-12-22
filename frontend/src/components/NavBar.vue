<template>
    <el-menu :default-active="getCurrentMenuUrl()" class="el-menu" mode="horizontal" router="false" menu-trigger="hover"
        :ellipsis="false" unique-opened>
        <el-menu-item index="/">首页</el-menu-item>

        <div class="flex-grow" />
        <el-menu-item index="/movie">视频</el-menu-item>
        <el-menu-item index="/article">文章</el-menu-item>
        <el-menu-item index="/about">关于</el-menu-item>
        <el-menu-item index="/user">个人</el-menu-item>
    </el-menu>
</template>

<script>
export default {
    data() {
        return {
            searchText: '',
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
</style>
