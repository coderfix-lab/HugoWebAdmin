<?php

namespace app\modules\sys\controllers;

use app\common\controllers\RbacBaseController;
use Yii;
use app\modules\sys\models\SystemMenu;
use app\modules\sys\models\SystemMenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MenuController implements the CRUD actions for SystemMenu model.
 */
class MenuController extends RbacBaseController
{
    /**
     * Lists all SystemMenu models.
     * @return mixed
     */
    public function actionIndex()
    {

        $menuarr = SystemMenu::getDropList();


        return $this->render('index', [
            'dataSet' => $menuarr,
        ]);
    }

    /**
     * Displays a single SystemMenu model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SystemMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SystemMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('excreate', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SystemMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SystemMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SystemMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SystemMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemMenu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionIcon1()
    {
        return $this->renderPartial('icon1');
    }

    public function actionIcon2()
    {
        return $this->renderPartial('icon2');
    }

    public function actionIcon3()
    {
        return $this->renderPartial('icon3');
    }

    public function actionIcon4()
    {
        return $this->renderPartial('icon4');
    }
}
