<?php
namespace Stone\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ProperCaseHelper extends AbstractHelper
{

    public function __invoke($string)
    {
        $lcstring = strtolower($string);
        return ucfirst($lcstring);
    }
}