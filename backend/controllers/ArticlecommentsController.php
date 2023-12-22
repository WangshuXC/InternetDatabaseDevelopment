<?php

namespace app\controllers;

use app\models\Articlecomments;
use app\models\ArticlecommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticlecommentsController implements the CRUD actions for Articlecomments model.
 */
class ArticlecommentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Articlecomments models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArticlecommentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articlecomments model.
     * @param int $CommentID Comment ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CommentID)
    {
        return $this->render('view', [
            'model' => $this->findModel($CommentID),
        ]);
    }

    /**
     * Creates a new Articlecomments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Articlecomments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'CommentID' => $model->CommentID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articlecomments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $CommentID Comment ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CommentID)
    {
        $model = $this->findModel($CommentID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CommentID' => $model->CommentID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articlecomments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $CommentID Comment ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CommentID)
    {
        $this->findModel($CommentID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articlecomments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $CommentID Comment ID
     * @return Articlecomments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CommentID)
    {
        if (($model = Articlecomments::findOne(['CommentID' => $CommentID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
