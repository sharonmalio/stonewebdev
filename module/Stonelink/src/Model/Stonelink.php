<?php
namespace Stonelink\Model;

class Stonelink
{
    public $gid;
    public $facility_c;
    public $facility_n;
    public $province;
    public $county;
    public $district;
    public $division;
    
    public function exchangeArray(array $data)
    {
        $this->gid     = !empty($data['gid']) ? $data['gid'] : null;
        $this->facility_c = !empty($data['facility_c']) ? $data['facility_c'] : null;
        $this->facility_n  = !empty($data['facility_n']) ? $data['facility_n'] : null;
        $this->province  = !empty($data['province']) ? $data['province'] : null;
        $this->county  = !empty($data['county']) ? $data['county'] : null;
        $this->district  = !empty($data['district']) ? $data['district'] : null;
        $this->division  = !empty($data['division']) ? $data['division'] : null;
    }   
}