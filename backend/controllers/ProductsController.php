<?php

namespace backend\controllers;

use common\models\ElasticProducts;
use common\models\Image;
use common\models\ImageUpload;
use Yii;
use common\models\Products;
use common\models\SearchProducts;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProducts();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

  public function actionSetImage($id) {
    $model = new ImageUpload();

    if (Yii::$app->request->isPost) {
      $product = $this->findModel($id);
      $file = UploadedFile::getInstance($model, 'image');
      //var_dump($file);die();
      $name = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
      $find = Image::findOne(['image'=>$name]);
      $im = new Image();
//var_dump($product->image);die();
      if ($im->saveImage($model->uploadFile($file, $find), $product->id)) {
        return $this->redirect(['view', 'id' => $product->id]);
      }

    }

    $images = Image::find()->where(['product_id'=>$id])->All();
    return $this->render('image', ['model' => $model, 'product'=>$id, 'images'=>$images]);
  }
public function actionSetDefault($id, $img_id) {
  //if (Yii::$app->request->isPost) {
    $product = Products::findOne(['id'=>$id]);
    $image = Image::findOne(['id'=>$img_id]);
    $product->image = $image->image;
    $product->save();
  //}
  return $this->redirect(['view', 'id' => $id]);
}

}


