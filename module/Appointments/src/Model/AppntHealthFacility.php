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

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\Adapter\Adapter;

class AppntHealthFacility implements InputFilterAwareInterface
{

	public $appnt_health_facility_id;

	public $facility_code;

	public $facility_name;

	public $province;

	public $county;

	public $district;

	public $division;

	public $type;

	public $owner;

	public $location;

	public $sublocation;

	public $description_of_location;

	public $constituency;

	public $nearest_town;

	public $beds;

	public $cots;

	public $official_landline;

	public $official_fax;

	public $official_mobile;

	public $official_email;

	public $official_address;

	public $official_alternate_no;

	public $town;

	public $post_code;

	public $in_charge;

	public $job_title_of_in_charge;

	public $open_24_hours;

	public $open_weekends;

	public $operational_status;

	public $anc;

	public $art;

	public $beoc;

	public $blood;

	public $caes_sec;

	public $ceoc;

	public $c_imci;

	public $epi;

	public $fp;

	public $growm;

	public $hbc;

	public $hct;

	public $ipd;

	public $opd;

	public $outreach;

	public $pmtct;

	public $rad_xray;

	public $rhtc_rhdc;

	public $tb_diag;

	public $tb_labs;

	public $tb_treat;

	public $youth;

	public $longitude;

	public $latitude;

    protected $inputFilter;

    protected $dbAdapter;

    protected $appntHealthFacilityTable;

    protected $tableName = 'appnt_health_facility';


    public function __construct(Adapter $adapter)
    {
        $this->dbAdapter = $adapter;
    }

	public function exchangeArray($data)
	{
		$this->appnt_health_facility_id=(isset($data['appnt_health_facility_id'])) ? $data['appnt_health_facility_id'] : null;
		$this->facility_code=(isset($data['facility_code'])) ? $data['facility_code'] : null;
		$this->facility_name=(isset($data['facility_name'])) ? $data['facility_name'] : null;
		$this->province=(isset($data['province'])) ? $data['province'] : null;
		$this->county=(isset($data['county'])) ? $data['county'] : null;
		$this->district=(isset($data['district'])) ? $data['district'] : null;
		$this->division=(isset($data['division'])) ? $data['division'] : null;
		$this->type=(isset($data['type'])) ? $data['type'] : null;
		$this->owner=(isset($data['owner'])) ? $data['owner'] : null;
		$this->location=(isset($data['location'])) ? $data['location'] : null;
		$this->sublocation=(isset($data['sublocation'])) ? $data['sublocation'] : null;
		$this->description_of_location=(isset($data['description_of_location'])) ? $data['description_of_location'] : null;
		$this->constituency=(isset($data['constituency'])) ? $data['constituency'] : null;
		$this->nearest_town=(isset($data['nearest_town'])) ? $data['nearest_town'] : null;
		$this->beds=(isset($data['beds'])) ? $data['beds'] : null;
		$this->cots=(isset($data['cots'])) ? $data['cots'] : null;
		$this->official_landline=(isset($data['official_landline'])) ? $data['official_landline'] : null;
		$this->official_fax=(isset($data['official_fax'])) ? $data['official_fax'] : null;
		$this->official_mobile=(isset($data['official_mobile'])) ? $data['official_mobile'] : null;
		$this->official_email=(isset($data['official_email'])) ? $data['official_email'] : null;
		$this->official_address=(isset($data['official_address'])) ? $data['official_address'] : null;
		$this->official_alternate_no=(isset($data['official_alternate_no'])) ? $data['official_alternate_no'] : null;
		$this->town=(isset($data['town'])) ? $data['town'] : null;
		$this->post_code=(isset($data['post_code'])) ? $data['post_code'] : null;
		$this->in_charge=(isset($data['in_charge'])) ? $data['in_charge'] : null;
		$this->job_title_of_in_charge=(isset($data['job_title_of_in_charge'])) ? $data['job_title_of_in_charge'] : null;
		$this->open_24_hours=(isset($data['open_24_hours'])) ? $data['open_24_hours'] : null;
		$this->open_weekends=(isset($data['open_weekends'])) ? $data['open_weekends'] : null;
		$this->operational_status=(isset($data['operational_status'])) ? $data['operational_status'] : null;
		$this->anc=(isset($data['anc'])) ? $data['anc'] : null;
		$this->art=(isset($data['art'])) ? $data['art'] : null;
		$this->beoc=(isset($data['beoc'])) ? $data['beoc'] : null;
		$this->blood=(isset($data['blood'])) ? $data['blood'] : null;
		$this->caes_sec=(isset($data['caes_sec'])) ? $data['caes_sec'] : null;
		$this->ceoc=(isset($data['ceoc'])) ? $data['ceoc'] : null;
		$this->c_imci=(isset($data['c_imci'])) ? $data['c_imci'] : null;
		$this->epi=(isset($data['epi'])) ? $data['epi'] : null;
		$this->fp=(isset($data['fp'])) ? $data['fp'] : null;
		$this->growm=(isset($data['growm'])) ? $data['growm'] : null;
		$this->hbc=(isset($data['hbc'])) ? $data['hbc'] : null;
		$this->hct=(isset($data['hct'])) ? $data['hct'] : null;
		$this->ipd=(isset($data['ipd'])) ? $data['ipd'] : null;
		$this->opd=(isset($data['opd'])) ? $data['opd'] : null;
		$this->outreach=(isset($data['outreach'])) ? $data['outreach'] : null;
		$this->pmtct=(isset($data['pmtct'])) ? $data['pmtct'] : null;
		$this->rad_xray=(isset($data['rad_xray'])) ? $data['rad_xray'] : null;
		$this->rhtc_rhdc=(isset($data['rhtc_rhdc'])) ? $data['rhtc_rhdc'] : null;
		$this->tb_diag=(isset($data['tb_diag'])) ? $data['tb_diag'] : null;
		$this->tb_labs=(isset($data['tb_labs'])) ? $data['tb_labs'] : null;
		$this->tb_treat=(isset($data['tb_treat'])) ? $data['tb_treat'] : null;
		$this->youth=(isset($data['youth'])) ? $data['youth'] : null;
		$this->longitude=(isset($data['longitude'])) ? $data['longitude'] : null;
		$this->latitude=(isset($data['latitude'])) ? $data['latitude'] : null;
	}


	public function getArrayCopy()
	{
		return get_object_vars($this);
	}


	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new RuntimeException(
		        'Not used'
		);
	}


	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();

			$inputFilter->add(array(
				'name'     => 'appnt_health_facility_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'facility_code',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'facility_name',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'province',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'county',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'district',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'division',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'type',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'owner',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'location',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'sublocation',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'description_of_location',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'constituency',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'nearest_town',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'beds',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'cots',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'official_landline',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'official_fax',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'official_mobile',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'official_email',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'official_address',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'official_alternate_no',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'town',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'post_code',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'in_charge',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'job_title_of_in_charge',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'open_24_hours',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'open_weekends',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'operational_status',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'anc',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'art',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'beoc',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'blood',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'caes_sec',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'ceoc',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'c_imci',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'epi',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'fp',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'growm',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'hbc',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'hct',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'ipd',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'opd',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'outreach',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'pmtct',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'rad_xray',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'rhtc_rhdc',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'tb_diag',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'tb_labs',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'tb_treat',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'youth',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'longitude',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'latitude',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$this->inputFilter = $inputFilter;
		}
		return $this->inputFilter;
	}
}
