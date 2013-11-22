<?php
/**
 * 永链数据
 */
class YlController extends Controller
{
	private $_result=array();
	public function init()
	{
		$this->_result['menu'] = BaseMenu::WindowMenu();

	}
	/**
	 * 政策精选
	 */
	public function actionNews()
	{

		$this->pageTitle = '公司新闻';
		$pageArray = array();
		$pageArray['newslist'] = YlNews::getNewsList();
		$this->render('News',$pageArray);
	 }
	/**
	 * 常用工具
	 */

	 public function actionCWTool()
	{

		$this->pageTitle = '常用工具';
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

}
