<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Userproposal;
use app\models\Proposal;
use app\models\Conversationuser;
use app\models\Conversation;

use yii\helpers\Json;
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
            ]
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
    public function actionRegister()
    {
        $this->layout = false;

        return $this->render('register');
    }
    public function beforeAction($action)
    {            
        if ($action->id == 'setconversation' || $action->id == 'unsetconversation') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }
    public function actionSetconversation()
    {

        $this->layout = false;
        if(Yii::$app->request->post('conversation_user_user_id') && Yii::$app->request->post('conversation_user_conversation_id'))
        {
            $conversation_user_user_id=Yii::$app->request->post('conversation_user_user_id');
            $conversation_user_conversation_id=Yii::$app->request->post('conversation_user_conversation_id');
            $conversation_user=new Conversationuser();
            $conversation_user->conversation_user_user_id=$conversation_user_user_id;
            $conversation_user->conversation_user_conversation_id=$conversation_user_conversation_id;
            if($conversation_user->save())
            {
                    Yii::$app->response->data =json_encode([
                        'status' => 1
                    ]);
            }
            else
            {
                     Yii::$app->response->data =json_encode([
                        'status' => 0,
                        'error'=>$conversation_user->getErrors()
                    ]);               
            }

        }
        else
        {
                     Yii::$app->response->data =json_encode([
                        'status' => 0,
                        'error'=>["id"=>Yii::$app->request->post('conversation_user_user_id'),"cid"=>Yii::$app->request->post('conversation_user_conversation_id')]
                    ]);             
        }        
    }
    public function actionUnsetconversation()
    {
        $this->layout = false;
        if(Yii::$app->request->post('conversation_user_user_id') && Yii::$app->request->post('conversation_user_conversation_id'))
        {
            $conversation_user_conversation_id=Yii::$app->request->post('conversation_user_conversation_id');
            $conversation_user_user_id=Yii::$app->request->post('conversation_user_user_id');
            $conversation_user=Conversationuser::find()->where(
                [
                    'conversation_user_conversation_id' => $conversation_user_conversation_id,
                    'conversation_user_user_id' => $conversation_user_user_id
            ])->one();
            if($conversation_user){
            if($conversation_user->delete())
            
                {
                        Yii::$app->response->data =json_encode([
                            'status' => 1
                        ]);
                }
                else
                {
                         Yii::$app->response->data =json_encode([
                            'status' => 0,
                            'error'=>$conversation_user->getErrors()
                        ]);               
                }
            }
            else
            {
                                       Yii::$app->response->data =json_encode([
                            'status' => 0,
                            'error'=>[$conversation_user_user_id,$conversation_user_user_id]
                        ]);  
            }

            //

        }         
    }
    public function actionMytasks()
    {
        $this->layout = false;
        if(Yii::$app->request->post('proposal_id') && Yii::$app->request->post('userproposal_available_time'))
        {
            $proposal_id=Yii::$app->request->post('proposal_id');
            $userproposal_available_time=Yii::$app->request->post('userproposal_available_time');
            $step2Accept=Userproposal::find()->where(
                [
                    'userproposal_proposal_id' => $proposal_id,
                    'userproposal_user_id' => Yii::$app->user->identity->user_id
            ])->one();
            $step2Accept->userproposal_available_time=$userproposal_available_time;
            $step2Accept->userproposal_step="2";
            $step2Accept->userproposal_acceptance_status="Kabul";
            if(!$step2Accept->update())
            {
                print_r($step2Accept->getErrors());
            }
            Yii::$app->response->redirect(['site/mytasks','proposal_id' => $proposal_id]);
        }
        if(Yii::$app->request->post('proposal_id') && Yii::$app->request->post('annotation_step'))
        {
            $proposal_id=Yii::$app->request->post('proposal_id');
            $annotation_step=Yii::$app->request->post('annotation_step');
            if($annotation_step==1)
            {
                $step3Accept=Userproposal::find()->where(
                    [
                        'userproposal_proposal_id' => $proposal_id,
                        'userproposal_user_id' => Yii::$app->user->identity->user_id
                ])->one();
                $step3Accept->userproposal_step="3";
                if(!$step3Accept->update())
                {
                    print_r($step3Accept->getErrors());
                }
            }
            Yii::$app->response->redirect(['site/mytasks','proposal_id' => $proposal_id]);
        }
        if(Yii::$app->request->get('proposal_id'))
        {
            $request=Yii::$app->request;
            $proposal_id=$request->get('proposal_id');
            $selected_proposal=Proposal::find()->where(['proposal_id'=>$proposal_id])->one();
            $userproposal_colors=Userproposal::find()->where(['userproposal_proposal_id' => $selected_proposal->proposal_id])->all();
            $selected_userproposal=Userproposal::find()->where(
                [
                    'userproposal_proposal_id' => $proposal_id,
                    'userproposal_user_id' => Yii::$app->user->identity->user_id
            ])->one();
        //print_r($selected_userproposal);Yii::$app->end();
        }
        else
        {
            $selected_proposal=new Proposal();
            $selected_userproposal=new Userproposal();
            $userproposal_colors=[];
        }
        //echo print_r($selected_proposal);
        $all_proposals=Userproposal::find()->where(['userproposal_user_id' => Yii::$app->user->identity->user_id])->all();
        $proposal_body=$selected_proposal->proposal_body;
        //Yii::$app->end();
        //print_r($all_proposals);Yii::$app->end();
        //print_r(Userproposal::find()->all());Yii::$app->end();
        return $this->render('mytasks',
                [
                    'all_proposals'=>$all_proposals,
                    'selected_proposal'=>$selected_proposal,
                    'proposal_body'=>$proposal_body,
                    'selected_userproposal'=>$selected_userproposal,
                    'userproposal_colors'=>$userproposal_colors
                ]);
    }

    public function actionUserproposalacceptancestatus()
    {
        $this->layout = false;
        $request=Yii::$app->request;
        $userproposal_acceptance_status=$request->get('userproposal_acceptance_status');
        $userproposal_proposal_id=$request->get('userproposal_proposal_id');
        $proposal=Userproposal::find()->where(
                                                [
                                                    'userproposal_user_id' => Yii::$app->user->identity->user_id,
                                                    'userproposal_proposal_id'=>$userproposal_proposal_id,
                                                ])->one();
        //echo print_r($proposal);
        //echo $userproposal_acceptance_status;
        //die();
        if($proposal)
        {
            $proposal->userproposal_acceptance_status=$userproposal_acceptance_status;

            if(!$proposal->save())
            {
                print_r($proposal->getErrors());
                die();
            }
            $this->redirect('mytasks');
        }

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
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */


    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

}