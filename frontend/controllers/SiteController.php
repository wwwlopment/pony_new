<?php
namespace frontend\controllers;

use common\models\Categories;
use common\models\Image;
use common\models\Order_descript;
use common\models\Orders;
use common\models\Products;
use common\models\SearchProducts;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\OrderForm;


/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
             //   'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
      $categories = Categories::find()->all();
      $category_id = Yii::$app->request->get('cat');
      if (isset($category_id)) {
       // $category_id = 1;

        $products = Products::find()->where(['category_id'=>$category_id])->orderBy('id');
      }
      else {
        $products = Products::find();
      }
 /*     $params = [
        'match' => [
          'category_id' => $category_id,
        ],
        //'sort' => ['id' => 'asc'],
      ];*/

     // $products = Products::find()->query($params);


      $countQuery = clone $products;

      // paginations - 10 items per page
      $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);

      $pages->pageSizeParam = false;

      $products = $products->offset($pages->offset)
        ->limit($pages->limit)
        ->all();



        return $this->render('index', ['products'=>$products, 'categories'=>$categories, 'pages'=>$pages]);
    }

    public function actionCategory() {
      $category_id = Yii::$app->request->get('cat');
      $category = Categories::findOne(['id'=>$category_id]);
      $products = Products::find()->where(['category_id'=>$category_id])->orderBy('id');
         $countQuery = clone $products;

      // paginations - 10 items per page
      $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);

      $pages->pageSizeParam = false;

      $products = $products->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

      return $this->render('category', ['category' => $category,'products'=>$products, 'pages'=>$pages]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }




  public function actionRmfromcart() {
    $product_id = Yii::$app->request->get('product_id');
    $product = Products::findOne($product_id);
    if (empty($product)) {
      return false;
    }

    $session = Yii::$app->session;
    $session->open();


    if (count($_SESSION['cart'])==0) {
      unset($_SESSION['cart']);
    }else {
      if (isset($_SESSION['cart'][$product_id])) {

        unset($_SESSION['cart'][$product_id]);
        $_SESSION['cart_items'] = $_SESSION['cart_items'] - 1;
      }

    }

  }



   public function actionAddtocart() {
//var_dump(Yii::$app->request->get('product_id')); die();
     $product_id = Yii::$app->request->get('product_id');
     $view_quantity =  Yii::$app->request->get('view_quantity');
     $product = Products::findOne($product_id);
     if (empty($product)) {
       return false;
     }

     $session = Yii::$app->session;
     $session->open();

    $quantity = $view_quantity;
    //echo $quantity;die();
    //if (isset($_SESSION['cart'][$product_id])) {
     // $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    //} else {
      $_SESSION['cart'][$product_id] = [
        'id' => $product->id,
        'quantity' => $quantity,
        'title' => $product->title,
        'price' => $product->price,
        'image' => $product->image,
        'description' => $product->description,
      ];
      $items = count($_SESSION['cart']);
      $_SESSION['cart_items'] = $items;

    //}
  }

public function actionCart() {
     // var_dump(Yii::$app->request->get());die();
  if (!empty($_SESSION['cart'])) {
    $model = new OrderForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {


      if (!empty($_SESSION['cart'])) {
        $sum = 0;
        $order = new Orders();
       //print_r(Yii::$app->request->post());die();
        $order->buyer_name = Yii::$app->request->post('OrderForm')['name'];
        $order->buyer_email = Yii::$app->request->post('OrderForm')['email'];
        $order->buyer_phone = Yii::$app->request->post('OrderForm')['phone'];
        $order->save(false);
        $db_last_id = $order->id;

        foreach ($_SESSION['cart'] as $id => $item) {
          $order_descript = new Order_descript();
          //print_r($order);die();
          $order_descript->order_id = $db_last_id;
          $order_descript->product_id = $item['id'];
          $order_descript->quantity = $item['quantity'];
          $order_descript->price = $item['price'];
          $sum += $item['quantity']*$item['price'];
          $order_descript->save(false);
        }

        $order = Orders::findOne($db_last_id);
        $order->order_amount = $sum;
        $order->save(false);
       // $order_descript->save(false);
      }
      $this->sendEmail(
        Yii::$app->request->post('OrderForm')['email'],
        Yii::$app->request->post('OrderForm')['name'],
        'підтвердження покупки',
        'body'
        );
      unset($_SESSION['cart']);
      unset($_SESSION['cart_items']);

      Yii::$app->session->setFlash('success', "Замовлення успішно створене!");
      return $this->redirect(['/']);
    } else {

      return $this->render('cart', ['model' => $model]);
    }

    }

return $this->render('cart');
  }


  public function actionQuantity() {

    $product_id = Yii::$app->request->get('product_id');
    $quantity = Yii::$app->request->get('quantity');
    $product = Products::findOne($product_id);
    if (empty($product)) {
      return false;
    }

    $session = Yii::$app->session;
    $session->open();

    //$quantity = 1;
    //if (isset($_SESSION['cart'][$product_id])) {
    // $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    //} else {
    $_SESSION['cart'][$product_id] = [
      'id' => $product->id,
      'quantity' => $quantity,
      'title' => $product->title,
      'price' => $product->price,
      'image' => $product->image,
      'description' => $product->description,
    ];
    //$items = count($_SESSION['cart']);
    //$_SESSION['cart_items'] = $items;

    //}
  }

  public function sendEmail($email, $name, $subject, $body)
  {
    return Yii::$app->mailer->compose()
      ->setTo($email)
      ->setFrom([$email => $name])
      ->setSubject($subject)
      ->setTextBody($body)
      ->send();
  }


  public function actionFilter() {
  $from = Yii::$app->request->post('from');
  $to = Yii::$app->request->post('to');
  //$from= 10;
  //$to = 500;
//var_dump(Yii::$app->request->post());die();
  $result = Products::find()->where(['>','price', $from])->andWhere(['<', 'price', $to]);
    $pages = new Pagination([
      'totalCount'=>$result->count(),
      'pageSize'=>10,
      'forcePageParam'=>false,
      'pageSizeParam'=>false
    ]);
    $q ='ціна від '. $from . ' до ' . $to;
    $products = $result->offset($pages->offset)->limit($pages->limit)->all();
    return $this->render('found', compact('products', 'pages', 'q'));

  }

 /* public function actionCart() {
          return $this->render('cart');
  }*/

  public function actionSearch()
  {
  //  var_dump( Yii::$app->request->queryParams['SearchProducts']['title']);die();
    $q = Yii::$app->request->queryParams['SearchProducts']['params'];

    $query = Products::find()->where(['like', 'title', $q ])->orWhere(['like', 'description', $q ]);
    $pages = new Pagination([
      'totalCount'=>$query->count(),
      'pageSize'=>10,
      'forcePageParam'=>false,
      'pageSizeParam'=>false
      ]);
    $products = $query->offset($pages->offset)->limit($pages->limit)->all();
    return $this->render('found', compact('products', 'pages', 'q'));

  }

public function actionView($id) {

  $categories = Categories::find()->all();
$upsell = Products::find()->limit(10)->offset(15)->all();
$hot = Products::find()->limit(5)->offset(25)->all();
$product = Products::findOne(['id'=>$id]);
$images = Image::find()->where(['product_id'=>$id])->all();
return $this->render('view', ['images'=> $images, 'product'=>$product, 'categories'=>$categories, 'upsell'=>$upsell, 'hot'=>$hot]);
    }

}
