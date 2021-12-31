<?php

namespace app\controllers;

use Yii;
use app\models\Languages;
use app\models\LanguagesSearch;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use app\models\LoginForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveProvider;
use app\Controllers\Post;
use yii\web\UploadedFile;
use yii\models\User;
use yii\helpers\Url;
/**
 * LangController implements the CRUD actions for Languages model.
 */
class LangController extends Controller
{ public function getImageurl(){
    return $model->image_path;
}
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
     * Lists all Languages models.
     * @return mixed
     */
    public function actionIndex()
    {
    
        $searchModel = new LanguagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

             
        ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays a single Languages model.
     * @param int $id ID
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
     * Creates a new Languages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Languages();

        if ($model->load(Yii::$app->request->Post())) {
            $model->save();
            $imageId = $model->id;
            $image= UploadedFile::getInstance($model, 'image_path');
            $imageName = 'img_' . $image->baseName . '.' . $image->getExtension();
            $image->saveAs(Yii::getAlias('@imgpath'). '/' . $imageName );
            $model->image_path = $imageName;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
            }
        else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Languages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Languages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionUpload($id)
    {
        return $this->render('upload', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Finds the Languages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Languages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Languages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
