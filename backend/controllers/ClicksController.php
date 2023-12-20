<?php

namespace app\controllers;

use app\models\Clicks;
use app\models\ClicksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClicksController implements the CRUD actions for Clicks model.
 */
class ClicksController extends Controller
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
     * Lists all Clicks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClicksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clicks model.
     * @param int $ClickID Click ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ClickID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ClickID),
        ]);
    }

    /**
     * Creates a new Clicks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Clicks();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ClickID' => $model->ClickID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clicks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ClickID Click ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ClickID)
    {
        $model = $this->findModel($ClickID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ClickID' => $model->ClickID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clicks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ClickID Click ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ClickID)
    {
        $this->findModel($ClickID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clicks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ClickID Click ID
     * @return Clicks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ClickID)
    {
        if (($model = Clicks::findOne(['ClickID' => $ClickID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
