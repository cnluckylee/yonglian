<?php

/**
 * This is the model class for table "{{scroll_news}}".
 *
 * The followings are the available columns in table '{{scroll_news}}':
 * @property integer $id
 * @property string $title
 * @property integer $cid
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property string $miniContent
 * @property integer $IndustryID
 * @property integer $CompanyID
 * @property integer $aid
 * @property string $aname
 * @property string $url
 */
class ScrollNews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ScrollNews the static model class
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
		return '{{scroll_news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid, IndustryID, CompanyID, aid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('imgurl, miniContent, aname, url', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, cid, imgurl, content, remark, addtime, updtime, miniContent, IndustryID, CompanyID, aid, aname, url', 'safe', 'on'=>'search'),
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
			'title' => '标题',
			'cid' => '新闻位置',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => '添加日期',
			'updtime' => '修改日期',
			'miniContent' => 'Mini Content',
			'IndustryID' => '行业',
			'CompanyID' => '公司',
			'aid' => '地区',
			'aname' => '地区',
			'url'=>"跳转链接"
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
		$criteria->compare('cid',$this->cid);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('miniContent',$this->miniContent,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('aid',$this->aid);
		$criteria->compare('aname',$this->aname,true);
		$criteria->compare('url',$this->url,true);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        /**
         * 获取滚动新闻内容
         * @return boolean
         */
        
        public static function getScrollnewsbyCid($cid,$limit=5)
        {
            $criteria = new CDbCriteria();
            $criteria->select = 'title';
            $criteria->addCondition('cid='.$cid);
            $criteria->limit = $limit;
            $criteria->order = 'updtime desc';
            $data = self::model()->findAll($criteria);
            $result = array();
            foreach($data as $i)
            {
                    $arr = $i->attributes;
                    $result['newslist'][] = $arr['title'];
            }
            return $result;
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
				
			// 			if($this->aid>0)
				// 			{
				// 				$area = new Area();
				// 				$this->aname = $area->findByAid($this->aid);
				// 			}
					
				return true;
				}
				else
					return false;
		}
}