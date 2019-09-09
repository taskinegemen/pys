<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Annotator;

use yii\helpers\Json;
class AnnotationController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
                    //'logout' => ['post'],
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
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

public function actionSearch()
{
    //echo Yii::$app->request->post('page_id');
     $this->layout = false;
    $annotations = Annotator::find()->where(['annotator_page_id'=>Yii::$app->request->get('page_id')])->asArray()->all();
    $array_annotators= array();
    foreach ($annotations as $annotation) {
    array_push($array_annotators,json_decode($annotation['annotator_body']));
    }
    Yii::$app->response->data =json_encode([
                        'total' => count($annotations), 
                        'rows' => $array_annotators

                        //array(
                        //                json_decode($annotations[0]['annotator_body'])
                        //               )
                    ]
                    );

}
public function actionUpdate()
{
    $this->layout = false;
    $request=Yii::$app->request;
    $annotator_item_id=$request->get('id');
    $new_annotator = Annotator::findOne($annotator_item_id);


    $rawpostPayload=Yii::$app->getRequest()->getRawBody();
    $postPayload=json_decode($rawpostPayload);

    $new_annotator->annotator_body=$postPayload;
    $new_annotator->update();
    Yii::$app->response->data =json_encode(['status' => 'success']);

}
public function actionDelete()
{
    $this->layout = false;
    $request=Yii::$app->request;
    $annotator_item_id=$request->get('id');
    $new_annotator = Annotator::findOne($annotator_item_id);
    $new_annotator->delete();
    Yii::$app->response->data =json_encode(['status' => 'success']);

}
    public function actionStore()
    {
        $this->layout = false;
/*
$post=Yii::$app->request->post();
echo print_r($_POST);
$data=json_decode(file_get_contents('php://input'),1);
print_r($data);
*/
    $rawpostPayload=Yii::$app->getRequest()->getRawBody();
    $postPayload=json_decode($rawpostPayload);
    $annotator= new Annotator();
    $annotator->annotator_page_id=$postPayload->page_id;
    $annotator->annotator_body=$postPayload;
    $annotator->annotator_user_user_id=Yii::$app->user->identity->user_id;
    if($annotator->save())
    {

    }
    else
    {
        print_r($annotator->getErrors());
    }
        $new_annotator = Annotator::findOne($annotator->annotator_item_id);
        $postPayload->id= $annotator->annotator_item_id;
        $new_annotator->annotator_body=$postPayload;

        if($new_annotator->update())
        {

            //print_r($new_annotator->annotator_body);
            //Yii::$app->end();
        }
        else
        {
            //print_r($new_annotator->getErrors());
            //Yii::$app->end();
        }
        Yii::$app->response->data =json_encode(['status' => 'success', 'id' => $annotator->annotator_item_id]);


    }
    public function actionLogin()
    {
        //echo print_r(Yii::$app->request->post());
         $this->layout = false;

        if (!Yii::$app->user->isGuest) {
            
            $this->redirect(array('site/mytasks'));
            //return $this->goHome();
        }




        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            //$this->redirect(array('site/author'));
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

}
