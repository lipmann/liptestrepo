<?PHP

Class module_poll extends Controller{

	function __preCall(){
		/**=== SETTING ==================================== **/
		$this->verify_access = false;
		
		/**=== PRE FUNCTION =================================== **/
		$this->core();
		
		/**=== PRE Smarty Assign =================================== **/
		$this->Smarty->assign(array(
			'moreHeader'	=>	'',
			'moreFooter'	=>	''
		 ));
	}//end function
	function __endCall(){
	}
	
	//==START==show_active===================================================================================
	function show_active(){
		global $Smarty;
		
		echo "new change";
		
		$dataList	=	module_pollMod::_select_active_poll();
		
		$Smarty->assign(array(
		 	'include_header' 		=>	'<script src="'._URL_MODULE_DIR_.'module_poll/js/module_poll.js" ></script>
													',
			'include_footer' 		=>	'',
			"dataList"			=>	$dataList,
		 ));
		$Smarty->display("module_poll/tpl/show_active.tpl");
	}//end function
	//==END==show_active===================================================================================
	
	//==START==ajax_submit_form===================================================================================
	function ajax_submit_form(){
		global $Smarty;
		
		$req["poa_id"] =	Tools::getRequest("mod_poll_answer");
		$req["ip"] = $_SERVER['REMOTE_ADDR'];
		$resultData	=	module_pollMod::_insert_poll_data($req);
		
		if($resultData){
			$j["success"] = 1;
		}else{
			$j["success"] = 0;	
		}
		
		echo json_encode($j);
		
	}//end function
	//==END==ajax_submit_form===================================================================================
	
	function ajax_graph(){
		$look_po_id =	Tools::getRequest("mod_poll_id");
		
		$dataList = module_pollMod::_select_poll_data($look_po_id);
		//print_r($dataList);
		
		$i = 0;
		$graphData .= "[{name:'Vote', data:[";
		foreach($dataList as $ary){
			$graphDataAry[] = "{color:colors[".$i++."], y:".$ary["total"]."}";
		}//end foreach
		$graphDataAryJoin = implode ( ',', $graphDataAry);
		$graphData .= $graphDataAryJoin."]}]";
		
		$i = 65;
		$graphDataCat .= "[";
		foreach($dataList as $ary){
			$graphDataCatAry[] = " ' Vote ".chr($i++)." ' ";
		}//end foreach
		$graphDataAryCatJoin = implode ( ',', $graphDataCatAry);
		$graphDataCat .= $graphDataAryCatJoin."]";
		
		
		echo '<script src="'._URL_THEME_JS_.'/jquery.js" ></script>';	
		echo "
		
		<script type='text/javascript'>
			$(function () {
				var chart;
				$(document).ready(function() {
					 var colors = Highcharts.getOptions().colors;
					chart = new Highcharts.Chart({
						chart: {
							renderTo: 'container',
							type: 'column'
						},
						title: {
							text: '".$dataList[0]["po_title"]." '
						},
						subtitle: {
							text: ''
						},
						xAxis: {
							categories: ".$graphDataCat."
						},
						yAxis: {
							min: 0,
							title: {
								text: 'Total Votes'
							}
						},
						
						tooltip: {
							formatter: function() {
								return this.y +' vote(s)';
							}
						},
						plotOptions: {
							column: {
								pointPadding: 0.2,
								borderWidth: 0
							}
						},
						series: ".$graphData."
					});
				});
				
			});
		</script>
		
		";
		
		echo '<script src="'._URL_THEME_JS_.'/highcharts.js" ></script>';	
		echo '<script src="'._URL_THEME_JS_.'/modules/exporting.js" ></script>  ';
		echo '
			<div id="container" style="min-width:600px; height: 300px; margin: 0 auto"></div>
		';
		
	}//end function
	
	
	
}//end Class
?>