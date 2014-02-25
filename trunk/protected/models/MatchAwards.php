<?php

/**
 * This is the model class for table "{{match_awards}}".
 *
 * The followings are the available columns in table '{{match_awards}}':
 * @property integer $id
 * @property string $title
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $ctid
 * @property string $Prize
 * @property string $Prize2
 * @property string $Prize3
 * @property string $PostName
 * @property string $Post
 * @property string $Post2Name
 * @property string $Post2
 * @property string $Post3Name
 * @property string $Post3
 * @property string $pdf
 * @property integer $aid
 * @property string $aname
 * @property string $aid2
 * @property string $aname2
 */
class MatchAwards extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatchAwards the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{match_awards}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			
			array('Prize, Prize2, Prize3, PostName, Post, Post2Name, Post2, Post3Name, Post3, pdf, aname, aid2, aname2', 'length', 'max'=>255),
			array('addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('addtime, updtime, Prize, Prize2, Prize3, PostName, Post, Post2Name, Post2, Post3Name, Post3', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '序号',
			
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			
			'Prize'=>'一等奖',
			'Prize2'=>'二等奖',
			'Prize3'=>'三等奖',
			'PostName'=>'岗位一名称',
			'Post'=>'岗位一获奖人员',
			'Post2Name'=>'岗位二名称',
			'Post2'=>'岗位二获奖人员',
			'Post3Name'=>'岗位三名称',
			'Post3'=>'岗位三获奖人员',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('Prize',$this->Prize,true);
		$criteria->compare('Prize2',$this->Prize2,true);
		$criteria->compare('Prize3',$this->Prize3,true);
		$criteria->compare('PostName',$this->PostName,true);
		$criteria->compare('Post',$this->Post,true);
		$criteria->compare('Post2Name',$this->Post2Name,true);
		$criteria->compare('Post2',$this->Post2,true);
		$criteria->compare('Post3Name',$this->Post3Name,true);
		$criteria->compare('Post3',$this->Post3,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function Awards()
	{
		$data = self::model()->findByPk(1);
		$data = $data->attributes;
		return $data;
	} 
}