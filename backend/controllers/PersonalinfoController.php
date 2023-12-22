<?php

namespace app\controllers;

use app\models\Personalinfo;
use app\models\PersonalinfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonalinfoController implements the CRUD actions for Personalinfo model.
 */
class PersonalinfoController extends Controller
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
     * Lists all Personalinfo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PersonalinfoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personalinfo model.
     * @param string $Name Name
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Name)
    {
        return $this->render('view', [
            'model' => $this->findModel($Name),
        ]);
    }

    /**
     * Creates a new Personalinfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Personalinfo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Name' => $model->Name]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Personalinfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Name Name
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Name)
    {
        $model = $this->findModel($Name);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Name' => $model->Name]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Personalinfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Name Name
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Name)
    {
        $this->findModel($Name)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personalinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Name Name
     * @return Personalinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Name)
    {
        if (($model = Personalinfo::findOne(['Name' => $Name])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
