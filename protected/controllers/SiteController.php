<?php

class SiteController extends Controller
{

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
//			$cs = Yii::app()->clientScript;
//			Yii::app()->clientScript->registerPackage('jquery');
//			//Yii::app()->clientScript->registerPackage('jquery.ui');
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery-migrate-1.2.1.min.js', CClientScript::POS_HEAD);
//			//$cs->registerCoreScript('jquery.datetimepicker');
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/bootstrap.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.ui.touch-punch.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.iframe-transport.js', CClientScript::POS_HEAD);
//			// Theme Script
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/custom.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/core.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.autosize.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/jquery.datetimepicker.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/moment.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/assets/js/pages/systemnotification.js', CClientScript::POS_HEAD);
//
//
//			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/assets/css/style.css");
//			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/assets/css/retina.min.css");
//			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/assets/css/bootstrap-toggle.min.css");
//			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/css/mialert.css");
//			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/assets/css/print.css");
//			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/assets/css/bootstrap.min.css");
//			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl."/assets/css/jquery-ui-1.10.3.custom.css");


			// this method is called when the module is being created
			// you may place code here to customize the module or the application

			// import the module-level models and components
			Yii::app()->setComponents(array(
					'errorHandler'=>array(
						'errorAction'=>'admin/default/error',
					)
				)
			);
			return true;
		}
		else
			return false;
	}


	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

//	protected function afterAction($action)
//	{
//		Yii::app()->user->verifyLicenseOnSession();
//	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if (!Yii::app()->user->licenseVerification()) {
			$this->redirect('/site/activate');
		}
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		if (!Yii::app()->user->licenseVerification()) {
			$this->redirect('/site/activate');
		}
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (!Yii::app()->user->licenseVerification()) {
			$this->redirect('/site/activate');
		}
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
        //print_r($_POST);
        //echo Yii::app()->user->returnUrl;die();
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {

            	//$this->redirect(Yii::app()->user->returnUrl);
                if (Yii::app()->user->role == 'administrator' || Yii::app()->user->role == 'moderator') {
                //echo "aici";exit;
                    $settingsModel = Settings::model()->find();
                    if (count($settingsModel)) {
                        Yii::app()->session['siteInfo'] = array(
                            "site_name" => $settingsModel->site_name,
                            "site_email" => $settingsModel->site_email,
                            "logo_path" => $settingsModel->logo_path,
                            "header" => $settingsModel->header,
                            "footer" => $settingsModel->footer,
                            "default_lang" => $settingsModel->default_lang,
                            "tts_voice" => $settingsModel->tts_voice,
                            "provisioning_number" => $settingsModel->provisioning_number,
                            "notification_number" => $settingsModel->notification_number,
                            "extension_limit_number" => $settingsModel->extension_limit_number,
                            "sms_url" => $settingsModel->sms_url,
							"update_ems_server" => $settingsModel->update_ems_server,
							"update_ems_key" => $settingsModel->update_ems_key
                        );
                    } else {
                        Yii::app()->session['siteInfo'] = array(
                            "site_name" => "miALERT",
                            "site_email" => "",
                            "logo_path" => "",
                            "header" => "",
                            "footer" => "",
                            "default_lang" => "en",
                            "tts_voice" => "",
                            "provisioning_number" => "",
                            "notification_number" => "",
                            "extension_limit_number" => "",
                            "sms_url" => "",
                        );
                    }
                    //print_r(Yii::app()->session['siteInfo']);exit;

                    $this->redirect('/admin');
                }
                else
                    $this->redirect('/site');
             
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
    
    public function actionDecontrol()
    {
         $this->render('decontrol');   
    }

	public function actionActivate(){
		$model = new Settings;
		if (isset($_POST['Settings'])) {
			$model->attributes = $_POST['Settings'];
			
			$valid = $model->validate();
			if ($valid){
				$id_settings = $model->id_settings;
				if ($id_settings > 0) $model->isNewRecord = false;
				if (empty($id_settings)) {
					$model->id_settings = 1;
					if ($model->save()) {
						Yii::app()->user->setFlash('success', Yii::t('site/activate', 'Added Successfuly'));
					} else {
						Yii::app()->user->setFlash('error', Yii::t('site/activate', 'Added Failury'));
					}
				} else {
					$criteria = new CDbCriteria;
					$criteria->limit = "1";
					$criteria->order = "id_settings ASC";
					$criteria->condition = "id_settings=:id_settings";
					$criteria->params = array(":id_settings"=>$id_settings);

					$model = Settings::model()->find($criteria);
					$model->activation_key = $_POST['Settings']['activation_key'];
					$model->secret_key = $_POST['Settings']['secret_key'];
					if ($model->save()) {
						Yii::app()->user->setFlash('success', Yii::t('site/activate', 'Updated Successfuly'));
					} else {
						Yii::app()->user->setFlash('error', Yii::t('site/activate', 'Updated Failury'));
					}
				}
			}
		}
		if (Yii::app()->user->licenseVerification()) {
			$this->redirect('/site/login');
		}


		$criteria = new CDbCriteria;
		$criteria->limit = "1";
		$criteria->order = "id_settings ASC";

		$model = Settings::model()->find($criteria);
		if (empty($model->id_settings))
			$model = new Settings;

		$this->render('activate',array('model'=>$model));

	}
    
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}