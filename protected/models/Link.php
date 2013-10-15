<?php

/**
 * This is the model class for table "{{link}}".
 *
 * The followings are the available columns in table '{{link}}':
 * @property integer $id
 * @property string $webname
 * @property string $weburl
 * @property string $weblogo
 * @property integer $link_type
 * @property string $info
 * @property string $contact
 * @property integer $orderno
 * @property integer $com_ok
 * @property integer $show_ok
 * @property string $addtime
 * @property string $lang
 * @property string $ip
 */
class link extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return link the static model class
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
		return '{{link}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('link_type, orderno, com_ok, show_ok', 'numerical', 'integerOnly'=>true),
			array('webname, weburl, weblogo, info, contact, ip', 'length', 'max'=>255),
			array('lang', 'length', 'max'=>50),
			array('addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, webname, weburl, weblogo, link_type, info, contact, orderno, com_ok, show_ok, addtime, lang, ip', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'webname' => 'Webname',
			'weburl' => 'Weburl',
			'weblogo' => 'Weblogo',
			'link_type' => 'Link Type',
			'info' => 'Info',
			'contact' => 'Contact',
			'orderno' => 'Orderno',
			'com_ok' => 'Com Ok',
			'show_ok' => 'Show Ok',
			'addtime' => 'Addtime',
			'lang' => 'Lang',
			'ip' => 'Ip',
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
		$criteria->compare('webname',$this->webname,true);
		$criteria->compare('weburl',$this->weburl,true);
		$criteria->compare('weblogo',$this->weblogo,true);
		$criteria->compare('link_type',$this->link_type);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('orderno',$this->orderno);
		$criteria->compare('com_ok',$this->com_ok);
		$criteria->compare('show_ok',$this->show_ok);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}