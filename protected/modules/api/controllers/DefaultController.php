<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		echo "vaseaaaaaa";
        
        //$this->render('index');
	}
    public function actionTest()
	{
		return "Vasea";
	}
}