<?php
/**
 * 用户之窗
 */
class WindowController extends Controller
{
	private $_result=array();
	public function init()
	{
		$this->_result['menu'] = BaseMenu::WindowMenu();

	}
	/**
	 * 政策精选
	 */
	public function actionCwpolicy()
	{

		$this->pageTitle = '政策精选';
		
		$Wctools =isset($_GET['Cwpolicy'])?$_GET['Cwpolicy']:array();
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);
		$this->_result['data'] = Cwpolicy::getArticleList($Wctools);
		
		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('CwpolicyAjax',$this->_result);
		}else{
			$model=new Cwpolicy();
			$model->title = isset($Wctools['title'])?trim($Wctools['title']):'';
			$model->IndustryID = isset($Wctools['IndustryID'])?trim($Wctools['IndustryID']):'';
			
			$this->_result['model'] = $model;
			$this->render('Cwpolicy',$this->_result);

		}
	 }
	 
	 
	 /**
	  * 政策精选详情
	  */
	 public function actionCwpolicyView()
	 {
	 	$this->pageTitle = '政策精选详情';
	 	$id = $this->getParams('id');
	 	$sqlData = Cwpolicy::model()->findByPk($id);
	 	if($sqlData)
	 		$data = $sqlData->attributes;
	 	$this->render('CwpolicyContent',$data);
	 }
	/**
	 * 常用工具
	 */

	 public function actionCWTool()
	{

		$this->pageTitle = '常用工具';
		$Wctools =isset($_GET['Wctools'])?$_GET['Wctools']:array();
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);
		$this->_result['data'] = Wctools::getArticleList($Wctools);
		
		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('CWToolAjax',$this->_result);
		}else{
			$model=new Wctools();
			$model->title = isset($Wctools['title'])?trim($Wctools['title']):'';
			$model->IndustryID = isset($Wctools['IndustryID'])?trim($Wctools['IndustryID']):'';
			$model->score = isset($Wctools['score'])?trim($Wctools['score']):'';
			$this->_result['model'] = $model;
			$this->render('CWTool',$this->_result);

		}
	 }
	 
	 /**
	  * 软件详情
	  */
	 public function actionSoft()
	 {
	 	$this->pageTitle = '软件详情';
	 	$Theory =isset($_GET['Theory'])?$_GET['Theory']:array();
	 	$id = $this->getParams('id');
	 	$sqlData = Wctools::model()->findByPk($id);
	 	if($sqlData)
	 		$data = $sqlData->attributes;
	 	$this->render('sCWToolContent',$data);
	 }

	/**
	 * 电子期刊
	 */

	 public function actionCWjournal()
	{

		$this->pageTitle = '电子期刊';
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
			$model->cid = isset($Theory['cid'])?trim($Theory['cid']):'';
			$model->nid = isset($Theory['nid'])?trim($Theory['nid']):'';
			$model->fxid = isset($Theory['fxid'])?trim($Theory['fxid']):'';
			$model->qid = isset($Theory['qid'])?trim($Theory['qid']):'';
			$model->rid = isset($Theory['rid'])?trim($Theory['rid']):'';
			$model->cwid = isset($Theory['cwid'])?trim($Theory['cwid']):'';
			$model->kid = isset($Theory['kid'])?trim($Theory['kid']):'';
			$model->sid = isset($Theory['sid'])?trim($Theory['sid']):'';
			$model->mname = isset($Theory['mname'])?trim($Theory['mname']):'';
			$this->_result['model'] = $model;
			$this->render('Theory',$this->_result);

		}
	 }
	 /*
	  * 用户体验
	  */
	 public function actionCWExperience()
	 {
	 	$this->render('CWExperience',$this->_result);
	 }
}