<?php

namespace app\controllers;

use app\models\Webviews;
use app\models\WebviewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WebviewsController implements the CRUD actions for Webviews model.
 */
class WebviewsController extends Controller
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
     * Lists all Webviews models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WebviewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Webviews model.
     * @param int $Views Views
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Views)
    {
        return $this->render('view', [
            'model' => $this->findModel($Views),
        ]);
    }

    /**
     * Creates a new Webviews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Webviews();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Views' => $model->Views]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Webviews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $Views Views
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Views)
    {
        $model = $this->findModel($Views);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Views' => $model->Views]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Webviews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $Views Views
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Views)
    {
        $this->findModel($Views)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Webviews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $Views Views
     * @return Webviews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Views)
    {
        if (($model = Webviews::findOne(['Views' => $Views])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
