<?php
/**
 * 企业全貌
 */
class EnterpriseController extends Controller
{
	protected $menus;
	public function init()
	{
		$menus = QtMenu::getQtMenuList(1);
		$this->menus = $menus[1];
	}
	/**
	 * 企业秀台
	 */
	public function actionCPBooth($page=1)
	{
		$this->pageTitle = '企业秀台';
		//echo $_GET['Company_Industry_id'];exit;
		$Company_city_id = Tools::getParam('Company_city_id');
		$Company_Industry_id = Tools::getParam('Company_Industry_id');
		$Company_city = Tools::getParam('Company_city');
		$Company_Industry = Tools::getParam('Company_Industry');
		$keyword = Tools::getParam('keyword');
		$cid = Tools::getParam('cid');
		$result = Article::enterprise($Company_city_id,$Company_Industry_id,$keyword);
		if(isset($_GET['_']))
		{
			$this->layout = false;
			$this->render('CPBoothAjax',$result);
		}else{
			$result['get'] = array('Company_city_id'=>$Company_city_id,
								   'Company_Industry_id'=>$Company_Industry_id,
								   'Company_city'=>$Company_city,
								   'Company_Industry'=>$Company_Industry,
									'keyword'=>$keyword,
									'cid'=>$cid
					);
			
			$result['menus'] = $this->menus;
			$this->render('CPBooth',$result);
		}
	}
	/**
	 * 团队闪耀
	 */
	public function actionCPTeam()
	{
		$this->pageTitle = '团队闪耀';
		
		$reData =isset($_GET['Member'])?$_GET['Member']:array();
		
		$result = Member::enterprise($reData);
		$result['cat'] = BaseData::CPDevelopCategary();
		
		if(isset($_GET['_']) && $_GET['_']>0)
		{
		
			$this->layout = false;
			$this->render('CPTeamAjax',$result);
		}else{
			$model=new Member();
			$model->aid = isset($reData['aid'])?trim($reData['aid']):'';
			$model->IndustryID = isset($reData['IndustryID'])?trim($reData['IndustryID']):'';
			$model->aname = isset($reData['aname'])?trim($reData['aname']):'';
			$model->IndustryName = isset($reData['IndustryName'])?trim($reData['IndustryName']):'';
			$model->cid = isset($reData['cid'])?trim($reData['cid']):'';
			$model->cname = isset($reData['cname'])?trim($reData['cname']):'';
			$result['model'] = $model;
			$result['menus'] = $this->menus;
			$this->render('CPTeam',$result);
		}
	}
	/**
	 * 携手发展
	 */
	public function actionCPJoint()
	{
		$this->pageTitle = '携手发展';

		$reData =isset($_GET['Joint'])?$_GET['Joint']:array();
		
		$result = Joint::enterprise($reData);
		$result['cat'] = BaseData::CPDevelopCategary();

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('CPJointAjax',$result);
		}else{
			$model=new Joint();
			$model->aid = isset($reData['aid'])?trim($reData['aid']):'';
			$model->IndustryID = isset($reData['IndustryID'])?trim($reData['IndustryID']):'';
			$model->aname = isset($reData['aname'])?trim($reData['aname']):'';
			$model->IndustryName = isset($reData['IndustryName'])?trim($reData['IndustryName']):'';
			$model->cid = isset($reData['cid'])?trim($reData['cid']):'';
			$model->cname = isset($reData['cname'])?trim($reData['cname']):'';
			$result['model'] = $model;
			$this->render('CPJoint',$result);
		}
	}

	/**
	 * 企业动态
	 */
	public function actionCompanyNews()
	{
		$this->pageTitle = '企业动态';
		$Company_city_id = Tools::getParam('Company_city_id');
		$Company_Industry_id = Tools::getParam('Company_Industry_id');
		$Company_city = Tools::getParam('Company_city');
		if(!$Company_city)
			$Company_city_id = '';

		$Company_Industry = Tools::getParam('Company_Industry');
		if(!$Company_Industry)
			$Company_Industry_id = '';
		$keyword = Tools::getParam('keyword');
		$cid = Tools::getParam('cid');
		$result = CompanyNews::enterprise($Company_city_id,$Company_Industry_id,$keyword,$cid);
		$result['cat'] = BaseData::CPDevelopCategary();

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('CompanyNewsAjax',$result);
		}else{

			$result['get'] = array('Company_city_id'=>$Company_city_id,
					'Company_Industry_id'=>$Company_Industry_id,
					'Company_city'=>$Company_city,
					'Company_Industry'=>$Company_Industry,
					'keyword'=>$keyword,
					'cid'=>$cid
			);
			$result['menus'] = $this->menus;
			$this->render('CompanyNews',$result);
		}
	}
	/**
	 * 舵主风采
	 */
	 public function actionMentor()
	 {
		$this->pageTitle = '舵主风采';
		$reData =isset($_GET['Mentor'])?$_GET['Mentor']:array();
		$result = Mentor::enterprise($reData);

		$result['cat'] = BaseData::MentorCategary();

		if(isset($_GET['_']) && $_GET['_']>0)
		{

			$this->layout = false;
			$this->render('MentorAjax',$result);
		}else{

			$model=new Mentor();
			$model->aid = isset($reData['aid'])?trim($reData['aid']):'';
			$model->IndustryID = isset($reData['IndustryID'])?trim($reData['IndustryID']):'';
			$model->aname = isset($reData['aname'])?trim($reData['aname']):'';
			$model->IndustryName = isset($reData['IndustryName'])?trim($reData['IndustryName']):'';
			$model->cid = isset($reData['cid'])?trim($reData['cid']):'';
			$model->cname = isset($reData['cname'])?trim($reData['cname']):'';
			$result['model'] = $model;
			$result['menus'] = $this->menus;
			$this->render('Mentor',$result);
		}
	 }
	/**
	 * 单企业面
	 */
	 public function actionCPSingleEnterprise()
	 {
	 	$result = array();
	 	$mid = Tools::getParam("mid");
	 	if($mid>0)
	 	{
	 		$result['info'][] = CompanyProduct::getListByCid($mid,5);
	 		$result['info'][] = CompanyDongTai::getListByCid($mid,5);
 	 		$result['info'][] = CompanyDuoZhu::getListByCid($mid,5);
  	 		$result['info'][] = CompanyTuanDui::getListByCid($mid,5);
 	 		$result['info'][] = CompanyXieShou::getListByCid($mid,5);
 	 		$cc = Company::model()->findByPk($mid);
 	 		if($cc)
 	 			$result['company'] = $cc->attributes;
	 	}

	 	$this->render('CPSingleEnterprise',$result);
	 }
}
