<?php

/**
 * This is the model class for table "{{match}}".
 *
 * The followings are the available columns in table '{{match}}':
 * @property integer $id
 * @property string $title
 * @property integer $fid
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $IndustryID
 * @property integer $CompanyID
 * @property integer $zzid
 * @property integer $hxid
 * @property integer $zxid
 * @property string $stopdate
 * @property string $sszb
 * @property string $ssxb
 * @property integer $ssxs
 * @property integer $ctid
 */
class Match extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Match the static model class
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
		return '{{match}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fid, IndustryID, CompanyID, zzid, hxid, zxid, ssxs, ctid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('imgurl, sszb, ssxb', 'length', 'max'=>255),
			array('content, remark, addtime, updtime, stopdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, fid, imgurl, content, remark, addtime, updtime, IndustryID, CompanyID, zzid, hxid, zxid, stopdate, sszb, ssxb, ssxs, ctid', 'safe', 'on'=>'search'),
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
			'title' => '标题',
			'fid' => '',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'IndustryID' => '行业',
			'CompanyID' => 'Company',
			'zzid' => '主旨管理',
			'hxid' => '横向管理',
			'zxid' => '纵向管理',
			'stopdate' => '停止时间',
			'sszb' => '赛事主办',
			'ssxb' => '赛事协办',
			'ssxs' => '赛事形式',
			'ctid' => '城市',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('fid',$this->fid);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('zzid',$this->zzid);
		$criteria->compare('hxid',$this->hxid);
		$criteria->compare('zxid',$this->zxid);
		$criteria->compare('stopdate',$this->stopdate,true);
		$criteria->compare('sszb',$this->sszb,true);
		$criteria->compare('ssxb',$this->ssxb,true);
		$criteria->compare('ssxs',$this->ssxs);
		$criteria->compare('ctid',$this->ctid);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->addtime=$this->updtime=date('Y-m-d H:i:s');
			}else{
				$this->updtime=date('Y-m-d H:i:s');
			}
	
			return true;
		}
		else
			return false;
	}
}