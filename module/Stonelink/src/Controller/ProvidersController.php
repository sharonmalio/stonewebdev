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
use Zend\Dom\Query;
use \Zend\Debug\Debug;
use Zend\Dom\DOMXPath;


class ProvidersController extends AbstractActionController
{   
    protected $serviceManager;
    
    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }
    
    public function indexAction()
    {
        echo "we love MAngoes";
        $pagecontent = file_get_contents('http://medicalboard.co.ke/online-services/retention/');
//         $doc = new \DOMDocument();
        $doc = new \DOMDocument();
        $doc->loadHTML($pagecontent);
        $x = new \DOMXPath($doc);
        $someArray=array();
        foreach($x->query('//tr/td') as $td){
            $stringToBeReplaced=$td->C14N();
            $string=str_replace('<td> ', '', $stringToBeReplaced);
            $string2=str_replace('</td> ', '', $string);
            //echo $string;
            $someArray[]= $string;
            $splitArray=array_chunk($someArray, 8);
            //echo $td->C14N().'<br>';
            
//             echo "\n";
            //if just need the text use:
            //echo $td->textContent;
        }
        
       // $splitArray=array_chunk($someArray, 8);
        \Zend\Debug\Debug::dump($splitArray);
        exit;
        return new ViewModel();
    }
    
    public function fetchAction($url)
    {   
        $tags = [];
        $site = fetch('http://medicalboard.co.ke/online-services/retention/');
        $sdom = new Query($site);
        $content = '';
        $md5 = md5($url);
        $path = __DIR__.'/cache/' . $md5;
        if (!file_exists($path)) {
            $content = file_get_contents($url);
            $content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
            file_put_contents($path, $content);
        } else {
            $content = file_get_contents($path);
        }
        return $content;
    
  
    foreach ($sdom->execute('div#main table.zebra tbody tr') as $href) {
        $url = $href->getAttribute('href');
        $ddom = new Query(fetch($url));
      
    
    }
    }
    
    
}
