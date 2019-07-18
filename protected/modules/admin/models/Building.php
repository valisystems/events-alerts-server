<?php

class Building extends CActiveRecord{
    
    public function rules()
	{
		return array(
			// email has to be a valid email address
            //'tooLarge'=>'The file was larger than {size}MB. Please upload a smaller file.', array('{size}' => $this->MaxSize)),
            //array('provisioning_number, notification_number', 'numerical', 'integerOnly'=>true,),
            //array('notification_number, provisioning_number', 'length', 'max'=>12, 'min'=>3),
            array('name, address, id_building', 'safe', 'on'=>'search'),
			// verifyCode needs to be entered correctly
		);
	} 
    
    public function tableName()
    {
        return '{{buildings}}';
    } 
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function search(){
        return new CActiveDataProvider($this, array(
            'sort'=>array(
                'defaultOrder'=>'name ASC',
            ),
        ));
    }
    public function relations(){
        return array(
            'floor' => array(self::HAS_MANY, 'MapFloor', 'id_building')
        );
    }
    
    public function getBuildingName(){
        return $this->name;
    }
}
?>