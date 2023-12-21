<?php


/**
 * Team: LFZW,NKU
 * Coding by LiangXiaochu 2110951
 * 创建了这个主要用于根据api来调用不同的函数的控制器，从而读取特定的表来返回不同的值给前端，为其他组员提供模板
 * 增加了用于注册和登录的api
 * 修改了评论查找的api，能够查找特定视频的评论
 * 修改了视频查找的api，能够根据VideoID获取视频信息
 * 
 * Coding by FangYi 2112106
 * 增加了视频和评论的api及查找函数actionGetvideo和actionGetcomment
 * 修改了视频和评论的查找api，增加了查询页数
 * 增加了点击量的api
 * 增加了管理员登录的api
 * 更新了管理员登录的api
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Users;
use app\models\Articles;
use app\models\Videos;
use app\models\Comments;
use app\models\Admins;
use app\models\Clicks;


class ApiController extends Controller
{
    public function actionLogin()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        $username = \Yii::$app->request->get('username');
        $password = \Yii::$app->request->get('password');
    
        if ($username !== null && $password !== null) {
            // 查询数据库检查用户名和密码是否匹配
            $user = Users::find()
                ->where(['Username' => $username])
                ->one();
    
            if ($user !== null && ($password == $user->Password)) {
                // 用户名和密码匹配
                return ['status' => 1];
            } else {
                // 用户名和密码不匹配
                return ['status' => 0];
            }
        }
    }
    public function actionSignup()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $username = \Yii::$app->request->get('username');
        $password = \Yii::$app->request->get('password');

        // 查询数据库中最大的 UserID
        $maxUserID = Users::find()
            ->select('MAX(UserID)')
            ->scalar(); // 获取最大的 UserID 值

        $newUserID = $maxUserID + 1;

        $existingUser = Users::find()
            ->where(['Username' => $username])
            ->one();

        if ($existingUser !== null) {
            return ['status' => 0, 'message' => '用户已存在'];
        } else {
            $user = new Users();
            $user->UserID = $newUserID; // 设置新用户的 UserID
            $user->Username = $username;
            // 在存储密码之前，应该对密码进行哈希处理,但是暂时忽略
            $user->Password = $password;

            if ($user->save()) {
                return ['status' => 1, 'message' => '注册成功'];
            } else {
                return ['status' => -1, 'message' => '保存失败'];
            }
        }
    }
    public function actionAdminlogin()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        $username = \Yii::$app->request->get('username');
        $password = \Yii::$app->request->get('password');
    
        if ($username !== null && $password !== null) {
            // 查询数据库检查用户名和密码是否匹配
            $user = Users::find()
                ->where(['Username' => $username])
                ->one();
    
            if ($user !== null && ($password == $user->Password)) {
                // 用户名和密码匹配
                // 检查用户是否为管理员
                $admin = Admins::find()
                    ->where(['UserID' => $user->UserID])
                    ->one();
                if($admin !== null){
                    return ['status' => 1];
                }else{
                    return ['status' => 0];
                }
            } else {
                // 用户名和密码不匹配
                return ['status' => 0];
            }
        }
    }


    public function actionGetarticle()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 获取页数
        $page = \Yii::$app->request->get('page');
        $intpage = (int)$page;

        // 查询数据库获取对应页数的文章信息
        $articles = Articles::find()->select(['ArticleID', 'Title', 'Content', 'PublicationDate	'])->offset(15*($intpage-1))->limit(15)->all();

        // 格式化为 JSON 并返回
        return $articles;
    }
    public function actionGetvideo()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 获取页数
        $page = \Yii::$app->request->get('page');
        $intpage = (int)$page;
        $id = \Yii::$app->request->get('id');

        if ($id !== null) {
            // 如果有 id 参数，则查询指定 VideoID 的视频信息
            $videos = Videos::find()->select(['VideoID', 'Title', 'Description', 'PictureURL', 'UploadDate', 'VideoURL'])->where(['VideoID' => $id])->one();
        } else {
            // 否则按照原来的逻辑查询分页数据
            $videos = Videos::find()->select(['VideoID', 'Title', 'Description', 'PictureURL', 'UploadDate', 'VideoURL'])->offset(18 * ($intpage - 1))->limit(18)->all();
        }

        // 格式化为 JSON 并返回
        return $videos;
    }
    public function actionGetcomment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $vid = \Yii::$app->request->get('vid');
        if ($vid !== null) {
            // 如果有 vid 参数，则查询指定 VideoID 的视频信息
            $comments = Comments::find()->select(['CommentID', 'UserID', 'VideoID', 'Comment', 'CommentDate'])->where(['VideoID' => $vid])->all();
        } else {
            // 否则按照原来的逻辑查询分页数据
            $comments = Comments::find()->select(['CommentID', 'UserID', 'VideoID', 'Comment', 'CommentDate'])->all();
        }

        // 格式化为 JSON 并返回
        return $comments;
    }
    public function actionGetclick()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 查询数据库获取点击量信息
        $clicks = Clicks::find()->select(['ClickID', 'ContentID', 'ContentType', 'ClickCount'])->all();

        // 格式化为 JSON 并返回
        return $clicks;
    }
}
