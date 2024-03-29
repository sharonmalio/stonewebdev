<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     03-01-2019
*/

namespace Appointments\Model;

use RuntimeException;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class AppntPaymentConfirmationTable
{

	protected $tableGateway;
	protected $table;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	$this->table = $this->tableGateway->getTable();
	}

	public function getAdapter()
	{
		return $this->tableGateway->getAdapter();
	}

	public function getTable()
	{
		return $this->tableGateway->getTable();
	}

	public function fetchAll($array=FALSE)
	{
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$orderCol = $platform->quoteIdentifier('appnt_payment_confirmation_id');
		$stmt = $this->getAdapter()->createStatement("SELECT * FROM $table ORDER BY $orderCol DESC");
		$result = $stmt->execute();
		$result->buffer();
		if($result->count() > 0){
			$items = new ResultSet();
			$items->initialize($result);
			if($array==TRUE){
				return $items->toArray();
			}else{
				return $items;
			}

		}
	}

	public function fetchAllAppntPaymentConfirmation(array $columns = NULL, array $joins = NULL, array $literals = NULL, $limit = NULL, $group = NULL, $order = NULL, $buffer = FALSE, $having = NULL)
	{
		$platform = $this->getAdapter()->getPlatform();
		$sql = new Sql($this->getAdapter());
		$select = $sql->select($this->getTable());
		if ($columns) {
			$select->columns($columns);
		} else {
			$select->columns(array(
				'*'
			));
		}
		if ($literals) {
			$where = new Where();
			foreach ($literals as $literal => $predicate) {
				if (is_array($predicate)) {
					foreach ($predicate as $key => $value) {
						$where->literal($key)->$value;
					}
				} else {
					$where->literal($literal)->$predicate;
				}
			}
			$select->where($where);
		}
		if ($limit) {
			$select->limit($limit);
		}
		if ($joins) {
			foreach ($joins as $join) {
				if ($join['type'] == 'RIGHT') {
					$type = $select::JOIN_RIGHT;
				}
				if ($join['type'] == 'LEFT') {
					$type = $select::JOIN_LEFT;
				}
				if ($join['type'] == 'INNER') {
					$type = $select::JOIN_INNER;
				}
				if ($join['type'] == 'OUTER') {
					$type = $select::JOIN_OUTER;
				}
				$select->join($join['name'], $join['on'], $join['columns'], $type);
			}
		}
		if ($group) {
			$select->group($group);
		}
		if ($order) {
			$select->order($order);
		}
		if ($having) {
			$select->having($having);
		}
		$setstmt = $this->getAdapter()->createStatement("set @appnt_payment_confirmation_row_num = 0");
		$set = $setstmt->execute();
		 //$statement = $sql->getSqlStringForSqlObject($select);
		//return $statement;
		$statement = $sql->prepareStatementForSqlObject($select);
		$result = $statement->execute();
		if ($buffer) {
			$result->buffer();
			if ($result) {
				$ResultSet = new ResultSet();
				$ResultSet->initialize($result);
				$ResultSet->count($result);
				return $ResultSet;
			}
		} else {
			return ;
		}
	}
	public function getAppntPaymentConfirmation($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('appnt_payment_confirmation_id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new RuntimeException(sprintf(
			        'Could not find row with identifier %d',
			        $id
			    ));
		}
		return $row;
		}

	public function getAppntPaymentConfirmationObject($id)
	{
		$id  = (int) $id;
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$Col = $platform->quoteIdentifier('appnt_payment_confirmation_id');
		$stmt = $this->getAdapter()->CreateStatement(
			"SELECT *  FROM $table WHERE $Col = $id");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}else{
			throw new RuntimeException(sprintf(
			        'Could not find row with identifier %d',
			        $id
			    ));
		}
	}

	public function saveAppntPaymentConfirmation(AppntPaymentConfirmation $appntpaymentconfirmation)
	{
		$data = array(
			'appnt_payment_confirmation_id'=>$appntpaymentconfirmation->appnt_payment_confirmation_id,
			'merchant_request_id'=>$appntpaymentconfirmation->merchant_request_id,
			'checkout_request_id'=>$appntpaymentconfirmation->checkout_request_id,
			'result_code'=>$appntpaymentconfirmation->result_code,
			'result_desc'=>$appntpaymentconfirmation->result_desc,
			'service_cost'=>$appntpaymentconfirmation->service_cost,
			'mpesa_transaction_id'=>$appntpaymentconfirmation->mpesa_transaction_id,
			'mpesa_transaction_date'=>$appntpaymentconfirmation->mpesa_transaction_date,
			'appnt_user_phone_number'=>$appntpaymentconfirmation->appnt_user_phone_number,
			);

			$id = (int)$appntpaymentconfirmation->appnt_payment_confirmation_id;
			if ($id == 0) {
				$this->tableGateway->insert($data);
				return $this->tableGateway->lastInsertValue;
		} else {
			if ($this->getAppntPaymentConfirmation($id)) {
				$this->tableGateway->update($data, array('appnt_payment_confirmation_id' => $id));
			} else {
			throw new RuntimeException(sprintf(
			        'Could not find row with identifier %d',
			        $id
			    ));
				}
		}
	}

	public function updateAppntPaymentConfirmation($data,$id)
	{
		$this->tableGateway->update($data, array('appnt_payment_confirmation_id' => $id));
	}

	public function conditionalUpdateAppntPaymentConfirmation($data,array $condition)
	{
		$this->tableGateway->update($data,$condition);
	}

	public function deleteAppntPaymentConfirmation($id)
	{
		$this->tableGateway->delete(array('appnt_payment_confirmation_id' => $id));
	}

	public function getDistinctCol($Col)
	{
		$platform = $this->getAdapter()->getPlatform();
		$Col = $platform->quoteIdentifier($Col);
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement(
			"SELECT DISTINCT $Col FROM $table WHERE $Col IS NOT NULL ORDER BY $Col ASC");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function getConditionalDistinctCol($Col,$whereCol, $whereCond)
	{
		$platform = $this->getAdapter()->getPlatform();
		$Col = $platform->quoteIdentifier($Col);
		$whereCol = $platform->quoteIdentifier($whereCol);
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement(
			"SELECT DISTINCT $Col FROM $table WHERE $whereCol='$whereCond'
			AND $Col IS NOT NULL ORDER BY $Col ASC");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function getAppntPaymentConfirmationCol($Col)
	{
		$platform = $this->getAdapter()->getPlatform();
		$Col = $platform->quoteIdentifier($Col); 
		$id = $platform->quoteIdentifier('appnt_payment_confirmation_id');
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement("SELECT $Col,$id FROM $table");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function getAppntPaymentConfirmationRecordsCount()
	{
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement("SELECT COUNT(*) as count FROM $table");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function fetchAppntPaymentConfirmationByCol($searchTerm,$WhereCol)
	{
		$platform = $this->getAdapter()->getPlatform();
		$WhereCol = $platform->quoteIdentifier($WhereCol);
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement(
				"SELECT * FROM $table WHERE $WhereCol LIKE '%$searchTerm%'");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
		return $ResultSet;
		}
	}

	public function fetchColumnNames()
		{
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement("SHOW COLUMNS FROM $table");
		$result = $stmt->execute();
		$result->buffer();
		if($result){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function fetchAllByMultipleColumnSearch(array $cols,$searchTerm)
	{
		$sql = new Sql($this->getAdapter());
		$select = $sql->select($this->getTable());
		$columns = array();
		foreach ($cols as $col){
			$columns[]= new \Zend\Db\Sql\Predicate\Like($col, $searchTerm."%");
		}
		$select->where($columns,\Zend\Db\Sql\Predicate\PredicateSet::OP_OR);

		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();
		return $results;

	}

	public function fetchColumnUnion(array $columns,$returnColName)
	{
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$returnColName=$platform->quoteIdentifier($returnColName);
		$select="";
		$count=0;
		$size=sizeof($columns);
		foreach ($columns as $column){
			if ($count== $size-1){
				$select=$select."( SELECT $column AS $returnColName FROM $table ) ";
			}else{
				$select=$select."( SELECT $column AS $returnColName FROM $table ) UNION ";
			}
			$count++;
		}
		$stmt = $this->getAdapter()->CreateStatement($select);
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function concatColumns(array $columns,$returnColName)
	{
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$returnColName=$platform->quoteIdentifier($returnColName);
		$columnstr='';
		$count=0;
		$size=sizeof($columns);
		foreach ($columns as $column){
			$column=$platform->quoteidentifier($column);
			if ($count<$size-1){
				$columnstr=$columnstr."$column,' ',";
			}else{
				$columnstr=$columnstr." $column";
		}
			$count++;
		}
		$stmt = $this->getAdapter()->CreateStatement(
			"SELECT DISTINCT CONCAT( $columnstr) AS $returnColName FROM $table");
		$result = $stmt->execute();
		$result->buffer();
		if($result){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function fetchAllByConcatedColumns(array $columns,$searchTerm)
	{
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$columnstr='';
		$count=0;
		$size=sizeof($columns);
		foreach ($columns as $column){
			$column=$platform->quoteidentifier($column);
			if ($count<$size-1){
				$columnstr=$columnstr."$column,' ',";
			}else{
				$columnstr=$columnstr." $column";
			}
			$count++;
		}
		$stmt = $this->getAdapter()->CreateStatement(
			"SELECT * FROM $table WHERE CONCAT( $columnstr) lIKE '$searchTerm%'");
		$result = $stmt->execute();
		$result->buffer();
		if($result){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function fetchRowset($paramname,$paramvalue)
	{
		$rowset = $this->tableGateway->select(array($paramname => $paramvalue));
		$row = $rowset->current();
		if(!$row){
			$row=NULL;
		}
		return $row;
	}

	public function fetchRowSetObject($paramname,$paramvalue)
	{
		$rowset = $this->tableGateway->select(array($paramname => $paramvalue));
		return $rowset;
	}

}
