<?php
if(!$IWEB_IM_IN) {
	die('Hacking attempt');
}

class dbex
{
	var $rowCount;
	var $affectedRows;

	public function getRs($sql) {
		$rs=array();
		$result=mysql_query($sql) or die('false getRs');
		$this->rowCount=mysql_num_rows($result);

		while($rsRow=mysql_fetch_array($result)) {
			$rs[]=$rsRow;
		}
		return $rs;
	}

	public function getRow($sql) {
		$result=mysql_query($sql) or die('false getRow');
		return mysql_fetch_array($result);
	}	

	public function exeUpdate($sql) {
		if(mysql_query($sql)){
			return true;
		} else {
			return false;
		}
	}

	function fetch_page($sql, $pagenum) {
		$page = intval($_GET['page']);

		$query = mysql_query($sql);
		$countnum = mysql_num_rows($query);
		$countpage = ceil($countnum/$pagenum);

		if($page<1) { $page=1; }
		if($page>$countpage) { $page=$countpage; }
		
		$limitstart = ($page-1)*$pagenum;
		
		/* 获取数据结果集 */
		for($i=0; $i<($limitstart+$pagenum); $i++) {
			if($i>=$countnum) { break; }
			if($i>=$limitstart) {
				$result[] = mysql_fetch_array($query);
			} else {
				mysql_fetch_array($query);
			}
		}
		//$sql = $sql." limit $limitstart,$pagenum";
		//$result = $this->fetch_All($sql);

		/* 生成url */
		$url = $_SERVER['QUERY_STRING'];
		$url = preg_replace("/&?page=[0-9]+/i","",$url);

		$array['countnum'] = $countnum;
		$array['countpage'] = $countpage;
		$array['result'] = $result;
		$array['page'] = $page;
		if($page>1) {
			$array['preurl'] = "?".$url."&page=".($page-1);
			$array['prepage'] = $page-1;
		} else {
			$array['preurl'] = "?".$url."&page=1";
			$array['prepage'] = 1;
		}
		if($page<$countpage) {
			$array['nexturl'] = "?".$url."&page=".($page+1);
			$array['nextpage'] = $page+1;
		} else {
			$array['nexturl'] = "?".$url."&page=".$countpage;
			$array['nextpage'] = $countpage;
		}
		$array['firsturl'] = "?".$url."&page=1";
		$array['firstpage'] = 1;
		$array['lasturl'] = "?".$url."&page=".$countpage;
		$array['lastpage'] = $countpage;
		$array['nopage'] = "?".$url."&page=";
		
		return $array;
	}
}

?>