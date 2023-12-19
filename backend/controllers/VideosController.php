<?php

namespace app\controllers;

use app\models\Videos;
use app\models\VideosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideosController implements the CRUD actions for Videos model.
 */
class VideosController extends Controller
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
     * Lists all Videos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VideosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Videos model.
     * @param int $VideoID Video ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($VideoID)
    {
        return $this->render('view', [
            'model' => $this->findModel($VideoID),
        ]);
    }

    /**
     * Creates a new Videos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Videos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'VideoID' => $model->VideoID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Videos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $VideoID Video ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($VideoID)
    {
        $model = $this->findModel($VideoID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'VideoID' => $model->VideoID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Videos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $VideoID Video ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($VideoID)
    {
        $this->findModel($VideoID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Videos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $VideoID Video ID
     * @return Videos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($VideoID)
    {
        if (($model = Videos::findOne(['VideoID' => $VideoID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
