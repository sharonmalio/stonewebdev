<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     26-07-2018
*/


/**
 * Fetch the page source and cache it, ensuring it's saved as UTF-8
 *
 * @param  string $url
 * @return string
 */

namespace Stonelink\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Stonelink\Model\Provider;


class ProvidersController extends AbstractActionController
{   
    protected $serviceManager;
    
    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }
    
    public function indexAction()
    {
        \ini_set('max_execution_time', 3600);
        \ini_set('memory_limit', '10000M');
        $stonelinkService=$this->serviceManager->get('Stonelink\Service\Stonelink');
        $currPage=347;
        for ($i=1;$i<=$currPage;$i++){
            $pagecontent = file_get_contents('http://medicalboard.co.ke/online-services/retention/?currpage='. $i);
            $doc = new \DOMDocument();
            $doc->loadHTML($pagecontent);
            $x = new \DOMXPath($doc);
            $someArray=array();
            foreach($x->query('//tr/td') as $td){
                $stringToBeReplaced=trim(strip_tags($td->C14N()));
                $someArray[]= $stringToBeReplaced;
                $splitArray=array_chunk($someArray, 8);
            }
            foreach ($splitArray as $provider){
                $provider['name']=$provider[0];
                $provider['reg_date']=$provider[1];
                $provider['reg_number']=$provider[2];
                $provider['address']=$provider[3];
                $provider['qualifications']=$provider[4];
                $provider['specialty']=$provider[5];
                $provider['sub_specialty']=$provider[6];
                
                $doctor = array_slice($provider, 8);
                $providerModel=new Provider();
                $providerModel->exchangeArray($doctor);
                // This is where you will pick each record and save to providers table
                $stonelinkService->getProviderTable()->saveProvider($providerModel);
                // \Zend\Debug\Debug::dump($doctor);
            }
        }

       // $splitArray=array_chunk($someArray, 8);
        
      //  exit;
        return new ViewModel();
    }
   
     
}
