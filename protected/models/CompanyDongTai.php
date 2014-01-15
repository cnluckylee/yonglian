<?php

/**
 * This is the model class for table "{{CompanyDongTai}}".
 *
 * The followings are the available columns in table '{{CompanyDongTai}}':
 * @property integer $id
 * @property string $name
 * @property string $keywords
 * @property string $desc
 * @property string $content
 * @property integer $class1
 * @property integer $order
 * @property string $imgurl
 * @property string $imgurls
 * @property integer $cid
 * @property string $updtime
 * @property string $addtime
 * @property string $pdf
 * @property string $cname
 */
class CompanyDongTai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyDongTai the static model class
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
		return '{{CompanyDongTai}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class1, order, cid', 'numerical', 'integerOnly'=>true),
			array('name, keywords, cname', 'length', 'max'=>200),
			array('imgurl, imgurls, pdf', 'length', 'max'=>255),
			array('desc, content, updtime, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, keywords, desc, content, class1, order, imgurl, imgurls, cid, updtime, addtime, pdf, cname', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'keywords' => 'Keywords',
			'desc' => 'Desc',
			'content' => 'Content',
			'class1' => 'Class1',
			'order' => 'Order',
			'imgurl' => 'Imgurl',
			'imgurls' => 'Imgurls',
			'cid' => 'Cid',
			'updtime' => 'Updtime',
			'addtime' => 'Addtime',
			'pdf' => 'Pdf',
			'cname' => 'Cname',
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
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('class1',$this->class1);
		$criteria->compare('order',$this->order);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('imgurls',$this->imgurls,true);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('cname',$this->cname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}