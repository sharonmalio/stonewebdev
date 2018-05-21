<?php 
namespace Stonelink\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class StonelinkTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getHospital($gid)
    {
        $gid = (int) $gid;
        $rowset = $this->tableGateway->select(['gid' => $gid]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $gid
            ));
        }

        return $row;
    }

    public function saveHospital(Stonelink $stonelink)
    {
        $data = [
            'facility_c' => $stonelink->facility_c,
            'facility_n'  => $stonelink->facility_n,
            'province' => $stonelink->province,
            'county' => $stonelink->county,
            'district' => $stonelink->district,
            'division' => $stonelink->division,
            'sublocatio' => $stonelink->sublocatio,
            'constituen' => $stonelink->constituen,
            'nearest_to' => $stonelink->nearest_to,
            'longitude' => $stonelink->longitude,
            'latitude' => $stonelink->latitude,
            
        ];

        $gid = (int) $stonelink->gid;

        if ($gid === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getHospital($gid)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $gid
            ));
        }

        $this->tableGateway->update($data, ['gid' => $gid]);
    }

    public function deleteHospital($gid)
    {
        $this->tableGateway->delete(['gid' => (int) $gid]);
    }
}