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
	public function actionTheory()
	{

		$this->pageTitle = '政策精选';
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
