<?php
/**
 +====================================
 | Project: Jam Shopping A18
 +====================================
 | > Date started: 2014/06/11
 | > Author: tuannq
 | > Version : 1.0.0
 | > Modified by :
 | > Modified Date :
 +====================================
 */

class OrderListController extends Zend_Controller_Action
{

	protected $_model;
	protected $user;
	/**
	 * init function
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
    public function init()
    {
    	$this->_model = new Model_DBCommon();
    	$auth = Zend_Auth::getInstance();
    	$this->user = $auth->getIdentity();
    	//-var_dump($this->user['contract_id']);die;
    }
	
    /**
     * index action
     * @param null
     * @return null
     */
    public function indexAction()
    {
		$this->view->title= '????';
		
		$orderStatuses = $this->_model->selectDB('order_status', array('status_id', 'name'));
		$shopList = $this->_model->selectDB('shop', array('shop_id', 'name'));
		$returnStatuses = $this->_model->selectDB('return_status', array('status_id', 'name'));
		$paymentMethod = $this->_model->selectDB('payment_method', array('method_id', 'name'));
		$purchaseCategory = $this->_model->selectDB('purchase_category', array('category_id', 'name'));
		$appointTime  = $this->_model->selectDB('appoint_time', array('appoint_time_id', 'name'));
		$this->view->orderStatuses = $orderStatuses;
		$this->view->shopList = $shopList;
		$this->view->returnStatuses = $returnStatuses;
		$this->view->paymentMethod = $paymentMethod;
		$this->view->purchaseCategory = $purchaseCategory;
		$this->view->appointTime = $appointTime;
    }
    
    
    
    /**
     * Search Action
     */
    public function searchAction() {
    	try {
    		$this->_helper->layout->disableLayout();

    		$params = array(
    				//gets row by row: from left to right, up to down
    				$this->_getParam('order_number_from', ''),  //0
    				$this->_getParam("order_number_to", ''),    //1
    				$this->_getParam("order_status", '0'),        //2
    				$this->_getParam('order_date_from', '') != '' ? date('Y-m-d', strtotime($this->_getParam('order_date_from', ''))) : '',     //3
    				$this->_getParam('order_date_to', '') != '' ? date('Y-m-d', strtotime($this->_getParam('order_date_to', ''))) : '',       //4
    				$this->_getParam('shipping_name', ''),        //5
    				$this->_getParam('shipping_mailaddress', ''), //6
    				$this->_getParam("order_status_name", ''),
    		);
    		
    		$orderCols = array(
    				'order_id',
    				'order_number',
    				'order_date',
    				'shipping_name',
    				'order_total',
    		);
    		
    		$join_shop = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'shop'
    				,   'join_cond' => 'order.shop_id = shop.shop_id'
    				,   'join_cols' => array('name as shop_name')
    		);
    		
    		$join_payment_method = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'payment_method'
    				,   'join_cond' => 'order.payment_method_id = payment_method.method_id'
    				,   'join_cols' => array('name as payment_method_name')
    		);
    		
    		$join_order_status = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'order_status'
    				,   'join_cond' => 'order.order_status_id = order_status.status_id'
    				,   'join_cols' => array('name as order_status_name')
    		);
    		
    		$order_detail = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'order_detail'
    				,   'join_cond' => 'order.order_id = order_detail.order_id'
    				,   'join_cols' => array('')
    		);
    		
    		$variation = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'variation'
    				,   'join_cond' => 'order_detail.variation_id = variation.variation_id'
    				,   'join_cols' => array('')
    		);
    		
    		$product = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'product'
    				,   'join_cond' => 'variation.product_id = product.product_id'
    				,   'join_cols' => array('')
    		);
    		
    		$join_tbl = array(
    					$join_shop
    				,   $join_payment_method
    				,	$join_order_status
    				,	$order_detail
    				,	$variation
    				,	$product
    		);    		
    		$where = "  1 = 1  ";
    		    		
    		if( $params[0] != '' ) {
    			$where .= " AND order_number >= '$params[0]' ";
    		} 
    		if( $params[1] != '' ) {
    			$where .= " AND order_number <= '$params[1]' ";
    		} 
    		
    		if( $params[2] != 0 ) {
	    		$where .= " AND order_status_id = $params[2]  ";
    		} 
    		if( $params[3] != '' ) {
    			$where .= " AND order_date >= '$params[3]' ";
    		} 
    		if( $params[4] != '' ) {
    			$where .= " AND order_date <= '$params[4]' ";
    		} 
    		if( $params[5] != '' ) {
	    		$where .= " AND " . new Zend_Db_Expr("INSTR(IFNULL(shipping_name, ''), '$params[5]') > 0") ; 
    		} 
    		if( $params[6] != '' ) {
	    		$where .= " AND " . new Zend_Db_Expr("INSTR(IFNULL(shipping_mailaddress, ''), '$params[6]') > 0");
    		} 
	    		
    		$shopList = $this->_request->getParam('shop_list', array());
    		//var_dump($shopList);die;
    		if ((is_array($shopList)) && (count($shopList) > 0)) {
    			$shopSearch = '';
    			foreach ( $shopList as $key => $value ) {
    				$shopSearch .= $value.',';
    			}
    			$shopSearch = substr($shopSearch, 0, -1);
    			
    			if( $shopSearch != '' ) {
    				$where .= ' AND order.shop_id '.new Zend_Db_Expr("IN($shopSearch)");
    			}
    		}
    		
    		//check xem co phai la nguoi quan ly he thong khong
			$user_id = $this->user['user_id'];
    		$user_role = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'user_role'
    				,   'join_cond' => 'user.user_id = user_role.user_id'
    				,   'join_cols' => array('user_role.role_id', 'user_role.user_id')
    		);
    		
    		$sql = "SELECT 
					    `contract`.`contract_id`, `contract`.`admin_flag`
					FROM
					    `user`
					        LEFT JOIN
					    `contract` ON user.contract_id = contract.contract_id
					WHERE
					    (user.user_id = $user_id)";
    		$check_role = $this->_model->querySelectDB($sql);
    		if (isset($check_role) && count($check_role) > 0) {
    			if ($check_role[0]['admin_flag'] == 1) {
    				$is_admin = 'OK';
    			}
    			else {
    				$is_admin = 'NG';
    			}
    		}
    		else {
    			$is_admin = 'NG';
    		}
    		
    		
    		
    		$join_tbl = array(
    				$join_shop
    				,   $join_payment_method
    				,	$join_order_status
//     				,	$order_detail
//     				,	$variation
//     				,	$product
    		);
    		//neu ko la admin thi check xem order có ch?a s?n ph?m link v?i user login
    		if ($is_admin == 'NG') {
    			$where .= ' AND `product`.product_id IN (select 
							    `product`.product_id
							from
							    `user`
							        left join
							    `contract` ON `user`.contract_id = `contract`.contract_id
							        left join
							    `product` ON `contract`.contract_id = `product`.contract_id
								where `user`.user_id = 1)';	
    			array_push($join_tbl, $order_detail);
    			array_push($join_tbl, $variation);
    			array_push($join_tbl, $product);
    			
    		}
    		$data = $this->_model->joinDB('order', $orderCols, $join_tbl, $where, array(), TRUE);
    		
    		$this->view->data = $data;
    		$this->view->orderStatus = $this->_getParam("order_status", '0');
    		$this->view->orderStatusName = $params[7];
