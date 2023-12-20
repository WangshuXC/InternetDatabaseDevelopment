<?php


/**
 * Team: LFZW,NKU
 * Coding by LiangXiaochu 2110951
 * 这个控制器主要用于根据api来调用不同的函数，从而读取特定的表来返回不同的值给前端
 */

/**
 * Team: LFZW,NKU
 * Coding by fangyi 2112106
 * 增加了视频和评论的api及查找函数actionGetvideo和actionGetcomment
 */


namespace app\controllers;

use yii\web\Controller;
use app\models\Users;
use app\models\Articles;
use app\models\Videos;
use app\models\Comments;

class ApiController extends Controller
{
    public function actionGetuser()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        $userName = \Yii::$app->request->get('username'); // 获取传递的username参数
    
        if ($userName !== null) {
            // 查询数据库获取指定UserID的用户信息
            $user = Users::find()
                ->select(['UserID', 'Username', 'Password'])
                ->where(['Username' => $userName])
                ->one(); // 使用 one() 方法来获取单个用户信息
    
            // 格式化为 JSON 并返回
            return $user;
        } else {
            // 查询数据库获取所有用户信息
            $users = Users::find()
                ->select(['UserID', 'Username', 'Password'])
                ->all();
    
            // 格式化为 JSON 并返回
            return $users;
        }
    }
    public function actionGetarticle()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 查询数据库获取文章信息
        $articles = Articles::find()->select(['ArticleID', 'Title', 'Content'])->all();

        // 格式化为 JSON 并返回
        return $articles;
    }
    public function actionGetvideo()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 查询数据库获取视频信息
        $videos = Videos::find()->select(['VideoID', 'Title', 'Description', 'VideoURL', 'UploadDate'])->all();

        // 格式化为 JSON 并返回
        return $videos;
    }
    public function actionGetcomment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 查询数据库获取视频信息
        $comments = Comments::find()->select(['CommentID', 'UserID', 'VideoID', 'Comment', 'CommentDate'])->all();

        // 格式化为 JSON 并返回
        return $comments;
    }
}
