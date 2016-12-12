<?php

namespace backend\controllers;

use Yii;
use common\models\Inmueble;
//use common\models\User;
use backend\models\search\InmuebleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InmuebleController implements the CRUD actions for Inmueble model.
 */
class InmuebleController extends Controller
{
    /**
     * @inheritdoc
     */
public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Inmueble models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InmuebleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionMisinmuebles()
    {
        $searchModel = new InmuebleSearch();
//        Yii::$app->request->queryParams->id=Yii::$app->user->id;
        $params=Yii::$app->request->queryParams;
//        $params=array_replace($params, ['idCliente'=>Yii::$app->user->id]);
        $params=array_replace($params, ['id'=>1]);
        $dataProvider = $searchModel->search($params);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inmueble model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Inmueble model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inmueble();
        $model->idCliente=Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image=UploadedFile::getInstances($model, 'image');;
//            $image = UploadedFile::getInstances($model, 'image[]');
            $contImagenes=0;
            foreach ($model->image as $key=>$value) {
              // generate a unique file name to prevent duplicate filenames
              $contImagenes++;
              if($contImagenes==1){
                $ext = end((explode(".", $value->name)));
              
                $model->foto1 = $model->id."_1.{$ext}";
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/imagenes/';
                $path = Yii::$app->params['uploadPath'] . $model->foto1;
                $value->saveAs($path);
                $model->save();
                
             }
              if($contImagenes==2){
                $ext = end((explode(".", $value->name)));
              
                  $model->foto2 = $model->id."_2.{$ext}";
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/imagenes/';
                $path = Yii::$app->params['uploadPath'] . $model->foto2;
                $value->saveAs($path);
                $model->save();
              }
              if($contImagenes==3){
                $ext = end((explode(".", $value->name)));
              
                  $model->foto3 = $model->id."_3.{$ext}";
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/imagenes/';
                $path = Yii::$app->params['uploadPath'] . $model->foto3;
                $value->saveAs($path);
                $model->save();
              }
              // the path to save file, you can set an uploadPath
              // in Yii::$app->params (as used in example below)                       
              
            }
//            if (!is_null($image)) {
//             $ext = end((explode(".", $image->name)));
//              // generate a unique file name to prevent duplicate filenames
//              $model->foto1 = $model->id.".{$ext}";
//              // the path to save file, you can set an uploadPath
//              // in Yii::$app->params (as used in example below)                       
//              Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/imagenes/';
//              $path = Yii::$app->params['uploadPath'] . $model->foto1;
//              $image->saveAs($path);
//              $model->save();
//                
//            }
            return $this->redirect(['view', 'id' => $model->id]);
            
        } 
        else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        
        
            
        
    }

    /**
     * Updates an existing Inmueble model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inmueble model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Inmueble model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inmueble the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inmueble::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
