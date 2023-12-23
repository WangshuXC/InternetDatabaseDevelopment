<?php


/**
 * Team: LFZW,NKU
 * Coding by LiangXiaochu 2110951
 * 修改了主页样式
 * 
 * Coding by fangyi 2112106
 * 更新了主页作为后台页面
 */
/** @var yii\web\View $this */

$this->title = 'Yii2后端';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">欢迎管理员！</h1>

        <p class="lead">请选择需要管理的数据库</p>
        <a href="<?= \Yii::$app->urlManager->createUrl(['users/index']) ?>" class="btn btn-primary">users</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['articles/index']) ?>" class="btn btn-primary">articles</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['videos/index']) ?>" class="btn btn-primary">videos</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['videocomments/index']) ?>" class="btn btn-primary">videocomments</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['articlecomments/index']) ?>" class="btn btn-primary">articlecomments</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['videolikes/index']) ?>" class="btn btn-primary">videolikes</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['articlelikes/index']) ?>" class="btn btn-primary">articlelikes</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['clicks/index']) ?>" class="btn btn-primary">clicks</a>
        <a href="<?= \Yii::$app->urlManager->createUrl(['personalinfo/index']) ?>" class="btn btn-primary">personalinfo</a>
    </div>

</div>