//     		var_dump($params[7]);die;
    		//var_dump($data);die;
    	}
    	catch(Exception $e) {
    		echo $e;
    	}
    }
    /**
     * detail search
     * @param null
     * @return null
     */
    public function detailsearchAction() {
    try {
    		$this->_helper->layout->disableLayout();

    		$params = array(
    				//gets row by row: from left to right, up to down
    				'detail_order_number_from' => $this->_getParam('detail_order_number_from', ''),  
    				'detail_order_number_to' => $this->_getParam("detail_order_number_to", ''),   
    				'detail_order_date_from' => $this->_getParam("detail_order_date_from", ''),       
    				'detail_order_date_to' => $this->_getParam('detail_order_date_to', ''),     
    				'shipping_date_from' => $this->_getParam('shipping_date_from', ''),       
    				'shipping_date_to' => $this->_getParam('shipping_date_to', ''),        
    				'order_total_from' => $this->_getParam('order_total_from', ''), 
    				'order_total_to' => $this->_getParam('order_total_to', ''), 
    				'appointed_date_from' => $this->_getParam('appointed_date_from', ''), 
    				'appointed_date_to' => $this->_getParam('appointed_date_to', ''), 
    				'appoint_time' => $this->_getParam('appoint_time', ''),
    				
    				//???
    				'purchaser_name' => $this->_getParam('purchaser_name', ''),
    				'purchaser_phone_number' => $this->_getParam('purchaser_phone_number', ''),
    				'purchaser_zipcode' => $this->_getParam('purchaser_zipcode', ''),
    				'name_purchaser_address' => $this->_getParam('name_purchaser_address', ''),
    				'purchaser_mailaddress' => $this->_getParam('purchaser_mailaddress', ''),
    				
    				//???
    				'shipping_read_name' => $this->_getParam('shipping_read_name', ''),
    				'shipping_phone_number' => $this->_getParam('shipping_phone_number', ''),
    				'shipping_zipcode' => $this->_getParam('shipping_zipcode', ''),
    				'name_shipping_address' => $this->_getParam('name_shipping_address', ''),
    				'shipping_mailaddress' => $this->_getParam('shipping_mailaddress', ''),
    				
    		);
    		
    		$orderCols = array(
    				'order_id',
    				'order_number',
    				'order_date',
    				'shipping_name',
    				'order_total',
    		);
    		
    		$join_shop = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'shop'
    				,   'join_cond' => 'order.shop_id = shop.shop_id'
    				,   'join_cols' => array('name as shop_name')
    		);
    		
    		$join_payment_method = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'payment_method'
    				,   'join_cond' => 'order.payment_method_id = payment_method.method_id'
    				,   'join_cols' => array('name as payment_method_name')
    		);
    		
    		$join_order_status = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'order_status'
    				,   'join_cond' => 'order.order_status_id = order_status.status_id'
    				,   'join_cols' => array('name as order_status_name')
    		);
    		
    		$contractor_shipping = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'contractor_shipping'
    				,   'join_cond' => 'order.shipping_id = contractor_shipping.shipping_id'
    				,   'join_cols' => array('shipping_date as contractor_shipping_date')
    		);
    		
    		$shipping = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'shipping'
    				,   'join_cond' => 'order.shipping_id = shipping.shipping_id'
    				,   'join_cols' => array('shipping_date as shiptable_shipping_date')
    		);
    		
    		$regionPurchaser = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'region as t1'
    				,   'join_cond' => 'order.purchaser_region_id = t1.region_id'
    				,   'join_cols' => array('name as region_purchaser_name')
    		);
    		
    		$regionShipping = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'region as t2'
    				,   'join_cond' => 'order.shipping_region_id = t2.region_id'
    				,   'join_cols' => array('name as region_shipping_name')
    		);
    			
    		$where = "  1 = 1  ";
    		if( $params['detail_order_number_from'] != '' ) {
    			$where .= " AND order.order_number >= '$params[detail_order_number_from]'  ";
    		} 
    		if( $params['detail_order_number_to'] != '' ) {
    			$where .= " AND order.order_number <= '$params[detail_order_number_to]' ";
    		} 
    		
    		if( $params['detail_order_date_from'] != 0 ) {
	    		$where .= " AND order_date >= '$params[detail_order_date_from]' ";
    		} 
    		if( $params['detail_order_date_to'] != '' ) {
    			$where .= " AND order_date <= '$params[detail_order_date_to]' ";
    		} 
    		if( $params['shipping_date_from'] != '' ) {
    			$where .= " AND contractor_shipping.shipping_date >= '$params[shipping_date_from]' AND shipping.shipping_date >= '$params[shipping_date_from]' ";
    		} 
    		if( $params['shipping_date_to'] != '' ) {
    			$where .= " AND contractor_shipping.shipping_date <= '$params[shipping_date_to]' AND shipping.shipping_date <= '$params[shipping_date_to]' ";
    		} 
    		if( $params['order_total_from'] != '' ) {
    			$where .= " AND order.order_total >= $params[order_total_from] ";
    		}
    		if( $params['order_total_to'] != '' ) {
    			$where .= " AND order.order_total <= $params[order_total_to] ";
    		}
    		if( $params['appointed_date_from'] != '' ) {
    			$where .= " AND order.appointed_date >= '$params[appointed_date_from]' ";
    		} 
    		if( $params['appointed_date_to'] != '' ) {
    			$where .= " AND order.appointed_date <= '$params[appointed_date_to]' ";
    		}
    		if( $params['appoint_time'] != 0 ) {
    			$where .= " AND order.appointed_time = $params[appoint_time] ";
    		}	
    		
    		if( $params['purchaser_name'] != '' ) {
    			$where .= " AND (order.purchaser_name = '$params[purchaser_name]' OR order.purchaser_read_name = '$params[purchaser_name]') ";
    		}
    		if( $params['purchaser_phone_number'] != '' ) {
    			$where .= " AND order.purchaser_phone_number = '$params[purchaser_phone_number]'  ";
    		}
    		if( $params['purchaser_zipcode'] != '' ) {
    			$where .= " AND order.purchaser_zipcode = '$params[purchaser_zipcode]'  ";
    		}
    		if( $params['name_purchaser_address'] != '' ) { //AND or OR QA
    			$where .= " AND t1.name = '$params[name_purchaser_address]' OR order.purchaser_address = '$params[name_purchaser_address]' ";
    		}
    		if( $params['purchaser_mailaddress'] != '' ) {
    			$where .= " AND order.purchaser_mailaddress = '$params[purchaser_mailaddress]'  ";
    		}
    		
    		
    		if( $params['shipping_read_name'] != '' ) {
    			$where .= " AND (order.shipping_name = '$params[shipping_read_name]' OR order.shipping_read_name = '$params[shipping_read_name]') ";
    		}
    		if( $params['shipping_phone_number'] != '' ) {
    			$where .= " AND order.shipping_phone_number = '$params[shipping_phone_number]'  ";
    		}
    		if( $params['shipping_zipcode'] != '' ) {
    			$where .= " AND order.shipping_zipcode = '$params[shipping_zipcode]'  ";
    		}
    		if( $params['name_shipping_address'] != '' ) {//and or or
    			$where .= " AND t2.name = '$params[name_shipping_address]' OR order.shipping_address = '$params[name_shipping_address]'  ";
    		}
    		if( $params['shipping_mailaddress'] != '' ) {
    			$where .= " AND order.shipping_mailaddress = '$params[shipping_mailaddress]'  ";
    		}
		    		
    		
    		$checkboxes = array(
    				'order.order_status_id' => $this->_request->getParam('detail_order_status', ''),
    				'order.return_status_id' => $this->_request->getParam('return_status', ''),
    				'order.payment_method_id' => $this->_request->getParam('payment_method', ''),
    				'order.purchase_category_id' => $this->_request->getParam('purchase_category', ''),
    				'order.shop_id' => $this->_request->getParam('shop_list', ''),
			);

    		
    		$where .= $this->getWhereCheckboxes($checkboxes);
    		
    		//check xem co phai la nguoi quan ly he thong khong
    		$user_id = $this->user['user_id'];
    		$user_role = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'user_role'
    				,   'join_cond' => 'user.user_id = user_role.user_id'
    				,   'join_cols' => array('user_role.role_id', 'user_role.user_id')
    		);
    		
    		$sql = "SELECT
		    		`contract`.`contract_id`, `contract`.`admin_flag`
		    		FROM
		    		`user`
		    		LEFT JOIN
		    		`contract` ON user.contract_id = contract.contract_id
		    		WHERE
		    		(user.user_id = $user_id)";
    		$check_role = $this->_model->querySelectDB($sql);
    		if (isset($check_role) && count($check_role) > 0) {
	    		if ($check_role[0]['admin_flag'] == 1) {
	    			$is_admin = 'OK';
	    		}
	    		else {
	    			$is_admin = 'NG';
	    		}
    		}
    		else {
    			$is_admin = 'NG';
    		}
    		
    		$join_tbl = array(
    					$join_shop
    				,   $join_payment_method
    				,	$join_order_status
    				, 	$contractor_shipping
    				,	$shipping
    				,	$regionPurchaser
    				,	$regionShipping
    		);    	
    		//neu ko la admin thi check xem order có ch?a s?n ph?m link v?i user login
    		if ($is_admin == 'NG') {
    			$order_detail = array(  'join_typ' => 'left'
    					,   'join_tbl' => 'order_detail'
    					,   'join_cond' => 'order.order_id = order_detail.order_id'
    					,   'join_cols' => array('')
    			);
    			
    			$variation = array(  'join_typ' => 'left'
    					,   'join_tbl' => 'variation'
    					,   'join_cond' => 'order_detail.variation_id = variation.variation_id'
    					,   'join_cols' => array('')
    			);
    			
    			$product = array(  'join_typ' => 'left'
    					,   'join_tbl' => 'product'
    					,   'join_cond' => 'variation.product_id = product.product_id'
    					,   'join_cols' => array('')
    			);
	    		$where .= ' AND `product`.product_id IN (select
				    				`product`.product_id
						    		from
						    		`user`
						    		left join
						    		`contract` ON `user`.contract_id = `contract`.contract_id
						    		left join
						    		`product` ON `contract`.contract_id = `product`.contract_id
									where `user`.user_id = 1)';
	    			array_push($join_tbl, $order_detail);
	    			array_push($join_tbl, $variation);
	    			array_push($join_tbl, $product);
    
    		}
    		
    		$data = $this->_model->joinDB('order', $orderCols, $join_tbl, $where, array(), TRUE);
    		$this->view->data = $data;
    		
    		if (in_array(3, $this->_request->getParam('detail_order_status', array()))) {
	    		$this->view->orderStatus = 3;
    		}
    		else {
    			$this->view->orderStatus = 0;
    		}
    		//var_dump($data);die;
    	}
    	catch(Exception $e) {
    		echo $e;
    	}
    }
    
    /**
     * 
     * Get where checkboxes
     * @param unknown $checkboxes
     * @return string
     */
    private function getWhereCheckboxes($checkboxes) {	
    	$where = '';
    	foreach ($checkboxes as $colSearch => $arrayCheck) {    		
    		if ((is_array($arrayCheck)) && (count($arrayCheck) > 0)) {
    			$search = '';
    			
    			foreach ( $arrayCheck as $key => $value ) {
    				$search .= $value.',';
    			}
    			$search = substr($search, 0, -1);
    			 
    			if( $search != '' ) {
    				$where .= ' AND  ' . $colSearch . new Zend_Db_Expr(" IN ($search)");
    			}
    		}
    	}
    	
    	return $where;
    }
    
    /**
     * upload for button 1
     * @param null     
     * @return null 
     */
    public function uploadAction() {
    	$this->_helper->viewRenderer->setNoRender();
    	try {
    		if($this->_request->isPost())
    		{
    			$dir_upload = APPLICATION_PATH. '/../public/uploads/csvs/';
    			if(!is_dir($dir_upload)){
    				mkdir($dir_upload);
    			}
    			$upload = new Zend_File_Transfer();
    			$upload->setDestination($dir_upload);
    			$files = $upload->getFileInfo();
    			$fileNameAndExtens = explode('.', $files['upload1']['name']);
    			$fileNameTextArea = $fileNameAndExtens[0];  
    			$i = 0;
    			$realfilename = '';
    			$time = '';
    			foreach ($files as $file => $info)
    			{
    				if ($upload->isUploaded($file))
    				{
    					$upload->clearFilters();
    					$name = md5($_POST['time'][$i].$info['name']);
    					$upload->addFilter(
    							'Rename'
    							,	array(
    									'target' => $name
    									,	'overwrite' => false
    							)
    					);
    					$upload->receive($info['name']);
    					$realfilename = $name;
    					$time=$_POST['time'][$i];
    				}
    				$i++;
    			}
    		}
    		$file_import  = $dir_upload.$realfilename;
    		//var_dump($file_import);die;
    		$arDataError = array();
    		$row_error_num = 0;
    		$now = date('Y/m/d H:i:s');
    		$row = 0;
    		$index = 0;
    		$errString = '';
    		$lineErr = '';
    		$itemErrStr = '';
    		$checkErrs = false;
    		if (($file = fopen($file_import, 'r')) !== FALSE)
    		{
    			while (($data = fgetcsv($file, 1000, ",")) !== FALSE)
    			{	
    				//$lineErr = true;
    				if ($index > 0) {
	    				$checkErrs = true;
	    				$data = $this->trimRowData($data); // data are row by row
	    				/* if(!$this->checkRowData($data))
	    				{
	    					$row_error_num++;
	    					$errString .= '['.($row+1). ']???[CSV??]????????????\n';
	    					//$arDataError[$index++] = $row+1;
	    					//array_push($arDataError, $data);
	    				} */
	    				// {
    					$res = $this->_model->selectDB('order_status', array('status_id', 'name'), "name = '????' ");
    					$res1 = $this->_model->selectDB('delivery_company', array('delivery_company_id', 'name'), "code = '$data[2]' ");
    					if (isset($res1[0])) {
	    					$delivery_company_id = $res1[0]['delivery_company_id'];
    					}
    					else {
    						$delivery_company_id = 0;
    					}
    					$status_id = $res[0]['status_id'];
    					//var_dump($status_id);die;
    					if (strcasecmp(substr($data[0], 0, 3), 'CP_') == 0) {
    						$shipping_ready_number = substr($data[0], 3);
    						$sqlCheckErrors = "select 
												  	(`contractor_shipping_ready`.shipping_ready_number = $shipping_ready_number) as item_1,
												    (DATE(`contractor_shipping`.shipping_date) = '$data[1]') as item_2,
												    (`contractor_shipping`.delivery_company_id = $delivery_company_id) as item_3,
												    (`contractor_shipping`.tracking_number = '$data[3]') as item_4
												from
												    `order`
												        left join
												    `contractor_shipping_ready` ON `order`.order_id = `contractor_shipping_ready`.order_id
												        left join
												    `contractor_shipping` ON `contractor_shipping_ready`.shipping_id = `contractor_shipping`.shipping_id
												where
												    `contractor_shipping_ready`.shipping_ready_number = $shipping_ready_number
												        or DATE(`contractor_shipping`.shipping_date) = '$data[1]'
												        or `contractor_shipping`.delivery_company_id = $delivery_company_id
												        or `contractor_shipping`.tracking_number = '$data[3]'
    								";
    						
    						
    						$sql = "SET SQL_SAFE_UPDATES = 0;
    						
    						update `order`
	    						left join `contractor_shipping_ready`
	    						on `order`.order_id = `contractor_shipping_ready`.order_id
	    						left join `contractor_shipping`
	    						on `contractor_shipping_ready`.shipping_id = `contractor_shipping`.shipping_id
    						set order.order_status_id = $status_id,
    							order.modified_date = '$now'
    						where `contractor_shipping_ready`.shipping_ready_number = $shipping_ready_number
	    						and DATE(`contractor_shipping`.shipping_date) = '$data[1]'
	    						and `contractor_shipping`.delivery_company_id =  $delivery_company_id
	    						and `contractor_shipping`.tracking_number = '$data[3]' ";
    						//var_dump($sql);die;
    					}
    					else {
    						$sqlCheckErrors = "select 
												    (`order`.order_number = '$data[0]') as item_1,
												    (DATE(`shipping`.shipping_date) = '$data[1]') as item_2,
												    (`shipping`.delivery_company_id =  $delivery_company_id) as item_3,
												    (`shipping`.tracking_number = '$data[3]') as item_4
												from
												    `order`
												        left join
												    `shipping` ON `order`.shipping_id = `shipping`.shipping_id
												 where `order`.order_number = '$data[0]'
						    						or DATE(`shipping`.shipping_date) = '$data[1]'
						    						or `shipping`.delivery_company_id =  $delivery_company_id
						    						or `shipping`.tracking_number = '$data[3]' " ;
    						$sql = "SET SQL_SAFE_UPDATES = 0;
    						update `order`
	    						left join `shipping`
	    						on `order`.shipping_id = `shipping`.shipping_id
    						set order.order_status_id = $status_id,
    							order.modified_date = '$now'
    						where `order`.order_number = '$data[0]'
	    						and DATE(`shipping`.shipping_date) = '$data[1]'
	    						and `shipping`.delivery_company_id =  $delivery_company_id
	    						and `shipping`.tracking_number = '$data[3]' ";
    						//var_dump($sql);die;
    					}
    					
    					//$itemErrors = array();
    					//$tmpItemErr = array();
    					$dataErrors =  $this->_model->querySelectDB($sqlCheckErrors);
    					if ((isset($dataErrors)) && (count($dataErrors) > 0)){
    						foreach ($dataErrors as $key => $row) {
    							if (count(array_unique($row)) == 1) {
    								//	$lineErr = false;
    								$checkErrs = false;
    								break;
    							}
    							else {
    								//	$lineErr = true;
    								$checkErrs = true;
    								/*  $arrValues = array_values($row);
    								for ($i = 0; $i < count($arrValues); $i++) {
    									if ($arrValues[$i] == 0) {
    										//array_push($tmpItemErr, $i);
    									}
    								} 
    								$itemErrors =  array_unique($tmpItemErr, SORT_NUMERIC); */
    							}
    						}
    							
    					}
    					//var_dump($sqlCheckErrors);die;
    					if ($checkErrs == true) {
    						
    						$errString .= ($index+1). '???'. ($fileNameTextArea) .'????????????\n';
    						//var_dump($errString);die;
    					}
    					else {
	    					$this->_model->queryNoReturnDB($sql);
    					}
    			}		
	    		$index++;
    		}
    		
    			if (!$checkErrs) {
    				$errString = '?????????????????';
    				
    			}
    			fclose($file);
    			?>
    	    		<html lang="ja">
    	    		<head>
    	    		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	    		<script>
							if ('<?php echo $index?>' > 1) {
	 				   			parent.$('#text_area').show();
	        				    parent.$('#text_area').find('textarea').html('<?php echo $errString?>'.replace("/\r?\n/g, '<br />"));
							}
							else {
								parent.$('#text_area').hide();
							}	
        			</script>
    	    		</head>
    	    		</html>
    	    		<?php
    	    	}
    	    	else
    	    	{
    	    		$hasFile = false;
    	    	}
    	    	
    	    }
    	    
    	    
    	    
    	    catch (Exception $ex) {
    	    	
    	    }
        }
        
        /**
         * trim row
         * @param array string $dataRow
         * @return array string trimed
         */
        public function trimRowData($dataRow)
        {
        	$tmp = $dataRow;
        	if(is_array($tmp))
        	{
        		for($i=0;$i<count($tmp);$i++)
        		{
        			$tmp[$i] = trim($tmp[$i]);
        		}
        		}
        		return($tmp);
        }
        
        /**
         * remove character BOM
         * @param str $text
         * @return str
         */
        public function remove_utf8_bom($text)
        {
        	$bom = pack('H*','EFBBBF');
        	$textReult = preg_replace("/^$bom/", '', $text);
        	return $textReult;
        }
        
        /**
         * Check validate one row data when import to s05_f0031
         * @param array $dataRow
         * @return boolean
         */
        public function checkRowData($dataRow)
        {
        	if(!is_array($dataRow))
        	{
        		return false;
        	}
        	else
        	{
        		if(count($dataRow) != 4)
        			return false;
        			
        		//--------customer_no----------
    //     		if((!ctype_digit($this->remove_utf8_bom($dataRow[0])))||(strlen($dataRow[0])>10))
    //     		{
    //     			return false;
    //     		}
        
        		//--------date----------
        		if(!$this->checkDate($this->remove_utf8_bom($dataRow[1])))
        		{
        			return false;
        		}
        
        		//--------google_order----------
        		if((!$this->checkInteger($this->remove_utf8_bom($dataRow[2])))||($dataRow[2]==''))
        		{
        			return false;
        		}
        
        		//--------google_diff----------
        		if((!$this->checkInteger($this->remove_utf8_bom($dataRow[3])))||($dataRow[3]==''))
        		{
        			return false;
        		}
        			
        
        	}
        	return true;
        }
        
        /**
         * function check validate date format
         * @param string $strDate
         * @return boolean
         */
        function checkDate($date)
        {
        	if(strlen(trim($date))!=10)
        		return false;
        	$dt = DateTime::createFromFormat("Y/m/d", $date);
        	return $dt !== false && !array_sum($dt->getLastErrors());
        }
        
        
        /**
         * check string is integer
         * @param unknown $input
         * @return number
         */
        public function checkInteger($input)
        {
        	$regex = '/^[-+]?\d+$/';
        	return (preg_match($regex, $input));
        }
        
        /**
         * export all cua simple search
         */
        public function exportcsvAction () {
        	$this->_helper->viewRenderer->setNoRender();
        	
        	// Fill data from for structure
        	// cach nay dung sau
        	$params = array(
        				//gets row by row: from left to right, up to down
        				$this->_getParam('order_number_from', ''),  //0
        				$this->_getParam("order_number_to", ''),    //1
        				$this->_getParam("order_status", '0'),        //2
        				$this->_getParam('order_date_from', '') != '' ? date('Y-m-d', strtotime($this->_getParam('order_date_from', ''))) : '',     //3
        				$this->_getParam('order_date_to', '') != '' ? date('Y-m-d', strtotime($this->_getParam('order_date_to', ''))) : '',       //4
        				$this->_getParam('shipping_name', ''),        //5
        				$this->_getParam('shipping_mailaddress', ''), //6
        		);
        		
        	
    		/*
    		$where = "  1 = 1  ";
    					
    		if( $params[0] != '' ) {
    			$where .= " AND order_number >= '$params[0]' ";
    		} 
    		if( $params[1] != '' ) {
    			$where .= " AND order_number <= '$params[1]' ";
    		} 
    		
    		if( $params[2] != 0 ) {
    			$where .= " AND order_status_id = $params[2]  ";
    		} 
    		if( $params[3] != '' ) {
    			$where .= " AND order_date >= '$params[3]' ";
    		} 
    		if( $params[4] != '' ) {
    			$where .= " AND order_date <= '$params[4]' ";
    		} 
    		if( $params[5] != '' ) {
    			$where .= " AND " . new Zend_Db_Expr("INSTR(IFNULL(shipping_name, ''), '$params[5]') > 0") ; 
    		} 
    		if( $params[6] != '' ) {
    			$where .= " AND " . new Zend_Db_Expr("INSTR(IFNULL(shipping_mailaddress, ''), '$params[6]') > 0");
    		} 
    		
    		
    		$join_shop = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'shop'
    				,   'join_cond' => 'order.shop_id = shop.shop_id'
    				,   'join_cols' => array('name as shop_name')
    		);
    		
    		$join_payment_method = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'payment_method'
    				,   'join_cond' => 'order.payment_method_id = payment_method.method_id'
    				,   'join_cols' => array('name as payment_method_name')
    		);
    		
    		$join_order_status = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'order_status'
    				,   'join_cond' => 'order.order_status_id = order_status.status_id'
    				,   'join_cols' => array('name as order_status_name')
    		);
    		
    		$order_detail = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'order_detail'
    				,   'join_cond' => 'order.order_id = order_detail.order_id'
    				,   'join_cols' => array('sum(`order_detail`.price) as price', 'sum(`order_detail`.tax) as tax'
    										, 'sum(`order_detail`.order_quantity as order_quantity)'	
    										)
    		);
    		
    		$variation = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'variation'
    				,   'join_cond' => 'order_detail.variation_id = variation.variation_id'
    				,   'join_cols' => array('sku')
    		);
    		
    		$product = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'product'
    				,   'join_cond' => 'variation.product_id = product.product_id'
    				,   'join_cols' => array('product_id', 'name as product_name')
    		);
    		
    		$contract = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'contract'
    				,   'join_cond' => 'shop.contract_id = contract.contract_id'
    				,   'join_cols' => array('company_name', 'contractant_name')
    		);
    		
    		
    		$delivery = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'delivery'
    				,   'join_cond' => 'shop.delivery_id = delivery.delivery_id'
    				,   'join_cols' => array('name as delivery_name', 'zipcode as delivery_zipcode', 'address as delivery_address', 
    										'phone_number as delivery_phone_number'
    									)
    		);
    		
    		$region = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'region'
    				,   'join_cond' => ($check_user_manage_shop == 'OK') ? 'order.region_id = region.region_id' : 'delivery.region_id = region.region_id'
    				,   'join_cols' => array('name as region_name')
    		);
    		
    		$delivery_company = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'delivery_company'
    				,   'join_cond' => 'shipping.delivery_id = delivery.delivery_id'
    				,   'join_cols' => array('name as delivery_name', 'zipcode as delivery_zipcode', 'address as delivery_address',
    						'phone_number as delivery_phone_number'
    				)
    		);
    
    		$shipping = array(  'join_typ' => 'left'
    					,   'join_tbl' => 'shipping'
    					,   'join_cond' => 'order.shipping_id = shipping.shipping_id'
    					,   'join_cols' => array('IFNULL(shipping.shipping_id, 0) as shipping_id', 'shipping.delivery_company_id as shipping_delivery_company_id', 'shipping_date as shiptable_shipping_date', 'tracking_number as shipping_tracking_number')
    						);
    		$delivery_company = array(  'join_typ' => 'left'
    						,   'join_tbl' => 'delivery_company'
    						,   'join_cond' => 'shipping.delivery_company_id = delivery_company.delivery_company_id'
    						,   'join_cols' => array('code as delivery_company_code')
    						);
    		
     		$appoint_time = array(  'join_typ' => 'left'
    						,   'join_tbl' => 'appoint_time'
    						,   'join_cond' => 'order.appointed_time = appoint_time.appoint_time_id'
    						,   'join_cols' => array('code as appoint_time_code')
    						);
    		
    		$join_payment_method = array(  'join_typ' => 'left'
    						,   'join_tbl' => 'payment_method'
    						,   'join_cond' => 'order.payment_method_id = payment_method.method_id'
    						,   'join_cols' => array('code as payment_method_code', 'name as payment_method_name')
    				);		
    		$join_size = array(  'join_typ' => 'left'
    					,   'join_tbl' => 'size'
    					,   'join_cond' => 'variation.size_id = size.size_id'
    					,   'join_cols' => array('name as size_name')
    			);
    
    
    		$orderCols = array(
    						'order_id',
    						'order_number',
    						'shipping_name',
    						'product_total',
    						'tax_total',
    						'postage',
    						'fee',
    						'use_point',
    						'order.orther_discount_total',
    						'order.order_total',
    						'order.memo',
    						'order_date',
    						'order.purchaser_name',
    						'order.purchaser_read_name',
    						'order.purchaser_zipcode',
    						'order.purchaser_address',
    						'order.purchaser_phone_number',
    						'order.purchaser_mailaddress',
    						'order.shipping_read_name',
    						'order.shipping_zipcode',
    						'order.shipping_address',
    						'order.shipping_phone_number',
    						'order.shipping_mailaddress',
    						'order.appointed_date',
    						'order.order_status_id',
    						'order.appointed_time',
    						//'order.shipping_id',
    						'order.shipping_region_id'
    				    
    					);
    		
    		$join_tbl = array(
    				$join_shop
    			,   $join_payment_method
    			,	$join_order_status
    			,	$order_detail
    			,	$variation
    			,	$product
    			,	$contract
    			,	$delivery
    			,	$region
    			,	$shipping
    			,	$delivery_company
    			,	$appoint_time
    			,	$join_payment_method
    			,	$join_size
    		);
    		
    		//phan shopList phai lay khac voi search
       		$shopList = str_split($this->_getParam('shop_list', ''));
        	if ((is_array($shopList)) && (count($shopList) > 0)) {
        		$shopSearch = '';
        		foreach ( $shopList as $key => $value ) {
        			$shopSearch .= $value;
        		}
        		//$shopSearch = substr($shopSearch, 0, -1);
        		if( $shopSearch != '' ) {
        			$where .= ' AND order.shop_id '.new Zend_Db_Expr("IN($shopSearch)");
        		}
        	}
    		
    						
    		
    		
        	
        	$res = $this->_model->joinDB('order', $orderCols, $join_tbl, $where);
        	
        	$data = array();
        	
        	foreach ($res as $key => $row) {
        		$tmp = array(
        				'shop_id' => $check_user_manage_shop == 'OK' ? $row['shop_id'] : 9999
    				,	'shop_name' => 	$check_user_manage_shop == 'OK' ? $row['shop_name'] : $row['company_name'] . ' '. $row['contractant_name']
    				,	'no' => $key
    				,	'delivery_name' => $check_user_manage_shop == 'OK' ? $row['order.shipping_name'] : $row['delivery_name']
    				,	'shipping_zipcode' => $check_user_manage_shop == 'OK' ? $row['shipping_zipcode'] : $row['delivery_zipcode']
    				,	'region_name' => $check_user_manage_shop == 'OK' ? $row['order.region_name'] : $row['region_name']
    				,	'delivery_name' => $row['order.shipping_name']
    				,	'address' => $check_user_manage_shop == 'OK' ? $row['order.shipping_address'] : $row['delivery_address']
    				,	'phone_number' => $check_user_manage_shop == 'OK' ? $row['order.shipping_phone_number'] : $row['delivery_phone_number']
    
    				,	'fax_no' => '' //Pd
    				,	'delivery_email' => '' //Pd
    				,	'delivery_company_name' => '' //Pd
    				,	'delivery_depart' => '' //Pd
    				,	'shipping_remark' => '' //Pd
    				,	'shipping_date' => date('Y/m/d')
    				,	'delivery_company_code' => $row['delivery_company_code']
    				,	'appointed_date' => $check_user_manage_shop == 'OK' ? $row['order.appointed_date'] : '' // hay chu nay ??
    				,	'appoint_time_code' => $check_user_manage_shop == 'OK' ? $row['appoint_time_code'] : '' // hay chu nay ??
    				,	'postage' => $check_user_manage_shop == 'OK' ? $row['order.postage'] : 0
    				,	'fee' => $check_user_manage_shop == 'OK' ? $row['order.fee'] : 0
    				,	'tax_total' => $check_user_manage_shop == 'OK' ? $row['order.tax_total'] : $row['tax']
    				
    				//39 ~ 43	
    				,	'point_amount' => '' //Pd
    				,	'point_status' => '' //Pd
    				,	'point_scored' => '' //Pd
    				,	'use_point' => '' //Pd
    				,	'total_point' => '' //Pd
    
    
    				,	'order_total' => $check_user_manage_shop == 'OK' ? $row['order.order_total'] : $row['price']
    				,	'payment_method_code' => $check_user_manage_shop == 'OK' ? $row['payment_method_code'] : 0
    				,	'payment_method_name' => $check_user_manage_shop == 'OK' ? $row['payment_method_name'] : '???'
    				
    				,	'delivery_method' => '' //Pd
    				,	'receipt_flag' => '' //Pd
    				,	'receipt_address' => '' //Pd
    				,	'gift_message' => '' //Pd
    				,	'package_1' => '' //Pd
    				,	'package_2' => '' //Pd
    				,	'package_fee_1' => '' //Pd
    				,	'package_fee_2' => '' //Pd
    				,	'works' => '' //Pd
    				,	'shipper_name_flg' => '' //Pd
    		
    				,	'purchaser_name' => $check_user_manage_shop == 'OK' ? $row['purchaser_name'] : $row['delivery_name']
    				
    				//58~68
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				, 	'xxx' => '' //Pd
    
    				,	'product_name' => $check_user_manage_shop == 'OK' ? $row['product_name'] : $row['product_name']
    				,	'variation_sku' => $check_user_manage_shop == 'OK' ? $row['sku'] : $row['sku']
    				
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				, 	'xxx' => '' //Pd
    
    				,	'size_name' => $check_user_manage_shop == 'OK' ? $row['size_name'] : $row['size_name']
    				,	'order_quantity' => 'chua ro' //chua ro
    				,	'unit_price' => 'chua ro' //
    
    					//78~87
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    				,	'xxx' => '' //Pd
    					
    				,	'use_point_comment' => $check_user_manage_shop == 'OK' ? '????????: ' . $row['use_point'] : '??'
    
        		);
    			array_push($export, $tmp);
        	}
        	
    //     	var_dump($data);
    //     	die;/
    		 * 
    		 */
    		
         	$data = array (
        				array(
        				 '???????',
        				'?????',
        				'??????',
        				'?NO',
        				'????',
        				'???????',
        				'???????',
        				'?????1',
        				'?????2',
        				'?????3',
        				'???????',
        				'???FAX??',
        				'???Email',
        				'??????',
        				'???????·??',
        				'????',
        				'???',
        				'????ID',
        				'?????',
        				'?????',
        				'??ID',
        				'???',
        				'????',
        				'??',
        				'?????',
        				'???',
        				'???????',
        				'?????????',
        				'??????',
        				'??????',
        				'??????',
        				'?????',
        				'???????',
        				'????',
        				'????',
        				'??????',
        				'?????',
        				'????????',
        				'??1',
        				'??2',
        				'???1',
        				'???2',
        				'??',
        				'??????FLG',
        				'?????',
        				'???????',
        				'???????',
        				'???????',
        				'?????1',
        				'?????2',
        				'?????3',
        				'??????',
        				'???????',
        				'??????????',
        				'????',
        				'??',
        				'??',
        				'??/??',
        				'?ID',
        				'??',
        				'???ID',
        				'????',
        				'?????',
        				'??',
        				'??',
        				'???',
        				'?????',
        				'?????1',
        				'?????2',
        				'???????',
        				'??',
        				'??????',
        				'????',
        				'?????',
        				'??????',
        				'???????'
        			)
        			
        	);
    		//if (is_array($orderIDList) && count($orderIDList) > 0) {
    		if (count($this->_getParam('order_id_list', array())) > 0) {
    			$orderIDList = explode(',', $this->_getParam('order_id_list', array()));
    		
    			foreach ($orderIDList as $key => $row) {
    				$check_user_manage_shop = 'NG';
    				$join_tbl = array( 
    								array(  'join_typ' => 'left'
    							,   'join_tbl' => 'shop'
    							,   'join_cond' => 'order.shop_id = shop.shop_id'
    							,   'join_cols' => array('contract_id')
    							));
    				$shop_contract_id = $this->_model->joinDB('order', array(), $join_tbl, "order.order_id = $row");
    				if (isset($shop_contract_id)) {
    					if ($shop_contract_id[0]['contract_id'] == $this->user['contract_id']) {
    						$check_user_manage_shop = 'OK';
    					}
    				}
    				
    				//var_dump($check_user_manage_shop);die;}
    				if ($check_user_manage_shop == 'OK') {
    					$sql = " select 
								    `shop`.shop_id,
								    `shop`.name as shop_name,
								    `order`.order_number,
									'0' as line_no,
								    `order`.shipping_name,
								    `order`.shipping_zipcode,
								    `region`.name as region_name,
								    `order`.shipping_address,
								    '' as shipping_address2,
								    '' as shipping_adress3,
								    `order`.shipping_phone_number,
								    '' as fax_no,
								    '' as delivery_email,
								    '' as delivery_company_name,
								    '' as delivery_depart,
								    '' as shipping_remark,
								    date_format(now(), '%Y/%m/%d') as shipping_date,
								    `delivery_company`.code as delivery_company_code,
								    date_format(`order`.appointed_date, '%Y/%m/%d') as appointed_date,
								    `appoint_time`.code as appoint_time_code,
								    '' as customer_id,
								    date_format(`order`.order_date, '%Y/%m/%d') as order_date,
									'' as tax_type,
								    order.postage,
								    order.fee,
								    order.tax_total,
								    '' as point_amount,
								    '' as point_status,
								    '' as point_scored,
								    '' as use_point,
								    '' as total_point,
								    order.order_total,
								    payment_method.code as payment_method_code,
								    payment_method.name as payment_method_name,
								    '' as delivery_method,
								    '' as receipt_flag,
								    '' as receipt_address,
								    '' as gift_message,
								    '' as package_1,
								    '' as package_2,
								    '' as package_fee_1,
								    '' as package_fee_2,
								    '' as works,
								    '' as shipper_name_flg,
								    order.purchaser_name,
								    '' as purchaser_phone,
								    '' as purchaser_zipcode,
								    '' as purchaser_state,
								    '' as purchaser_address1,
								    '' as purchaser_address2,
								    '' as purchaser_address3,
								    '' as purchaser_compnay_name,
								    '' as purchaser_phone_number,
								    '' as purchaser_mailadress,
								    '' as purchaser_comment,
								    '' as purchaser_part_number,
								    product.name as product_name,
								    variation.sku,
								    '' as color_id,
								    '' as color_name,
								    '' as size_id,
								    '' as size_name_pending,
								    size.name as size_name,
								    order_detail.order_quantity,
								    order_detail.price,
								    '' as line_remark,
								    '' as shipping_line_remark,
								    '' as invoice_remark1,
								    '' as invoice_remark2,
								    '' as shipping_status,
								    '' as preliminary,
								    '' as gift_flag,
								    '' as order_time,
								    '' as priority_flag,
								    '' as coupon_amount,
								    concat('????????: ',
								            cast(`order`.use_point as char (10))) as use_point_comment
								from
								    `order`
								        left join
								    `shop` ON order.shop_id = shop.shop_id
								        left join
								    `region` ON order.shipping_region_id = `region`.region_id
								        LEFT JOIN
								    `shipping` ON order.shipping_id = shipping.shipping_id
								        left join
								    `delivery_company` ON `shipping`.delivery_company_id = `delivery_company`.delivery_company_id
								        left join
								    `appoint_time` ON `order`.appointed_time = `appoint_time`.appoint_time_id
								        left join
								    `payment_method` ON order.payment_method_id = payment_method.method_id
								        left join
								    `order_detail` ON order.order_id = order_detail.order_id
								        left join
								    `variation` ON `order_detail`.variation_id = `variation`.variation_id
								        left join
								    `product` ON `variation`.product_id = `product`.product_id
								        left join
								    `size` ON variation.size_id = size.size_id
									where order.order_id = $row ";
    				}
    				else {
    					$sql = "select 
									'9999' as column_1,
									concat(contract.company_name, ' ', contract.contractant_name) as column2,
									concat('CP_', cast(contractor_shipping_ready.shipping_ready_number as char(5))) as column3,
									'0' as line_no,
								    delivery.name as delivery_name_column5,
								    delivery.zipcode,
								    `region`.name as region_name,
								    `delivery`.address,
								    '' as shipping_address2,
								    '' as shipping_adress3,
								    delivery.phone_number,
								    '' as fax_no,
								    '' as delivery_email,
								    '' as delivery_company_name,
								    '' as delivery_depart,
								    '' as shipping_remark,
								    date_format(now(), '%Y/%m/%d') as shipping_date,
								    `delivery_company`.code as delivery_company_code,
								    '??' as appointed_date,
								    '??' as appoint_time_code,
								    '' as customer_id,
								    date_format(now(), '%Y/%m/%d') as order_date,
								    '' as tax_type,
								    '0' as postage,
								    '0' as fee,
									sum(order_detail.tax) as sum_tax,
								    '' as point_amount,
								    '' as point_status,
								    '' as point_scored,
								    '' as use_point,
								    '' as total_point,
									sum(order_detail.price) as sum_price,
								    '0' as payment_method_code,
								    '???' as payment_method_name,
								    '' as delivery_method,
								    '' as receipt_flag,
								    '' as receipt_address,
								    '' as gift_message,
								    '' as package_1,
								    '' as package_2,
								    '' as package_fee_1,
								    '' as package_fee_2,
								    '' as works,
								    '' as shipper_name_flg,
								    delivery.name as delivery_name1,
								    '' as purchaser_phone,
								    '' as purchaser_zipcode,
								    '' as purchaser_state,
								    '' as purchaser_address1,
								    '' as purchaser_address2,
								    '' as purchaser_address3,
								    '' as purchaser_compnay_name,
								    '' as purchaser_phone_number,
								    '' as purchaser_mailadress,
								    '' as purchaser_comment,
								    '' as purchaser_part_number,
								    product.name as product_name,
								    variation.sku,
								    '' as color_id,
								    '' as color_name,
								    '' as size_id,
								    '' as size_name_pending,
								    size.name as size_name,
									sum(order_detail.order_quantity) as sum_order_quantity,
									max(order_detail.price) as max_price,
								    '' as line_remark,
								    '' as shipping_line_remark,
								    '' as invoice_remark1,
								    '' as invoice_remark2,
								    '' as shipping_status,
								    '' as preliminary,
								    '' as gift_flag,
								    '' as order_time,
								    '' as priority_flag,
								    '' as coupon_amount,
								    '??' as use_point_comment
								from
								    `order`
								        left join
								    `shop` ON order.shop_id = shop.shop_id
								        left join
								    `contract` ON shop.contract_id = contract.contract_id
								        left join
								    `contractor_shipping_ready` ON order.order_id = contractor_shipping_ready.order_id
								        left join
								    `delivery` ON shop.delivery_id = delivery.delivery_id
								left join `region`
								on delivery.region_id = region.region_id
								        LEFT JOIN
								    `shipping` ON order.shipping_id = shipping.shipping_id
								        left join
								    `delivery_company` ON `shipping`.delivery_company_id = `delivery_company`.delivery_company_id
								        left join
								    `payment_method` ON order.payment_method_id = payment_method.method_id
								        left join
								    `order_detail` ON order.order_id = order_detail.order_id
								        left join
								    `variation` ON `order_detail`.variation_id = `variation`.variation_id
								        left join
								    `product` ON `variation`.product_id = `product`.product_id
								        left join
								    `size` ON variation.size_id = size.size_id
    							where
    							    order.order_id = $row
    							group by order_detail.order_id, contractor_shipping_ready.order_id    
        				";
    				}
    				$tmp = $this->_model->querySelectDB($sql);
    				$data = array_merge($data, $tmp);
    			}
    		}
    		if (isset($data) && count($data) > 0) {
    			for ($i = 1; $i < count($data); $i++) {
    				$data[$i]['line_no'] = $i;
    			}
    		}
    		//var_dump($data);die;
    		
        	$dir_upload = APPLICATION_PATH. '/../public/uploads/csvs/';
        	$exportFileName = $dir_upload.'????.csv';
        	if(file_exists($exportFileName))
        	{
        		unlink($exportFileName);
        	}
        	$checked = $this->_getParam('checked', 0);
        	$rowChecked = str_split($this->_getParam('row_checked', ''));
        	//die($checked);
        	if (isset($data)) {
        		if (($exportfile = fopen ( $exportFileName , 'a+' )) !== FALSE) {
        			foreach ($data as $key => $row) {
    	    			fputcsv ( $exportfile, $row, ',' );
        				
        			}
        			fclose ( $exportfile );
        		}
        	}
        	
        	$file = $exportFileName;
        	$filename = '????_'.date('YmdHi',microtime(true)).'.csv';
        	$type = filetype($file);
        	$today = date("F j, Y, g:i a");
        	$time = time();
        	header("Content-type: $type");
        	$filename = mb_convert_encoding(urlencode($filename), 'utf-8', 'SJIS');
        	header("Content-Disposition: attachment;filename*=UTF-8''$filename");
        	header("Content-Transfer-Encoding: binary");
        	header('Pragma: no-cache');
        	header('Expires: 0');
        	set_time_limit(0);
        	readfile($file);
        	exit();
        
       }
        /**
         * download for 4th button
         * @param null
         * @return null
         */
        public function downloadsendAction () {
        	$this->_helper->viewRenderer->setNoRender();
        	
        	$params = array(
        			'shipping_date_dialog' => $this->_getParam('shipping_date_dialog'),
        			'shop_list_dialog' => $this->_getParam('shop_list_dialog', '')
        	);
        	
    
    		
        	$orderCols = array(
        			'order_id',
        			'order_number',
        			'order_date',
        			'shipping_name',
        			'order_total',
    				'payment_method_id'				
    
    
        	);
        	
    		
    
        	$shipping = array(  'join_typ' => 'left'
        			,   'join_tbl' => 'shipping'
        			,   'join_cond' => 'order.shipping_id = shipping.shipping_id'
        			,   'join_cols' => array('shipping_date as shiptable_shipping_date', 'tracking_number as shipping_tracking_number')
        	);
        	
        	$delivery_company = array(  'join_typ' => 'left'
        			,   'join_tbl' => 'delivery_company'
        			,   'join_cond' => 'shipping.delivery_company_id = delivery_company.delivery_company_id'
        			,   'join_cols' => array('name as delivery_company_name')
        	);
        	$shop = array(  'join_typ' => 'left'
        			,   'join_tbl' => 'shop'
        			,   'join_cond' => 'order.shop_id = shop.shop_id'
        			,   'join_cols' => array('name as shop_name')
        	);
        	
    // 		$join_payment_method = array(  'join_typ' => 'left'
    // 					,   'join_tbl' => 'payment_method'
    // 					,   'join_cond' => 'order.payment_method_id = payment_method.method_id'
    // 					,   'join_cols' => array('name as payment_method_name')
    // 						);
        	$join_tbl = array(
        				$shipping
        			,   $delivery_company
        			,	$shop
        	);
        	$where = "  1 = 1  ";
        	$where .= " AND order.shipping_id <> -1";
        	
        	
        	if ($params['shipping_date_dialog'] != '')  {
        		$where .= " AND DATE(shipping.shipping_date) = '$params[shipping_date_dialog]'  ";
        		
        	}
        	
        	if (strcasecmp($params['shop_list_dialog'], 'AMAZON') == 0) {
        		$where .= " AND shop.name LIKE '%AMAZON%'";
        		$data = array( array(
        				'????',
        				'??????',
        				'???',
        				'???',
        				'???????',
        				'?????',
        				'??????????',
        				'????',
        				'????',
        		));
        	}	
        	else if (strcasecmp($params['shop_list_dialog'], 'Yahoo??????') == 0) {
        		$where .= " AND shop.name LIKE '%Yahoo??????%'";
        		$data = array( array(
        				'OrderID',
        				'OrderStatus',
        				'ShipMethod',
        				'ShipInvoiceNumber1',
        				'ShipInvoiceNumber2',
        				'ShipUrl',
        				'ShipDate'
        				));
        	}	
        	else if (strcasecmp($params['shop_list_dialog'], 'LINE MALL') == 0) {
        		$where .= " AND shop.name LIKE '%LINE MALL%'";
        		$data = array (array(
        				'order.id',
        				'order.status',
        				'order.delivered_on',
        				'order.delivery_agent',
        				'order.delivery_code'
        		));
        	}
        	else if (strcasecmp($params['shop_list_dialog'], 'JAMSHOPPING') == 0) {
        		$where .= " AND shop.name LIKE '%JAMSHOPPING%'";
        		$data = array(array(
        				'OrderID',
        				'OrderStatus',
        				'ShipDate',
        				'DeliveryAgent',
        				'TrackingNumber'
        		));
        	}
        	//hoi lai xem co can lam cho nay ko
        	/*
        	$user_id = $this->user['user_id'];
        	$user_role = array(  'join_typ' => 'left'
        			,   'join_tbl' => 'user_role'
        			,   'join_cond' => 'user.user_id = user_role.user_id'
        			,   'join_cols' => array('user_role.role_id', 'user_role.user_id')
        	);
        	
        	
        	$sql = "SELECT
    		    	`contract`.`contract_id`, `contract`.`admin_flag`
    		    	FROM
    		    	`user`
    		    	LEFT JOIN
    		    	`contract` ON user.contract_id = contract.contract_id
    		    	WHERE
    		    	(user.user_id = $user_id)";
        	$check_role = $this->_model->querySelectDB($sql);
        	if (isset($check_role) && count($check_role) > 0) {
    	    	if ($check_role[0]['admin_flag'] == 1) {
    		    	$is_admin = 'OK';
    		    }
    	    	else {
    	    		$is_admin = 'NG';
    		    }
    		}
    	    else {
    	    	$is_admin = 'NG';
        	}
        	$variation = array(  'join_typ' => 'left'
        			,   'join_tbl' => 'variation'
        			,   'join_cond' => 'order_detail.variation_id = variation.variation_id'
        			,   'join_cols' => array('')
        	);
        	
        	$product = array(  'join_typ' => 'left'
        			,   'join_tbl' => 'product'
        			,   'join_cond' => 'variation.product_id = product.product_id'
        			,   'join_cols' => array('')
        	);
    		if ($is_admin == 'NG') {
    			$where .= ' AND `product`.product_id IN (select
    									    `product`.product_id
    									from
    									    `user`
    									        left join
    									    `contract` ON `user`.contract_id = `contract`.contract_id
    									        left join
    									    `product` ON `contract`.contract_id = `product`.contract_id
    										where `user`.user_id = 1)';
    			array_push($join_tbl, $order_detail);
    			array_push($join_tbl, $variation);
    			array_push($join_tbl, $product);
    			 
    		}
    		*/
        	$res = $this->_model->joinDB('order', $orderCols, $join_tbl, $where);
    		foreach ($res as $row) {
        		if (strcasecmp($params['shop_list_dialog'], 'AMAZON') == 0) {
        			$tmp = array(
    						'order_number' => $row['order_number']
    					, 	'order_item_number' => '' //Pd
    					, 	'shipment' => '' //Pd
    					, 	'shipping_date' => $row['shiptable_shipping_date'] != '' ? date('Y-m-d H:i:s', strtotime($row['shiptable_shipping_date']) + 32400) : ''
    					, 	'delivery_company_code' => 'Other'
    					, 	'delivery_company_name' => $row['delivery_company_name']
    					, 	'shipping_tracking_number' => $row['shipping_tracking_number']
    					, 	'payment_method' => $row['payment_method_id'] == 1 ? '??????' : '??'
    					, 	'direct_payment' => $row['payment_method_id'] == 1 ? 'DirectPayment' : ''
    				);
    			}
    			else if (strcasecmp($params['shop_list_dialog'], 'Yahoo??????') == 0) {
    				
    				$tmp = array(
    						'order_number' => $row['order_number']
    					, 	'order_status' => '??' 
    					, 	'ship_method' => '' //Pd
    					, 	'shipping_voice_number_1' => $row['shipping_tracking_number']
    					, 	'shipping_voice_number_2' => '' //Pd
    					, 	'ship_url' => '' //Pd
    					, 	'shipping_date' => $row['shiptable_shipping_date'] != '' ? date('Y/m/d', strtotime($row['shiptable_shipping_date'])) : ''
    					);
    			}
    			else if (strcasecmp($params['shop_list_dialog'], 'LINE MALL') == 0) {
    				$tmp = array(
    							'order_number' => $row['order_number']
    						, 	'order_status' => 'delivered'
    						, 	'shipping_date' => $row['shiptable_shipping_date'] != '' ? date('Y/m/d', strtotime($row['shiptable_shipping_date'])) : ''
    						,	'delivery_company' => $row['delivery_company_name']
    						,	'shipping_tracking_number' => $row['shipping_tracking_number']
    	
    				);	
    			}
    			else if (strcasecmp($params['shop_list_dialog'], 'JAMSHOPPING') == 0) {
    				$tmp = array(
    							'order_number' => $row['order_number']
    						, 	'order_status' => 'delivered'
    						, 	'shipping_date' => $row['shiptable_shipping_date'] != '' ? date('Y/m/d', strtotime($row['shiptable_shipping_date'])) : ''
    						,	'delivery_company' => $row['delivery_company_name']
    						,	'shipping_tracking_number' => $row['shipping_tracking_number']
    			
    				);
    			}
    			array_push($data, $tmp);
    		}  
    		
    			  	
        	$dir_upload = APPLICATION_PATH. '/../public/uploads/csvs/';
        	$exportFileName = $dir_upload.'????_.csv';
        	if(file_exists($exportFileName))
        	{
        		unlink($exportFileName);
        	}
    //     	$checked = $this->_getParam('checked', 0);
    //     	$rowChecked = str_split($this->_getParam('row_checked', ''));
        	//die($checked);
        	if (isset($data)) {
        		if (($exportfile = fopen ( $exportFileName , 'a+' )) !== FALSE) {
        			foreach ($data as $key => $row) {
        				fputcsv ( $exportfile, $row, ',' );
        			}
        			fclose ( $exportfile );
        		}
        	}
        	 
        	$file = $exportFileName;
        	$filename = '????_'.date('YmdHi',microtime(true)).'.csv';
        	//$filename = '????_button-4_'.date('YmdHi', microtime(true)).'.csv';
        	$type = filetype($file);
        	$today = date("F j, Y, g:i a");
        	$time = time();
        	header("Content-type: $type");
        	$filename = mb_convert_encoding(urlencode($filename), 'utf-8', 'SJIS');
        	header("Content-Disposition: attachment;filename*=UTF-8''$filename");
        	header("Content-Transfer-Encoding: binary");
        	header('Pragma: no-cache');
        	header('Expires: 0');
        	set_time_limit(0);
        	readfile($file);
        	exit();
        }
    /**
     * export excel file
     * @param null
     * @return null
     * @access public
     */
    public function exportAction() {
    	$objPHPExcel = new PHPExcel();
    	// Define Style
    	$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    	$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
    	// Style border
    	$styleArray = array(
    			'borders' => array(
    					'outline' => array(
    							'style' => PHPExcel_Style_Border::BORDER_THIN,
    							'color' => array('hex' => 'FFFFFF'),
    					),
    			),
    	);
    	$boderInside = array(
    			'borders' => array(
    					'outline' => array(
    							'style' => PHPExcel_Style_Border::BORDER_THIN,
    							'color' => array('hex' => 'FFFFFF'),
    					),
    					'inside' => array(
    							'style' => PHPExcel_Style_Border::BORDER_THIN,
    							'color' => array('hex' => 'FFFFFF'),
    					),
    			),
    	);
    	$diagonalStyle = array(
    			'diagonal' => array( 'style' => PHPExcel_Style_Border::BORDER_THIN,
    					'color' => array( 'rgb' => 'FF0000')
    			),
    			'diagonaldirection' => PHPExcel_Style_Borders::DIAGONAL_DOWN
    				
    	);
    	$boderBold = array(
    			'borders' => array(
    					'outline' => array(
    							'style' => PHPExcel_Style_Border::BORDER_THICK,
    							'color' => array('hex' => 'FF0000'),
    					),
    					'inside' => array(
    							'style' => PHPExcel_Style_Border::BORDER_THIN,
    							'color' => array('hex' => '00FF00'),
    					),
    			),
    	);
    	//Style Fill color
    	$fillColorViolet = array(
    			'fill' => array(
    					'type' => PHPExcel_Style_Fill::FILL_SOLID,
    					'color' => array('rgb'=>'CC99FF'),
    			),
    	);
    	$sheet = 0; //Num of sheet
    	$worksheet = $objPHPExcel->getActiveSheet();
    	// Setting page
    	$worksheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    	$worksheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    	// Set Page margin.
    	$worksheet->getPageMargins()->setTop(0.4);
    	$worksheet->getPageMargins()->setRight(0.25);
    	$worksheet->getPageMargins()->setLeft(0.5);
    	$worksheet->getPageMargins()->setBottom(0.24);
    	// Setting font
    	$objPHPExcel->getDefaultStyle()->getFont()->setName('Meiryo UI');
    	$objPHPExcel->getDefaultStyle()->getFont()->setSize(9);
    	// Set width of column
    	$worksheet->getColumnDimension('A')->setWidth(26.00);
    	$worksheet->getColumnDimension('B')->setWidth(17.57);
    	$worksheet->getColumnDimension('C')->setWidth(12.86);
    	$worksheet->getColumnDimension('D')->setWidth(17.00);
    	$worksheet->getColumnDimension('E')->setWidth(16.57);
    	$worksheet->getColumnDimension('F')->setWidth(22.00);
    	$worksheet->getColumnDimension('G')->setWidth(18.00);
    	$worksheet->getColumnDimension('H')->setWidth(16.86);
    	$worksheet->getColumnDimension('I')->setWidth(20.43);
    	
    
    
    	// Fill headers
    	$headers = array();
    	$headers[0] = 'order_date';
    	$headers[1] = 'order_number';
    	$headers[2] = 'shop_name';
    	$headers[3] = 'shipping_name';
    	$headers[4] = 'order_total';
    	$headers[5] = 'payment_method_name';
    	$headers[6] = 'order_status_name';
    	$headers[7] = '??';
    	$headers[8] = '??';
    	
    	// Columns
    	$columns = array();
    	$columns[0] = '???';
    	$columns[1] = '????';
    	$columns[2] = '?????';
    	$columns[3] = '????';
    	$columns[4] = '????';
    	$columns[5] = '????? ';
    	$columns[6] = '????';
    	$columns[7] = '??';
    	$columns[8] = '??';
    	
    
    	for ($i = 0; $i < count($columns); $i++){
    		$worksheet->setCellValueByColumnAndRow($i, 1, $columns[$i]);
    	}
    	// Fill data from for structure
    	$params = array(
    				//gets row by row: from left to right, up to down
    				$this->_getParam('order_number_from', ''),  //0
    				$this->_getParam("order_number_to", ''),    //1
    				$this->_getParam("order_status", '0'),        //2
    				$this->_getParam('order_date_from', '') != '' ? date('Y-m-d', strtotime($this->_getParam('order_date_from', ''))) : '',     //3
    				$this->_getParam('order_date_to', '') != '' ? date('Y-m-d', strtotime($this->_getParam('order_date_to', ''))) : '',       //4
    				$this->_getParam('shipping_name', ''),        //5
    				$this->_getParam('shipping_mailaddress', ''), //6
    		);
    		
    		$orderCols = array(
    				'order_id',
    				'order_number',
    				'order_date',
    				'shipping_name',
    				'order_total',
    		);
    		
    		$join_shop = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'shop'
    				,   'join_cond' => 'order.shop_id = shop.shop_id'
    				,   'join_cols' => array('name as shop_name')
    		);
    		
    		$join_payment_method = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'payment_method'
    				,   'join_cond' => 'order.payment_method_id = payment_method.method_id'
    				,   'join_cols' => array('name as payment_method_name')
    		);
    		
    		$join_order_status = array(  'join_typ' => 'left'
    				,   'join_tbl' => 'order_status'
    				,   'join_cond' => 'order.order_status_id = order_status.status_id'
    				,   'join_cols' => array('name as order_status_name')
    		);
    		
    		
    		$join_tbl = array(
    					$join_shop
    				,   $join_payment_method
    				,	$join_order_status
    		);    		
    		$where = "  1 = 1  ";
    		    		
    		if( $params[0] != '' ) {
    			$where .= " AND order_number >= $params[0] ";
    		} 
    		if( $params[1] != '' ) {
    			$where .= " AND order_number <= $params[1] ";
    		} 
    		
    		if( $params[2] != 0 ) {
	    		$where .= " AND order_status_id = $params[2]  ";
    		} 
    		if( $params[3] != '' ) {
    			$where .= " AND order_date >= '$params[3]' ";
    		} 
    		if( $params[4] != '' ) {
    			$where .= " AND order_date <= '$params[4]' ";
    		} 
    		if( $params[5] != '' ) {
	    		$where .= " AND " . new Zend_Db_Expr("INSTR(IFNULL(shipping_name, ''), '$params[5]') > 0") ; 
    		} 
    		if( $params[6] != '' ) {
	    		$where .= " AND " . new Zend_Db_Expr("INSTR(IFNULL(shipping_mailaddress, ''), '$params[6]') > 0");
    		} 
	    		
    		$shopList = str_split($this->_getParam('shop_list', ''));
    		
    		if ((is_array($shopList)) && (count($shopList) > 0)) {
    			$shopSearch = '';
    			foreach ( $shopList as $key => $value ) {
    				$shopSearch .= $value;
    			}
    			//$shopSearch = substr($shopSearch, 0, -1);
    			if( $shopSearch != '' ) {
    				$where .= ' AND order.shop_id '.new Zend_Db_Expr("IN($shopSearch)");
    			}
    		}
    		
    		$rowChecked = str_split($this->_getParam('row_checked', ''));
    		
    	//var_dump($rowChecked);die;
    	$j = 2;
    	try {
    		//tam duoc
    		$data = $this->_model->joinDB('order', $orderCols, $join_tbl, $where);
    		
    		if (isset($data)) {
    			foreach ($data as $key => $row) {
    				if (in_array($key, $rowChecked)) {
	    				$i = 0;
	    				$objPHPExcel->getActiveSheet()->getStyle('B'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	    				$objPHPExcel->getActiveSheet()->getStyle('E'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
	    				$objPHPExcel->getActiveSheet()->getStyle('H'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    				$worksheet->getStyle('A'.$j.':I'.$j)->getAlignment()->setWrapText(true);
	    				foreach ($headers as $header) {
	    					if ($header == 'order_date') {
	    						$row[$header] = date('Y/m/d H:i:s', strtotime($row['order_date']));
	    					}
	    					if ($header == '??') {
	    						$row[$header] = '??'; 
	    					} 
	    					
	    					$worksheet->setCellValueByColumnAndRow($i, $j, $row[$header]);
	    					$i++;
	    				}
	    				$j++;
    				}
    			}
    		}
    		// Apply style
    		$styleArray = array(
    				'font'  => array(
    						'bold'  => true,
    						'size'  => 9,
    						'name'  => 'Meiryo UI'
    				));
    		$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray);
    		$worksheet->getStyle('A1:I'.($j-1))->applyFromArray($boderInside);
    		$worksheet->getStyle('A1:I'.($j-1))->applyFromArray($boderBold);
    			
    		ob_end_clean();
    		// Redirect output to a client’s web browser (Excel2007)
    		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    		$name = '????_' . date('Ymdhi', microtime(true));
    		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
    			$name = mb_convert_encoding(urlencode($name), 'utf-8', 'SJIS');
    		}
    		//$i = 0;
    		header('Content-Disposition: attachment;filename="'.$name.'.csv"');
    		header('Cache-Control: max-age=0');
    		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
    		ob_end_clean();
    		$objWriter->save('php://output');
    		exit;
    	}
    	catch (Exception $ex) {
    		$this->_helper->redirector('error', 'error', 'error');
    	}
    }
    
    
    /*============================================A19==========================================*/
    
    /**
     * A-19 order detail
     * @param null
     * @return null
     */
    public function detailAction()
    {
    	$this->view->title= '????';
    	$order_id = $this->_getParam('id', 0);
    	$orderCols = array(
    			'order_id',
    			'order_number',
    			'shipping_name',
    			'product_total',
    			'tax_total',
    			'postage',
    			'fee',
    			'use_point',
    			'order.orther_discount_total',
    			'order.order_total',
    			'order.memo',
    			'order_date',
    			'order.purchaser_name',
    			'order.purchaser_read_name',
    			'order.purchaser_zipcode',
    			'order.purchaser_address',
    			'order.purchaser_phone_number',
    			'order.purchaser_mailaddress',
    			'order.shipping_read_name',
    			'order.shipping_zipcode',
    			'order.shipping_address',
    			'order.shipping_phone_number',
    			'order.shipping_mailaddress',
    			'order.appointed_date',
    			'order.order_status_id',
    			'order.appointed_time',
    			//'order.shipping_id',
    			'order.shipping_region_id'
    
    	);
    	 
    	$join_shop = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'shop'
    			,   'join_cond' => 'order.shop_id = shop.shop_id'
    			,   'join_cols' => array('name as shop_name', 'icon_image_id as shop_icon_image_id', 'contract_id as shop_contract_id',
    					'delivery_company_id as shop_delivery_company_id'
    			)
    	);
    	 
    	$purchase_category = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'purchase_category'
    			,   'join_cond' => 'order.purchase_category_id = purchase_category.category_id'
    			,   'join_cols' => array('name as purchase_category_name')
    	);
    	 
    	$shipping = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'shipping'
    			,   'join_cond' => 'order.shipping_id = shipping.shipping_id'
    			,   'join_cols' => array('IFNULL(shipping.shipping_id, 0) as shipping_id', 'shipping.delivery_company_id as shipping_delivery_company_id', 'shipping_date as shiptable_shipping_date', 'tracking_number as shipping_tracking_number')
    	);
    	 
    	 
    	$return_status = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'return_status'
    			,   'join_cond' => 'order.return_status_id = return_status.status_id'
    			,   'join_cols' => array('return_status.name as return_status_name')
    	);
    	 
    	$join_payment_method = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'payment_method'
    			,   'join_cond' => 'order.payment_method_id = payment_method.method_id'
    			,   'join_cols' => array('name as payment_method_name')
    	);
    	 
    	$regionPurchaser = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'region as t1'
    			,   'join_cond' => 'order.purchaser_region_id = t1.region_id'
    			,   'join_cols' => array('name as region_purchaser_name')
    	);
    	 
    	$regionShipping = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'region as t2'
    			,   'join_cond' => 'order.shipping_region_id = t2.region_id'
    			,   'join_cols' => array('name as region_shipping_name')
    	);
    	 
    	$appoint_time = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'appoint_time'
    			,   'join_cond' => 'order.appointed_time = appoint_time.appoint_time_id'
    			,   'join_cols' => array('name as appoint_time_name')
    	);
    	 
    	$join_order_status = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'order_status'
    			,   'join_cond' => 'order.order_status_id = order_status.status_id'
    			,   'join_cols' => array('name as order_status_name')
    	);
    	 
    	$join_contract = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'contract'
    			,   'join_cond' => 'shop.contract_id = contract.contract_id'
    			,   'join_cols' => array('contract.contract_id')
    	);
    	 
    	$join_contractor_shipping_ready = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'contractor_shipping_ready'
    			,   'join_cond' => 'order.order_id = contractor_shipping_ready.order_id'
    			,   'join_cols' => array('IFNULL(shipping_ready_id, 0) AS contractor_shipping_ready_id')
    	);
    	 
    	$contractor_shipping = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'contractor_shipping'
    			,   'join_cond' => 'contractor_shipping_ready.shipping_id = contractor_shipping.shipping_id'
    			,   'join_cols' => array('IFNULL(contractor_shipping.shipping_id, 0) as contractor_shipping_id', 'contractor_shipping.delivery_company_id as contractor_shipping_delivery_company_id' ,'shipping_date as contractor_shipping_date', 'tracking_number as contractor_shipping_tracking_number')
    	);
    	 
    	$join_delivery = array(  'join_typ' => 'left'
    			,   'join_tbl' => 'delivery'
    			,   'join_cond' => 'shop.delivery_id = delivery.delivery_id'
    			,   'join_cols' => array('name as delivery_name', 'read_name as delivery_read_name',
    					'zipcode as delivery_zipcode',
    					'region_id as delivery_region_id',
    					'address as delivery_address' ,
    					'phone_number as delivery_phone_number'
    			)
    	);
		$join_image = array(  'join_typ' => 'left'
					,   'join_tbl' => 'image'
					,   'join_cond' => 'shop.icon_image_id = image.image_id'
					,   'join_cols' => array('image.path')
		    	   );
 
    	$where = "  1 = 1  AND order.order_id = $order_id";
    	 
    	$join_tbl = array(
    			$join_shop
    			,	$purchase_category
    			,	$shipping
    			,	$return_status
    			,   $join_payment_method
    			,	$regionPurchaser
    			,	$regionShipping
    			,	$appoint_time
    			,	$join_order_status
    			,	$join_contract
    			, 	$join_contractor_shipping_ready
    			, 	$contractor_shipping
    			,	$join_delivery
				,	$join_image
    	);
    	 
    	$data = $this->_model->joinDB('order', $orderCols, $join_tbl, $where, array(), TRUE, array('order.order_id'));
    	//var_dump($data[0]);die;
    	if (isset($data[0])) {
			$shopImageName = explode('.', substr(strrchr($data[0]['path'], "/"), 1));  // -> 121|abc.jpg
	    	$encryptString = explode('|', $shopImageName[0]);   // 121 and abc
	    	if (isset($encryptString[0]) && isset($encryptString[1])) {
		    	$data[0]['path'] = substr($data[0]['path'], 0, strrpos($data[0]['path'], "/")+1) . md5($encryptString[0].$encryptString[1]) . '.' . end($shopImageName);
	    	}
    		$this->view->data = $data[0];
    	}
    	//check cac truong hop Trong các order detail, n?u có 1 detail khác v?i contract c?a order site thì s? cho hi?n th? ra.
    	$contract_id = 0;
    	if (isset($data[0])) {
    		$contract_id = $data[0]['contract_id'];
    	}
    	$sql = "select
			    	`order_detail`.order_detail_id,
			    	`contract`.contract_id
			    	from `order_detail`
			    	left join `variation`
			    	on `order_detail`.variation_id = `variation`.variation_id
			    	left join `product`
			    	on `variation`.product_id = `product`.product_id
			    	left join `contract`
			    	on `product`.contract_id =  `contract`.contract_id
			    	where `order_detail`.order_id = $order_id and `contract`.contract_id <> $contract_id ";
    	$res = $this->_model->querySelectDB($sql);
    	if (isset($res) && is_array($res) && count($res) > 0) {
    		$this->view->check_order_detail_contract = 'OK';
    	}
    	else {
    		$this->view->check_order_detail_contract = 'NG';
    	}
    
    	//check Tru?ng h?p trong order dù ch? có 1 s?n ph?m thu?c login user thì cung set là selectbox
    	$user_id = $this->user['user_id'];
    	$sqlUserProduct = "select
					    	`order_detail`.order_detail_id
					    	from `order_detail`
					    	left join `variation`
					    	on `order_detail`.variation_id = `variation`.variation_id
					    	left join `product`
					    	on `variation`.product_id = `product`.product_id
					    	where `order_detail`.order_id = $order_id
					    	and `product`.product_id IN (
					    	select
					    	`product`.product_id
					    	from
					    	`user`
					    	left join
					    	`contract` ON `user`.contract_id = `contract`.contract_id
					    	left join
					    	`product` ON `contract`.contract_id = `product`.contract_id
					    	where
					    	`user`.user_id = $user_id
					    	)";
    	$user_product = $this->_model->querySelectDB($sqlUserProduct);
    	//var_dump($check_user_product);die();
    	if (isset($user_product) && is_array($user_product) && count($user_product) > 0) {
    		$this->view->check_user_product = 'OK';
    	}
    	else {
    		$this->view->check_user_product = 'NG';
    	}
    	 
    	//get order status which has name is ????
    	$order_status_id = $this->_model->selectDB('order_status', array('status_id', 'name'), "name = '????' ");
    	if ($order_status_id[0]['status_id'] == $data[0]['order_status_id']) {
    		$this->view->check_order_status = 'OK';
   		}
   
    	$orderStatuses = $this->_model->selectDB('order_status', array('status_id', 'name'));
        $this->view->orderStatuses = $orderStatuses;
        	 
        $appointTime  = $this->_model->selectDB('appoint_time', array('appoint_time_id', 'name'));
        $this->view->appointTime = $appointTime;
        $delivery_company = $this->_model->selectDB('delivery_company', array('delivery_company_id', 'name'));
        	 
        $this->view->order_id = $order_id;
        $this->view->delivery_company = $delivery_company;
        //var_dump($delivery_company);die;
        //check Tru?ng h?p order.shop_id không ph?i là user qu?n lý c?a login user thì không th? edit
        if (isset($data[0])) {
        	if ($data[0]['shop_contract_id'] == $this->user['contract_id']) {
        		$this->view->check_user_manage_shop = 'OK';
    		}
	    	else {
	    		$this->view->check_user_manage_shop = 'NG';
    		}
    	}
	    //var_dump($this->view->check_user_manageshop);die;
	     
	    //-------------------------------------TAB 2-------------------------------
	    $order_detail_cols = array(
	    'order_detail_id',
	    	'price',
	    	'order_quantity',
	    	'return_quantity'
	    );
	     
	    $join_variation =  array(  'join_typ' => 'left'
						    ,   'join_tbl' => 'variation'
						    ,   'join_cond' => 'order_detail.variation_id = variation.variation_id'
						    ,   'join_cols' => array('product_id as variation_shop_id')
	        				);
	        			 
        $join_product =  array(  'join_typ' => 'left'
    						,   'join_tbl' => 'product'
        					,   'join_cond' => 'variation.product_id = product.product_id'
        					,   'join_cols' => array('product_id as product_id', 'name as product_name')
        					);
	        					 
	    $join_product_image = array(  'join_typ' => 'left'
	        				,   'join_tbl' => 'product_image'
	    					,   'join_cond' => 'product.product_id = product_image.product_id and product_image.order_number = 1'
	        				,   'join_cols' => array('small_image_id')
	        				);
	    $join_image = array(  'join_typ' => 'left'
			    			,   'join_tbl' => 'image'
			    			,   'join_cond' => 'product_image.small_image_id = image.image_id'
			    			,   'join_cols' => array('image.path')
			        			);
        $join_tbl = array(
        					$join_variation
    					,	$join_product
        				, 	$join_product_image
        				,	$join_image
	    				);
	    $where = "  1 = 1  AND order_detail.order_id = $order_id";
	        					 
	    $data2 = $this->_model->joinDB('order_detail', $order_detail_cols, $join_tbl, $where, array(), TRUE);
	    if (isset($data2)) {
			for ($i = 0; $i < count($data2); $i++) {
				//get time and image name
				//$tmp = explode('|', end(explode('/', explode('.', $row['path'])[0])));
				$imageName = explode('.', substr(strrchr($data2[$i]['path'], "/"), 1));  //121|abc.jpg
				$encryptString = explode('|', $imageName[0]);   // 121 and abc
				if (isset($encryptString[0]) && isset($encryptString[1])) {
					$data2[$i]['path'] = substr($data2[$i]['path'], 0, strrpos($data2[$i]['path'], "/")+1) . md5($encryptString[0].$encryptString[1]) . '.' . end($imageName); 
				}
				//var_dump($row['path']);die;
			}
		}    	 
		$this->view->data2 = $data2;
		//var_dump($data2[0]['path']);die;
        	 
    }
    /**
     * change status on the left
     * @param null
     * @return null
     */
    public function changestatusAction() {
    	$this->_helper->layout->disableLayout();
    	$data = array(
    			'init_order_status_name' => $this->_getParam('init_order_status_name', ''),
    			'shiptable_shipping_date' => $this->_getParam('shiptable_shipping_date', ''),
    			'delivery_company_id' => $this->_getParam('delivery_company_id', 0),
    			'shop_delivery_company_id' => $this->_getParam('shop_delivery_company_id', 0),
    			'shipping_tracking_number' => $this->_getParam('shipping_tracking_number', ''),
    			'check_user_manage_shop' => $this->_getParam('check_user_manage_shop', '')
    	);
    	$this->view->data = $data;
    	$orderStatuses = $this->_model->selectDB('order_status', array('status_id', 'name'));
    	if ($this->_getParam('order_status', '') == '????') {
    		$this->view->order_status = 'OK';
    	} 
    	else {
    		$this->view->order_status = 'NG';
    	}
    	
    	$delivery_company = $this->_model->selectDB('delivery_company', array('delivery_company_id', 'name'));
    	$this->view->delivery_company = $delivery_company;
    	$this->view->check_user_manage_shop = $this->_getParam('check_user_manage_shop', '');
    }
    
    /**
     * change status on the right
     * @param null
     * @return null
     */
    public function changestatuscontractAction() {
    	$this->_helper->layout->disableLayout();
    	$data = array(
    			'init_order_status_name' => $this->_getParam('init_order_status_name', ''),
    			'contractor_shipping_date' => $this->_getParam('contractor_shipping_date', ''),
    			'delivery_company_id' => $this->_getParam('delivery_company_id', 0),
    			'shop_delivery_company_id' => $this->_getParam('shop_delivery_company_id', 0),
    			'contractor_shipping_tracking_number' => $this->_getParam('contractor_shipping_tracking_number', ''),
    			'check_user_manage_shop' => $this->_getParam('check_user_manage_shop', '')
    	);
    	$this->view->data = $data;
    	$orderStatuses = $this->_model->selectDB('order_status', array('status_id', 'name'));
    	if ($this->_getParam('order_status', '') == '????') {
    		$this->view->order_status = 'OK';
    	}
    	else {
    		$this->view->order_status = 'NG';
    	}
    	 
    	$delivery_company = $this->_model->selectDB('delivery_company', array('delivery_company_id', 'name'));
    	$this->view->delivery_company = $delivery_company;
    	$this->view->check_user_manage_shop = $this->_getParam('check_user_manage_shop', '');
    	
    }
    /**
     * save A19
     * @param null
     * @return null
     */
    public function saveAction() {
    	$this->_helper->viewRenderer->setNoRender();
//     	$params = array(
//     			$this->user['company_cd'],
    	
//     			$this->_getParam('work_flow_no', ''),
//     			$this->_getParam('line_no', ''),
//     			$this->_getParam('handle_finish_date', ''),
//     			$this->_getParam('cnt', '0'),
    	
//     			$this->user['user_id'],
//     			$_SERVER['REMOTE_ADDR']
//     	);
    	$order_id = $this->_getParam('order_id');
    	$memo = trim($this->_getParam('memo', ''));
    	$order_status = $this->_getParam('order_statuses');
    	$shipping_id = $this->_getParam('shipping_id');
    	$shiptable_shipping_date = $this->_getParam('shiptable_shipping_date');
    	$contractor_shipping_date = $this->_getParam('contractor_shipping_date');
    	$shipping_tracking_number = $this->_getParam('shipping_tracking_number');
    	$contractor_shipping_tracking_number = $this->_getParam('contractor_shipping_tracking_number');
    	
    	
    	//tab 2
    	$order_detail_id = $this->_getParam('order_detail_id', array());
    	$return_quantity = $this->_getParam('return_quantity', array());
    	//var_dump($return_quantity);die;
    	
    	$return_status_id = 0;
    	$sum_order_quantity = $this->_getParam('sum_order_quantity', 0);
    	$sum_return_quantity = $this->_getParam('sum_return_quantity', 0);
    	if ($sum_return_quantity == 0) {
    		$return_status_id = 1;
    	}
    	else if ($sum_order_quantity == $sum_return_quantity) {
    		$return_status_id = 3;
    	}
    	else {
    		$return_status_id = 2;
    	}
    	
    	
    	$data_order = array(
    			'memo' => $memo, 
    			//'order_status_id' => $order_status,
    			'return_status_id' => $return_status_id, 
    			'modified_date' => date('Y/m/d H:i:s')
    	);
    	$data2 = array(
    			'shipping_date' => $shiptable_shipping_date, 
    			'tracking_number' => $shipping_tracking_number, 
    			'modified_date' => date('Y/m/d H:i:s')
    	);
    	$data3 = array(
    			'shipping_date' => $contractor_shipping_date,
    			'tracking_number' => $contractor_shipping_tracking_number,
    			'modified_date' => date('Y/m/d H:i:s')
    	);
		
    	
    	
    	
    
    	$err = false;
    	if (($this->_model->updateDB('order', $data_order, "order_id = $order_id")) != 'ok') {
    		$err = true;
    	}
    	$order_status_id = $this->_model->selectDB('order_status', array('status_id', 'name'), "name = '????' ");
    	//var_dump($order_status);die;
    	
    	
    	//save for shipping table
    	//die($order_status);
    	if ($order_status == '????') {
    		//die($data_shipping);
    		//update
    		if ($shipping_id != 0 ) {
    			$data_shipping = array(
    					'shipping_date' => date('Y/m/d H:i:s'),  // or $this->_getParam('shiptable_shipping_date', ''), ???
    					'delivery_company_id' => $this->_getParam('shipping_delivery_company', 0),
    					'tracking_number' => $this->_getParam('shipping_tracking_number', 0),
    					'shipping_name' => $this->_getParam('shipping_name', ''),
    					'shipping_read_name' => $this->_getParam('shipping_read_name', ''),
    					'shipping_zipcode' => $this->_getParam('shipping_zipcode', ''),
    					'shipping_region_id' => $this->_getParam('shipping_region_id', 0),
    					'shipping_address' => $this->_getParam('shipping_address', ''),
    					'shipping_phone_number' => $this->_getParam('shipping_phone_number', 0),
    					'shipping_meiladdress' => $this->_getParam('shipping_mailaddress', ''),
    					'appoint_date' => $this->_getParam('appointed_date', ''),
    					'appoint_time_id' => $this->_getParam('appoint_time', 0),
    					'product_total' => $this->_getParam('order_total', 0),
    					'arrival_date' => NULL,
    					'modified_date' => date('Y/m/d H:i:s')
    			);
    			//die('aaa');
    			if (($this->_model->updateDB('shipping', $data_shipping, "shipping_id = $shipping_id")) != 'ok') {
    				$err = true;
    			}
    			
    		} 
    		//insert
    		else {
    			$data_shipping = array(
    					'shipping_id' => (int)$this->_model->getMaxPrk('shipping', 'shipping_id') + 1,
    					'shipping_date' => date('Y/m/d H:i:s'),  //$this->_getParam('shiptable_shipping_date', ''),
    					'delivery_company_id' => $this->_getParam('shipping_delivery_company', 0),
    					'tracking_number' => $this->_getParam('shipping_tracking_number', 0),
    					'shipping_name' => $this->_getParam('shipping_name', ''),
    					'shipping_read_name' => $this->_getParam('shipping_read_name', ''),
    					'shipping_zipcode' => $this->_getParam('shipping_zipcode', ''),
    					'shipping_region_id' => $this->_getParam('shipping_region_id', 0),
    					'shipping_address' => $this->_getParam('shipping_address', ''),
    					'shipping_phone_number' => $this->_getParam('shipping_phone_number', 0),
    					'shipping_meiladdress' => $this->_getParam('shipping_mailaddress', ''),
    					'appoint_date' => $this->_getParam('appointed_date', ''),
    					'appoint_time_id' => $this->_getParam('appoint_time', 0),
    					'product_total' => $this->_getParam('order_total', 0),
    					'arrival_date' => NULL,
    					'create_date' => date('Y/m/d H:i:s')
    			);
    			//die($this->_model->insertDB('shipping', $data_shipping));
    			if(($this->_model->insertDB('shipping', $data_shipping)) != 'ok') {
    				$err = true;
    			}
    		}
	    	
    	}
    	
    	
    
    	//save for contractor_shipping_ready table
    	
    	$contractor_shipping_ready_id = $this->_getParam('contractor_shipping_ready_id', 0);
    	$sqlCtrShipReady =  "select
								max(shipping_ready_number) as shipping_ready_number
								from `contractor_shipping_ready`
								where `contractor_shipping_ready`.order_id = 1
								group by order_id";
    	
    	$maxShReadyNumber = $this->_model->querySelectDB($sqlCtrShipReady);
    	//die($maxShReadyNumber[0]['shipping_ready_number']);
    	$contractor_shipping_order_statuses = $this->_getParam('contractor_shipping_order_statuses', '');
    	//die($contractor_shipping_order_statuses);
    	if ($contractor_shipping_order_statuses == '????') {
    		if ($contractor_shipping_ready_id != 0) {
    			$data_contractor_shipping_ready = array(
    					'order_id' => $order_id,
    					//'shipping_ready_number' => shipping_ready_number ,
    					'shipping_ready_date' => date('Y/m/d H:i:s'),
    					'shipping_id' => NULL,
    					'modified_date' => date('Y/m/d H:i:s')
    			
    			);
    			//die('aasa');
				if (($this->_model->updateDB('contractor_shipping_ready', $data_contractor_shipping_ready, "shipping_ready_id = $contractor_shipping_ready_id")) != 'ok') {
					$err = true;    		
				}
    		}
    		//insert 
    		else {
    			$data_contractor_shipping_ready = array(
    					'shipping_ready_id' => (int)$this->_model->getMaxPrk('contractor_shipping_ready', 'shipping_ready_id') + 1,
    					'order_id' => $order_id,
    					'shipping_ready_number' => $maxShReadyNumber[0]['shipping_ready_number'] + 1,
    					'shipping_ready_date' => date('Y/m/d H:i:s'),
    					'shipping_id' => NULL,
    					'create_date' => date('Y/m/d H:i:s')
    					 
    			);
    			//die('tuan');
    			//die($this->_model->insertDB('contractor_shipping_ready', $data_contractor_shipping_ready));
    			if(($this->_model->insertDB('contractor_shipping_ready', $data_contractor_shipping_ready)) != 'ok') {
    				$err = true;
    			}
    		}
    	}
    	
		//save for contractor_shipping table    
		$contractor_shipping_id = $this->_getParam('contractor_shipping_id', 0);
		//var_dump($contractor_shipping_id);die;
    	if ($contractor_shipping_order_statuses == '????') {
    		//die($data_shipping);
    		//update
    		if ($contractor_shipping_id != 0 ) {
    			$data_contractor_shipping = array(
    					'shipping_date' =>  date('Y/m/d H:i:s'), // or $this->_getParam('contractor_shipping_date', ''),
    					'delivery_company_id' => $this->_getParam('contractor_shipping_delivery_company', 0),
    					'tracking_number' => $this->_getParam('contractor_shipping_tracking_number', 0),
    					'shipping_name' => $this->_getParam('contractor_shipping_name', ''),
    					'shipping_read_name' => $this->_getParam('contractor_shipping_read_name', ''),
    					'shipping_zipcode' => $this->_getParam('contractor_shipping_zipcode', ''),
    					'shipping_region_id' => $this->_getParam('contractor_shipping_region_id', 0),
    					'shipping_address' => $this->_getParam('contractor_shipping_address', ''),
    					'shipping_phone_number' => $this->_getParam('contractor_shipping_phone_number', 0),
    					'appoint_date' => NULL,
    					'appoint_time_id' => NULL,
    					'product_total' => $this->_getParam('sum_price', 0),
    					'arrival_date' => NULL,
    					'modified_date' => date('Y/m/d H:i:s')
    			);
    			//die('aaa');
    			if (($this->_model->updateDB('contractor_shipping', $data_contractor_shipping, "shipping_id = $contractor_shipping_id")) != 'ok') {
    				$err = true;
    			}
    			 
    		}
    		//insert
    		else {
    			$data_contractor_shipping = array(
    					'shipping_id' => (int)$this->_model->getMaxPrk('contractor_shipping', 'shipping_id') + 1,
    					'shipping_date' =>  date('Y/m/d H:i:s'), // or $this->_getParam('contractor_shipping_date', ''),
    					'delivery_company_id' => $this->_getParam('contractor_shipping_delivery_company', 0),
    					'tracking_number' => $this->_getParam('contractor_shipping_tracking_number', 0),
    					'shipping_name' => $this->_getParam('contractor_shipping_name', ''),
    					'shipping_read_name' => $this->_getParam('contractor_shipping_read_name', ''),
    					'shipping_zipcode' => $this->_getParam('contractor_shipping_zipcode', ''),
    					'shipping_region_id' => $this->_getParam('contractor_shipping_region_id', 0),
    					'shipping_address' => $this->_getParam('contractor_shipping_address', ''),
    					'shipping_phone_number' => $this->_getParam('contractor_shipping_phone_number', 0),
    					'appoint_date' => NULL,
    					'appoint_time_id' => NULL,
    					'product_total' => $this->_getParam('sum_price', 0),
    					'arrival_date' => NULL,
    					'create_date' => date('Y/m/d H:i:s')
    			);
    			//die($this->_model->insertDB('shipping', $data_shipping));
    			if(($this->_model->insertDB('contractor_shipping', $data_contractor_shipping)) != 'ok') {
    				$err = true;
    			}
    		}
    	
    	}
    	
    	//save for order_detail table
    	$arrQuantityUpdate = array();
    	$arrQuantityUpdate['modified_date'] = date('Y/m/d H:i:s');
    	
    	$countRow = count($order_detail_id); 
    	if (($countRow == count($return_quantity)) && ($countRow > 0)) {
    		for ($i = 0; $i < $countRow ; $i++) {
    			$arrQuantityUpdate['return_quantity'] = $return_quantity[$i]; 
    			$this->_model->updateDB('order_detail', $arrQuantityUpdate, "order_detail_id =" . $order_detail_id[$i]);
    		}
    	} else {
    		// BUG
    	}
    	
//     	if ($order_status_id == 4) { //dang set tam bang 4
//     		$this->_model->updateDB('shipping', $data_shipping, "shipping_id = $shipping_id"); //chua save dc han
//     	}
    	
    	
    	if ($err) {
    		exit ('NG');
    	}
    	else {
    		exit ('ok');
    	}
    	
    	
    }
    
    
    
}

		