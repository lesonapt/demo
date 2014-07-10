<?php
class Model_DAO extends Zend_Db_Table {

	protected $db;
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	
	public function executesp($spname, $params = null){
		if($params){
			$paramString = '';
			foreach($params as $param){
				$paramString .= '\''.$param.'\',';
			}
			$paramString = substr($paramString, 0, strlen($paramString) - 1);
			$query = "CALL `" . $spname . "`(" . $paramString . ")";
			$stmt = $this->db->prepare($query);
		}
		else{
			$stmt = $this->db->prepare("CALL `" . $spname . "`()");
		}
		$dataset = array();
		try{
			$stmt->execute();
			$dataset[0] = $stmt->fetchAll();
			$i = 1;
			while($stmt->nextRowset()){
				$dataset[$i] = $stmt->fetchAll();
				$i++;
			}
		}
		catch(Exception $ex){}
		return $dataset;
	}
	
	public function dataSetCheck($dataSet, $index, $countFlag = true) {
		try {
			//
			if (!is_null($dataSet)) {
				if (is_array($dataSet)) {
					if (key_exists($index, $dataSet)) {
						if ($countFlag !== false) {
							if (!is_null($dataSet[$index])) {
								if ($countFlag !== false) {
									if (count($dataSet[$index]) > 0) {
										return(true);
									} else {
										return(false);
									}
								} else {
									return(true);
								}
							} else {
								return(false);
							}
						} else {
							return(true);
						}
					} else {
						return(false);
					}
				} else {
					return(false);
				}
			} else {
				return(false);
			}
		} catch (Exception $e) {
			return(false);
		}
	}
}
?>