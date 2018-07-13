<?php
namespace Stone\View\Helper;

use Zend\View\Helper\AbstractHelper;

class DateFormatHelper extends AbstractHelper
{

    public function __invoke($inputdate, $format)
    {
        $date = new \DateTime($inputdate);
        return $date->format($format);
    }
}