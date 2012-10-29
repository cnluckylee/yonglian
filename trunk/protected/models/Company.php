<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property string $name
 * @property string $pinyin
 * @property string $summary
 * @property string $desc
 * @property string $addr
 * @property integer $zip
 * @property string $mail
 * @property string $fax
 * @property string $salesline
 * @property string $serviceline
 * @property string $website
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return '{{company}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, zip', 'numerical', 'integerOnly'=>true),
			array('name, pinyin, addr, mail, fax, salesline, serviceline, website', 'length', 'max'=>200),
			array('summary, desc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pinyin, summary, desc, addr, zip, mail, fax, salesline, serviceline, website', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'pinyin' => '拼音',
			'summary' => '摘要',
			'desc' => '描述',
			'addr' => '地址',
			'zip' => '邮编',
			'mail' => '邮件',
			'fax' => '传真',
			'salesline' => '销售热线',
			'serviceline' => '服务热线',
			'website' => '网址',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pinyin',$this->pinyin,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('addr',$this->addr,true);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('salesline',$this->salesline,true);
		$criteria->compare('serviceline',$this->serviceline,true);
		$criteria->compare('website',$this->website,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}