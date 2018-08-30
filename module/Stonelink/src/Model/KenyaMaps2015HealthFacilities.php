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

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class KenyaMaps2015HealthFacilities implements InputFilterAwareInterface
{

	public $gid;
	public $facility_c;
	public $facility_n;
	public $province;
	public $county;
	public $district;
	public $division;
	public $type;
	public $owner;
	public $location;
	public $sublocatio;
	public $descriptio;
	public $constituen;
	public $nearest_to;
	public $beds;
	public $cots;
	public $official_l;
	public $official_f;
	public $official_m;
	public $official_e;
	public $official_a;
	public $official_1;
	public $town;
	public $post_code;
	public $in_charge;
	public $job_title_;
	public $open_24_ho;
	public $open_weeke;
	public $operationa;
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
	public $the_geom;
	protected $inputFilter;


	public function exchangeArray($data)
	{
		$this->gid=(isset($data['gid'])) ? $data['gid'] : null;
		$this->facility_c=(isset($data['facility_c'])) ? $data['facility_c'] : null;
		$this->facility_n=(isset($data['facility_n'])) ? $data['facility_n'] : null;
		$this->province=(isset($data['province'])) ? $data['province'] : null;
		$this->county=(isset($data['county'])) ? $data['county'] : null;
		$this->district=(isset($data['district'])) ? $data['district'] : null;
		$this->division=(isset($data['division'])) ? $data['division'] : null;
		$this->type=(isset($data['type'])) ? $data['type'] : null;
		$this->owner=(isset($data['owner'])) ? $data['owner'] : null;
		$this->location=(isset($data['location'])) ? $data['location'] : null;
		$this->sublocatio=(isset($data['sublocatio'])) ? $data['sublocatio'] : null;
		$this->descriptio=(isset($data['descriptio'])) ? $data['descriptio'] : null;
		$this->constituen=(isset($data['constituen'])) ? $data['constituen'] : null;
		$this->nearest_to=(isset($data['nearest_to'])) ? $data['nearest_to'] : null;
		$this->beds=(isset($data['beds'])) ? $data['beds'] : null;
		$this->cots=(isset($data['cots'])) ? $data['cots'] : null;
		$this->official_l=(isset($data['official_l'])) ? $data['official_l'] : null;
		$this->official_f=(isset($data['official_f'])) ? $data['official_f'] : null;
		$this->official_m=(isset($data['official_m'])) ? $data['official_m'] : null;
		$this->official_e=(isset($data['official_e'])) ? $data['official_e'] : null;
		$this->official_a=(isset($data['official_a'])) ? $data['official_a'] : null;
		$this->official_1=(isset($data['official_1'])) ? $data['official_1'] : null;
		$this->town=(isset($data['town'])) ? $data['town'] : null;
		$this->post_code=(isset($data['post_code'])) ? $data['post_code'] : null;
		$this->in_charge=(isset($data['in_charge'])) ? $data['in_charge'] : null;
		$this->job_title_=(isset($data['job_title_'])) ? $data['job_title_'] : null;
		$this->open_24_ho=(isset($data['open_24_ho'])) ? $data['open_24_ho'] : null;
		$this->open_weeke=(isset($data['open_weeke'])) ? $data['open_weeke'] : null;
		$this->operationa=(isset($data['operationa'])) ? $data['operationa'] : null;
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
		$this->the_geom=(isset($data['the_geom'])) ? $data['the_geom'] : null;
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
				'name'     => 'gid ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' facility_c ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' facility_n ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' province ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' county ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' district ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' division ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' type ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' owner ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' location ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' sublocatio ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' descriptio ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' constituen ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' nearest_to ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' beds ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' cots ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' official_l ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' official_f ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' official_m ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' official_e ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' official_a ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' official_1 ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' town ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' post_code ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' in_charge ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' job_title_ ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' open_24_ho ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' open_weeke ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' operationa ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' anc ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' art ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' beoc ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' blood ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' caes_sec ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' ceoc ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' c_imci ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' epi ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' fp ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' growm ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' hbc ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' hct ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' ipd ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' opd ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' outreach ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' pmtct ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' rad_xray ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' rhtc_rhdc ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' tb_diag ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' tb_labs ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' tb_treat ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' youth ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' longitude ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' latitude ',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => ' the_geom',
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
