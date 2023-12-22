<?php


/**
 * Team: LFZW,NKU
 * Coding by LiangXiaochu 2110951
 * 创建了这个主要用于根据api来调用不同的函数的控制器，从而读取特定的表来返回不同的值给前端，为其他组员提供模板
 * 增加了用于注册和登录的api
 * 修改了评论查找的api，能够查找特定视频的评论，以及能够查找特定用户的评论
 * 修改了视频查找的api，能够根据VideoID获取视频信息
 * 
 * Coding by FangYi 2112106
 * 增加了视频和评论的api及查找函数actionGetvideo和actionGetcomment
 * 修改了视频和评论的查找api，增加了查询页数
 * 增加了点击量的api
 * 增加了管理员登录的api
 * 更新了管理员登录的api
 * 增加了发布评论的api
 * 增加了点击量增加的api
 * 增加了获取个人信息的api和增加浏览量的api
 * 增加了获取视频和文章页面总数的api
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Users;
use app\models\Articles;
use app\models\Videos;
use app\models\Videocomments;
use app\models\Articlecomments;
use app\models\Admins;
use app\models\Clicks;
use app\models\Personalinfo;
use app\models\Webviews;


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
                    ->where(['Username' => $user->username])
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
        $articles = Articles::find()->select(['ArticleID', 'Title', 'Content', 'PublicationDate'])->offset(15*($intpage-1))->limit(15)->all();

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
    public function actionGetvideocomment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $vid = \Yii::$app->request->get('vid');
        $username = \Yii::$app->request->get('username');
        
        if ($username !== null) {
            // 如果有 username 参数，则查询指定 Username 的评论信息
            $comments = Videocomments::find()
                ->select(['CommentID', 'VideoID', 'Comment', 'CommentDate', 'Username'])
                ->where(['Username' => $username])
                ->all();
        } elseif ($vid !== null) {
            // 如果有 vid 参数，则查询指定 VideoID 的评论信息
            $comments = Videocomments::find()
                ->select(['CommentID', 'VideoID', 'Comment', 'CommentDate', 'Username'])
                ->where(['VideoID' => $vid])
                ->all();
        } else {
            // 否则按照原来的逻辑查询分页数据
            $comments = Videocomments::find()
                ->select(['CommentID', 'VideoID', 'Comment', 'CommentDate', 'Username'])
                ->all();
        }

        // 格式化为 JSON 并返回
        return $comments;
    }
    public function actionGetarticlecomment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $vid = \Yii::$app->request->get('vid');
        $username = \Yii::$app->request->get('username');
        
        if ($username !== null) {
            // 如果有 username 参数，则查询指定 Username 的评论信息
            $comments = Articlecomments::find()
                ->select(['CommentID', 'ArticleID', 'Comment', 'CommentDate', 'Username'])
                ->where(['Username' => $username])
                ->all();
        } elseif ($vid !== null) {
            // 如果有 vid 参数，则查询指定 ArticleID 的评论信息
            $comments = Videocomments::find()
                ->select(['CommentID', 'ArticleID', 'Comment', 'CommentDate', 'Username'])
                ->where(['ArticleID' => $vid])
                ->all();
        } else {
            // 否则按照原来的逻辑查询分页数据
            $comments = Videocomments::find()
                ->select(['CommentID', 'ArticleID', 'Comment', 'CommentDate', 'Username'])
                ->all();
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

    public function actionAddvideocomment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $username = \Yii::$app->request->get('username');
        $comment = \Yii::$app->request->get('comment');
        $videoID = \Yii::$app->request->get('videoID');

        $comments = new Videocomments();
        $comments->Username = $username;
        $comments->Comment = $comment;
        $comments->VideoID = $videoID;

        if ($comments->save()) {
            return ['status' => 1, 'message' => '发布评论成功'];
        } else {
            return ['status' => -1, 'message' => '发布评论失败'];
        }
    }

    public function actionAddarticlecomment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $username = \Yii::$app->request->get('username');
        $comment = \Yii::$app->request->get('comment');
        $articleID = \Yii::$app->request->get('articleID');

        $comments = new Articlecomments();
        $comments->Username = $username;
        $comments->Comment = $comment;
        $comments->ArticleID = $articleID;

        if ($comments->save()) {
            return ['status' => 1, 'message' => '发布评论成功'];
        } else {
            return ['status' => -1, 'message' => '发布评论失败'];
        }
    }

    public function actionAddclick()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $contenttype = \Yii::$app->request->get('contenttype');
        $contentID = \Yii::$app->request->get('contentID');

        $click = Clicks::find()
                ->where(['ContentType' => $contenttype])
                ->andWhere(['ContentID' => $contentID])
                ->one();

        $click->ClickCount = $click->ClickCount + 1;

        if ($click->save()) {
            return ['status' => 1, 'message' => '点击量增加成功'];
        } else {
            return ['status' => -1, 'message' => '点击量增加失败'];
        }
    }

    public function actionGetpersonalinfo()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 查询数据库获取个人信息信息
        $clicks = Clicks::find()->select(['Name', 'AvatarURL', 'Email', 'GitHubAccount', 'WeChatID'])->all();

        // 格式化为 JSON 并返回
        return $clicks;
    }

    public function actionAddwebviews()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $webviews = Webviews::find()->one();
        $webviews->Views = $webviews->Views + 1;

        if ($webviews->save()) {
            return ['status' => 1, 'message' => '浏览量增加成功'];
        } else {
            return ['status' => -1, 'message' => '浏览量增加失败'];
        }
    }

    public function actionGetvideopagecount()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $count = Videos::find()->count();
        $pagecount = intval($count / 18);

        if($count % 18 !== 0){
            $pagecount = $pagecount + 1;
        }
        return $pagecount;
    }
    public function actionGetarticlepagecount()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $count = Articles::find()->count();
        $pagecount = intval($count / 18);

        if($count % 18 !== 0){
            $pagecount = $pagecount + 1;
        }
        return $pagecount;
    }
}
