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

    public function getAlbum($gid)
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

    public function saveAlbum(StonelinkAlbum $stonelinkalbum)
    {
        $data = [
            'facility_c' => $stonelinkalbum->facility_c,
            'facility_n'  => $stonelinkalbum->facility_n,
            'province'  => $stonelinkalbum->province,
            'county'  => $stonelinkalbum->county,
            'district'  => $stonelinkalbum->district,
            'division'  => $stonelinkalbum->division,
            
        ];

        $gid = (int) $stonelinkalbum->gid;

        if ($gid === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getAlbum($gid)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['gid' => $gid]);
    }

    public function deleteAlbum($gid)
    {
        $this->tableGateway->delete(['id' => (int) $gid]);
    }
}