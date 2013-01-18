<?PHP
class module_pollMod{
	
	/**===START===_select_active_poll======================================================================================== **/
	function _select_active_poll($limit = 10){
		echo 'popeye mod';
		
		$db = Factory::DB(0);
		
		$select = "*";
		$table = "mod_poll a left join mod_poll_answer b on b.poa_po_id = a.po_id";
		$where = "a.po_active = 1";
		$orderby = "";
		
		$dataList = $db->selectSql($select, $table, $where, $orderby, $limit);
		
		return $dataList;
	}//end function
	/**===END===_select_active_poll======================================================================================== **/
	
	/**===START===_insert_poll_data======================================================================================== **/
	function _insert_poll_data($req){
		$cols["pod_poa_id"]	=	$req["poa_id"];
		$cols["pod_ip"]	=	$req["ip"];
		$cols["pod_create_datetime"]	=	"sysdate()";
		
		//move entry_datetime out from quote 
		$temAry = $cols;
		unset($temAry["pod_create_datetime"]);
		//quote the other cols for db query
		$quoteFields = array_keys($temAry);
		
		//********* INSERT QUERY *********//
		//call db
		$db = Factory::DB(0);
		$db->StartTransaction();
		//call quote
		$db->addQuoted($quoteFields);
		//insert data to db
		$table = "mod_poll_data";
		$result = $db->insertSql($cols, $table);
		if($result){
			$insertID =  $db->getLastId();
			$db->CommitAllTransactions();
			return true;
		}else{
			$db->RollbackAllTransactions();
			return false;
		}//end result	
	}//end function
	/**===END===_insert_poll_data======================================================================================== **/
	
	/**===START===_select_poll_data======================================================================================== **/
	function _select_poll_data($po_id){
		$db = Factory::DB(0);
		
		$select = "a.po_title, b.poa_id, count(b.poa_id) as 'total' ";
		$table = "mod_poll a left join mod_poll_answer b on a.po_id = b.poa_po_id left join mod_poll_data c on b.poa_id = c.pod_poa_id";
		$where = "a.po_id = 1 AND a.po_active = 1 group by b.poa_id ";
		$orderby = "";
		
		$dataList = $db->selectSql($select, $table, $where, $orderby, $limit);
		
		return $dataList;
	}//end function
	/**===END===_select_poll_data======================================================================================== **/

}//end class
?>