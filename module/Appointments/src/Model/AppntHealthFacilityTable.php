<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     13-12-2018
*/

namespace Appointments\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;
use RuntimeException;

class AppntHealthFacilityTable
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
		$orderCol = $platform->quoteIdentifier('appnt_health_facility_id');
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

	public function fetchAllAppntHealthFacility(array $columns = NULL, array $joins = NULL, array $literals = NULL, $limit = NULL, $group = NULL, $order = NULL, $buffer = FALSE, $having = NULL)
	{
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
		$setstmt = $this->getAdapter()->createStatement("set @appnt_health_facility_row_num = 0");
		$setstmt->execute();
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
	public function getAppntHealthFacility($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('appnt_health_facility_id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new RuntimeException(sprintf(
			        'Could not find row with identifier %d',
			        $id
			    ));
		}
		return $row;
		}

	public function getAppntHealthFacilityObject($id)
	{
		$id  = (int) $id;
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$Col = $platform->quoteIdentifier('appnt_health_facility_id');
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

	public function saveAppntHealthFacility(AppntHealthFacility $appnthealthfacility)
	{
		$data = array(
			'appnt_health_facility_id'=>$appnthealthfacility->appnt_health_facility_id,
			'facility_code'=>$appnthealthfacility->facility_code,
			'facility_name'=>$appnthealthfacility->facility_name,
			'province'=>$appnthealthfacility->province,
			'county'=>$appnthealthfacility->county,
			'district'=>$appnthealthfacility->district,
			'division'=>$appnthealthfacility->division,
			'type'=>$appnthealthfacility->type,
			'owner'=>$appnthealthfacility->owner,
			'location'=>$appnthealthfacility->location,
			'sublocation'=>$appnthealthfacility->sublocation,
			'description_of_location'=>$appnthealthfacility->description_of_location,
			'constituency'=>$appnthealthfacility->constituency,
			'nearest_town'=>$appnthealthfacility->nearest_town,
			'beds'=>$appnthealthfacility->beds,
			'cots'=>$appnthealthfacility->cots,
			'official_landline'=>$appnthealthfacility->official_landline,
			'official_fax'=>$appnthealthfacility->official_fax,
			'official_mobile'=>$appnthealthfacility->official_mobile,
			'official_email'=>$appnthealthfacility->official_email,
			'official_address'=>$appnthealthfacility->official_address,
			'official_alternate_no'=>$appnthealthfacility->official_alternate_no,
			'town'=>$appnthealthfacility->town,
			'post_code'=>$appnthealthfacility->post_code,
			'in_charge'=>$appnthealthfacility->in_charge,
			'job_title_of_in_charge'=>$appnthealthfacility->job_title_of_in_charge,
			'open_24_hours'=>$appnthealthfacility->open_24_hours,
			'open_weekends'=>$appnthealthfacility->open_weekends,
			'operational_status'=>$appnthealthfacility->operational_status,
			'anc'=>$appnthealthfacility->anc,
			'art'=>$appnthealthfacility->art,
			'beoc'=>$appnthealthfacility->beoc,
			'blood'=>$appnthealthfacility->blood,
			'caes_sec'=>$appnthealthfacility->caes_sec,
			'ceoc'=>$appnthealthfacility->ceoc,
			'c_imci'=>$appnthealthfacility->c_imci,
			'epi'=>$appnthealthfacility->epi,
			'fp'=>$appnthealthfacility->fp,
			'growm'=>$appnthealthfacility->growm,
			'hbc'=>$appnthealthfacility->hbc,
			'hct'=>$appnthealthfacility->hct,
			'ipd'=>$appnthealthfacility->ipd,
			'opd'=>$appnthealthfacility->opd,
			'outreach'=>$appnthealthfacility->outreach,
			'pmtct'=>$appnthealthfacility->pmtct,
			'rad_xray'=>$appnthealthfacility->rad_xray,
			'rhtc_rhdc'=>$appnthealthfacility->rhtc_rhdc,
			'tb_diag'=>$appnthealthfacility->tb_diag,
			'tb_labs'=>$appnthealthfacility->tb_labs,
			'tb_treat'=>$appnthealthfacility->tb_treat,
			'youth'=>$appnthealthfacility->youth,
			'longitude'=>$appnthealthfacility->longitude,
			'latitude'=>$appnthealthfacility->latitude,
			);

			$id = (int)$appnthealthfacility->appnt_health_facility_id;
			if ($id == 0) {
				$this->tableGateway->insert($data);
				return $this->tableGateway->lastInsertValue;
		} else {
			if ($this->getAppntHealthFacility($id)) {
				$this->tableGateway->update($data, array('appnt_health_facility_id' => $id));
			} else {
			throw new RuntimeException(sprintf(
			        'Could not find row with identifier %d',
			        $id
			    ));
				}
		}
	}

	public function updateAppntHealthFacility($data,$id)
	{
		$this->tableGateway->update($data, array('appnt_health_facility_id' => $id));
	}

	public function conditionalUpdateAppntHealthFacility($data,array $condition)
	{
		$this->tableGateway->update($data,$condition);
	}

	public function deleteAppntHealthFacility($id)
	{
		$this->tableGateway->delete(array('appnt_health_facility_id' => $id));
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

	public function getAppntHealthFacilityCol($Col)
	{
		$platform = $this->getAdapter()->getPlatform();
		$Col = $platform->quoteIdentifier($Col); 
		$id = $platform->quoteIdentifier('appnt_health_facility_id');
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement("SELECT $Col,$id FROM $table");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function getAppntHealthFacilityRecordsCount()
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

	public function fetchAppntHealthFacilityByCol($searchTerm,$WhereCol)
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
