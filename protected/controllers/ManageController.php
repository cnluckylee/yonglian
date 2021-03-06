<?php
/**
 * 管理经典
 */
class ManageController extends Controller
{
	private $_result=array();
	public function init()
	{
		$this->_result['menu'] = BaseMenu::ManageMenu();

	}
	/**
	 * 专家新论
	 */
	public function actionTheory()
	{

		$this->pageTitle = '专家新论';
		$Theory =isset($_GET['Theory'])?$_GET['Theory']:array();

		$this->_result['data'] = Theory::getArticleList($Theory);
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('TheoryAjax',$this->_result);
		}else{
			$model=new Theory;
			$model->title = isset($Theory['title'])?trim($Theory['title']):'';
			$model->CompanyID = isset($Theory['CompanyID'])?trim($Theory['CompanyID']):'';
			$model->zzid = isset($Theory['zzid'])?trim($Theory['zzid']):'';
			$model->hxid = isset($Theory['hxid'])?trim($Theory['hxid']):'';
			$model->zxid = isset($Theory['zxid'])?trim($Theory['zxid']):'';
			$model->title = isset($Theory['title'])?trim($Theory['title']):'';
			$model->mname = isset($Theory['mname'])?trim($Theory['mname']):'';
			
			$model->IndustryID = isset($Theory['IndustryID'])?trim($Theory['IndustryID']):'';
		
			$this->_result['model'] = $model;
			$this->render('Theory',$this->_result);

		}
	 }
	 /**
	  * 专家新论 详情
	  */
	 public function actionTheoryView()
	 {
	 	
	 	$this->pageTitle = '专家新论 详情';
	 	$id = $this->getParams('id');
	 	$sqlData = Theory::model()->findByPk($id);
	 	if($sqlData)
	 		$data = $sqlData->attributes;

	 	$this->render('TheoryView',$data);
	 }
	/**
	 * 管理技术
	 */
	public function actionTechnology()
	{

		$this->pageTitle = '管理技术';
		$reData =isset($_GET['Technology'])?$_GET['Technology']:array();

		$this->_result['data'] = Technology::getArticleList($reData);
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('TechnologyAjax',$this->_result);
		}else{
			$model=new Technology;
			$model->title = isset($reData['title'])?trim($reData['title']):'';
			$model->CompanyID = isset($reData['CompanyID'])?trim($reData['CompanyID']):'';
			$model->zzid = isset($reData['zzid'])?trim($reData['zzid']):'';
			$model->hxid = isset($reData['hxid'])?trim($reData['hxid']):'';
			$model->zxid = isset($reData['zxid'])?trim($reData['zxid']):'';
			$model->title = isset($reData['title'])?trim($reData['title']):'';
			$model->mname = isset($reData['mname'])?trim($reData['mname']):'';
			
			$model->IndustryID = isset($reData['IndustryID'])?trim($reData['IndustryID']):'';
		
			$this->_result['model'] = $model;
			$this->render('Technology',$this->_result);

		}
	 }
	 /**
	  * 管理技术 详情
	  */
	 public function actionTechnologyView()
	 {
	 	 
	 	$this->pageTitle = '管理技术详情';
	 	$id = $this->getParams('id');
	 	$sqlData = Technology::model()->findByPk($id);
	 	if($sqlData)
	 		$data = $sqlData->attributes;
	 
	 	$this->render('TechnologyView',$data);
	 }
	 /**
	 * 管理案例
	 */
	public function actionCase()
	{

		$this->pageTitle = '管理案例';
		$reData =isset($_GET['ManageCase'])?$_GET['ManageCase']:array();

		$this->_result['data'] = ManageCase::getArticleList($reData);
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('ManageCaseAjax',$this->_result);
		}else{
			$model=new ManageCase;
			$model->title = isset($reData['title'])?trim($reData['title']):'';
			$model->CompanyID = isset($reData['CompanyID'])?trim($reData['CompanyID']):'';
			$model->zzid = isset($reData['zzid'])?trim($reData['zzid']):'';
			$model->hxid = isset($reData['hxid'])?trim($reData['hxid']):'';
			$model->zxid = isset($reData['zxid'])?trim($reData['zxid']):'';
			$model->title = isset($reData['title'])?trim($reData['title']):'';
			$model->mname = isset($reData['mname'])?trim($reData['mname']):'';
			
			$model->IndustryID = isset($reData['IndustryID'])?trim($reData['IndustryID']):'';
		
			$this->_result['model'] = $model;
			$this->render('ManageCase',$this->_result);

		}
	 }
	 /**
	  * 管理案例 详情
	  */
	 public function actionManageCaseView()
	 {
	 
	 	$this->pageTitle = '管理案例详情';
	 	$id = $this->getParams('id');
	 	$sqlData = ManageCase::model()->findByPk($id);
	 	if($sqlData)
	 		$data = $sqlData->attributes;
	 
	 	$this->render('ManageCaseView',$data);
	 }
	 /**
	  * 永链观点
	  */
	public function actionViewpoint()
	{

		$this->pageTitle = '永链观点';
		$reData =isset($_GET['ViewPoint'])?$_GET['ViewPoint']:array();

		$this->_result['data'] = ViewPoint::getArticleList($reData);
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('ViewPointAjax',$this->_result);
		}else{
			$model=new ViewPoint;
			$model->title = isset($reData['title'])?trim($reData['title']):'';
			$model->CompanyID = isset($reData['CompanyID'])?trim($reData['CompanyID']):'';
			$model->zzid = isset($reData['zzid'])?trim($reData['zzid']):'';
			$model->hxid = isset($reData['hxid'])?trim($reData['hxid']):'';
			$model->zxid = isset($reData['zxid'])?trim($reData['zxid']):'';
			$model->title = isset($reData['title'])?trim($reData['title']):'';
			$model->mname = isset($reData['mname'])?trim($reData['mname']):'';
			
			$model->IndustryID = isset($reData['IndustryID'])?trim($reData['IndustryID']):'';
		
			$this->_result['model'] = $model;
			$this->render('ViewPoint',$this->_result);

		}
	 }
	 
	 /**
	  * 管理案例 详情
	  */
	 public function actionPointView()
	 {
	 
	 	$this->pageTitle = '永链观点详情';
	 	$id = $this->getParams('id');
	 	$sqlData = ViewPoint::model()->findByPk($id);
	 	if($sqlData)
	 		$data = $sqlData->attributes;
	 
	 	$this->render('PointView',$data);
	 }
}
