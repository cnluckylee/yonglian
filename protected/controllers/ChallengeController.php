<?php
/**
 * 擂台
 */
class ChallengeController extends Controller
{
	protected $menus;
	private $_result=array();
	
	public function init()
	{
		$menus = QtMenu::getQtMenuList(4);
		$this->menus = $menus[4];
		
	}
	/**
	 * 报名
	 */
	public function actionCRApply()
	{
		$this->pageTitle ="赛事报名";
		$data = array();
		$data['match'] = Match::getCRApply();
		

		$this->render('sCRApply',$data);
	}
	/**
	 * 赛事查询
	 */
	public function actionCRInquire()
	{
		
		
		$this->pageTitle = '赛事查询';
		$Theory =isset($_GET['Match'])?$_GET['Match']:array();

		$this->_result['data'] = Match::getDataList($Theory);
		$this->_result['recColumn'] = AdminColumn::getColumnByCid(1);
		$this->_result['menu'] = $this->menus;
		if(isset($_GET['_']) && $_GET['_']>0)
		{
		
			$this->layout = false;
			$this->render('CRInquireAjax',$this->_result);
		}else{
			$model=new Match();
			$model->title = isset($Theory['title'])?trim($Theory['title']):'';
			$model->zzid = isset($Theory['zzid'])?intval($Theory['zzid']):'';
			$model->IndustryID = isset($Theory['IndustryID'])?intval($Theory['IndustryID']):'';
			$model->hxid = isset($Theory['hxid'])?intval($Theory['hxid']):'';
			
			$model->zxid = isset($Theory['zxid'])?intval($Theory['zxid']):'';
			$model->fid = isset($Theory['fid'])?intval($Theory['fid']):'';
			$model->stopdate = isset($Theory['stopdate'])?htmlentities($Theory['stopdate']):'';
			$model->ssxs = isset($Theory['ssxs'])?intval($Theory['ssxs']):'';

			
			
			$this->_result['model'] = $model;
			$this->_result['menu'] = $this->menus;
			$this->render('CRInquire',$this->_result);
		
		}
		
		
	}
	/**
	 * 赛事详情
	 */
	public function actionView()
	{
		$this->pageTitle ="赛事详情";
		$id = Tools::getParam("id");
		$data = array();
		$data['data']=Match::MatchDetail($id);
		$data['MatchAwards'] = MatchAwards::Awards();
		$data['MatchEntries'] = MatchEntries::getListByMid($id);
		$data['MatchEntriesMenu'] = MatchEntries::getRecommendList($id);
		$this->render('CRCompetition',$data);
	}
}
