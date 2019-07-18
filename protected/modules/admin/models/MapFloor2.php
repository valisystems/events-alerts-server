<?php

class MapFloor extends CActiveRecord{
    
    public function rules()
	{
		return array(
			// email has to be a valid email address
            //'tooLarge'=>'The file was larger than {size}MB. Please upload a smaller file.', array('{size}' => $this->MaxSize)),
            //array('provisioning_number, notification_number', 'numerical', 'integerOnly'=>true,),
            //array('notification_number, provisioning_number', 'length', 'max'=>12, 'min'=>3),
            array('name_map, description, path_to_img, id_map, id_building', 'safe', 'on'=>'search'),
			// verifyCode needs to be entered correctly
		);
	} 
    
    public function tableName()
    {
        return '{{maps}}';
    } 
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function search(){
        $criteria = new CDbCriteria;
        $criteria->compare('name_map', $this->name_map, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('path_to_img', $this->path_to_img, true);
        $criteria->compare('id_building', $this->id_building);
        //$criteria->with = array('building'=>array('with'=>'name'));
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'name_map ASC',
            ),
            'pagination'=>array(
                'pageSize'=>2,
            ),
        ));
    }
    public function relations(){
        return array(
            'building' => array(self::BELONGS_TO, 'Building', 'id_building')
        );
    }

}
?>