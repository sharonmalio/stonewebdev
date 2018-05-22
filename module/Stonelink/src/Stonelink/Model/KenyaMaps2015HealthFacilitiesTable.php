<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     22-05-2018
*/

namespace Stonelink\Model;

use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class KenyaMaps2015HealthFacilitiesTable
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
		$orderCol = $platform->quoteIdentifier('kenya_maps_2015_health_facilities_id');
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

	public function fetchAllKenyaMaps2015HealthFacilities(array $columns = NULL, array $joins = NULL, array $literals = NULL, $limit = NULL, $group = NULL, $order = NULL, $buffer = FALSE)
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
		$setstmt = $this->getAdapter()->createStatement("set @kenya_maps_2015_health_facilities_row_num = 0");
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
	public function getKenyaMaps2015HealthFacilities($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('kenya_maps_2015_health_facilities_id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
		}

	public function getKenyaMaps2015HealthFacilitiesObject($id)
	{
		$id  = (int) $id;
		$platform = $this->getAdapter()->getPlatform();
		$table = $platform->quoteIdentifier($this->getTable());
		$Col = $platform->quoteIdentifier('kenya_maps_2015_health_facilities_id');
		$stmt = $this->getAdapter()->CreateStatement(
			"SELECT *  FROM $table WHERE $Col = $id");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}else{
			throw new \Exception("Could not find row $id");
		}
	}

	public function saveKenyaMaps2015HealthFacilities(KenyaMaps2015HealthFacilities $kenyamaps2015healthfacilities)
	{
		$data = array(
			'gid'=>$kenyamaps2015healthfacilities->gid,
			'facility_c'=>$kenyamaps2015healthfacilities->facility_c,
			'facility_n'=>$kenyamaps2015healthfacilities->facility_n,
			'province'=>$kenyamaps2015healthfacilities->province,
			'county'=>$kenyamaps2015healthfacilities->county,
			'district'=>$kenyamaps2015healthfacilities->district,
			'division'=>$kenyamaps2015healthfacilities->division,
			'type'=>$kenyamaps2015healthfacilities->type,
			'owner'=>$kenyamaps2015healthfacilities->owner,
			'location'=>$kenyamaps2015healthfacilities->location,
			'sublocatio'=>$kenyamaps2015healthfacilities->sublocatio,
			'descriptio'=>$kenyamaps2015healthfacilities->descriptio,
			'constituen'=>$kenyamaps2015healthfacilities->constituen,
			'nearest_to'=>$kenyamaps2015healthfacilities->nearest_to,
			'beds'=>$kenyamaps2015healthfacilities->beds,
			'cots'=>$kenyamaps2015healthfacilities->cots,
			'official_l'=>$kenyamaps2015healthfacilities->official_l,
			'official_f'=>$kenyamaps2015healthfacilities->official_f,
			'official_m'=>$kenyamaps2015healthfacilities->official_m,
			'official_e'=>$kenyamaps2015healthfacilities->official_e,
			'official_a'=>$kenyamaps2015healthfacilities->official_a,
			'official_1'=>$kenyamaps2015healthfacilities->official_1,
			'town'=>$kenyamaps2015healthfacilities->town,
			'post_code'=>$kenyamaps2015healthfacilities->post_code,
			'in_charge'=>$kenyamaps2015healthfacilities->in_charge,
			'job_title_'=>$kenyamaps2015healthfacilities->job_title_,
			'open_24_ho'=>$kenyamaps2015healthfacilities->open_24_ho,
			'open_weeke'=>$kenyamaps2015healthfacilities->open_weeke,
			'operationa'=>$kenyamaps2015healthfacilities->operationa,
			'anc'=>$kenyamaps2015healthfacilities->anc,
			'art'=>$kenyamaps2015healthfacilities->art,
			'beoc'=>$kenyamaps2015healthfacilities->beoc,
			'blood'=>$kenyamaps2015healthfacilities->blood,
			'caes_sec'=>$kenyamaps2015healthfacilities->caes_sec,
			'ceoc'=>$kenyamaps2015healthfacilities->ceoc,
			'c_imci'=>$kenyamaps2015healthfacilities->c_imci,
			'epi'=>$kenyamaps2015healthfacilities->epi,
			'fp'=>$kenyamaps2015healthfacilities->fp,
			'growm'=>$kenyamaps2015healthfacilities->growm,
			'hbc'=>$kenyamaps2015healthfacilities->hbc,
			'hct'=>$kenyamaps2015healthfacilities->hct,
			'ipd'=>$kenyamaps2015healthfacilities->ipd,
			'opd'=>$kenyamaps2015healthfacilities->opd,
			'outreach'=>$kenyamaps2015healthfacilities->outreach,
			'pmtct'=>$kenyamaps2015healthfacilities->pmtct,
			'rad_xray'=>$kenyamaps2015healthfacilities->rad_xray,
			'rhtc_rhdc'=>$kenyamaps2015healthfacilities->rhtc_rhdc,
			'tb_diag'=>$kenyamaps2015healthfacilities->tb_diag,
			'tb_labs'=>$kenyamaps2015healthfacilities->tb_labs,
			'tb_treat'=>$kenyamaps2015healthfacilities->tb_treat,
			'youth'=>$kenyamaps2015healthfacilities->youth,
			'longitude'=>$kenyamaps2015healthfacilities->longitude,
			'latitude'=>$kenyamaps2015healthfacilities->latitude,
			'the_geom'=>$kenyamaps2015healthfacilities->the_geom,
			);

			$id = (int)$kenyamaps2015healthfacilities->kenya_maps_2015_health_facilities_id;
			if ($id == 0) {
				$this->tableGateway->insert($data);
				return $this->tableGateway->lastInsertValue;
		} else {
			if ($this->getKenyaMaps2015HealthFacilities($id)) {
				$this->tableGateway->update($data, array('kenya_maps_2015_health_facilities_id' => $id));
			} else {
					throw new \Exception('Form id does not exist');
				}
		}
	}

	public function updateKenyaMaps2015HealthFacilities($data,$id)
	{
		$this->tableGateway->update($data, array('kenya_maps_2015_health_facilities_id' => $id));
	}

	public function conditionalUpdateKenyaMaps2015HealthFacilities($data,array $condition)
	{
		$this->tableGateway->update($data,$condition);
	}

	public function deleteKenyaMaps2015HealthFacilities($id)
	{
		$this->tableGateway->delete(array('kenya_maps_2015_health_facilities_id' => $id));
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

	public function getKenyaMaps2015HealthFacilitiesCol($Col)
	{
		$platform = $this->getAdapter()->getPlatform();
		$Col = $platform->quoteIdentifier($Col); 
		$id = $platform->quoteIdentifier('kenya_maps_2015_health_facilities_id');
		$table = $platform->quoteIdentifier($this->getTable());
		$stmt = $this->getAdapter()->CreateStatement("SELECT $Col,$id FROM $table");
		$result = $stmt->execute();
		if($result->count() > 0){
			$ResultSet = new ResultSet();
			$ResultSet->initialize($result);
			return $ResultSet;
		}
	}

	public function getKenyaMaps2015HealthFacilitiesRecordsCount()
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

	public function fetchKenyaMaps2015HealthFacilitiesByCol($searchTerm,$WhereCol)
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
