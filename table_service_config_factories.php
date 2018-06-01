<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     01-06-2018
*/

    public function getServiceConfig()
    {
            return array(
                'factories' => array(
                // Table
                '\Model\Table' => '\Factory\Model\TableFactory',
                // AdvertsTable
                '\Model\AdvertsTable' => '\Factory\Model\AdvertsTableFactory',
                // AppointmentTable
                '\Model\AppointmentTable' => '\Factory\Model\AppointmentTableFactory',
                // ProviderTable
                '\Model\ProviderTable' => '\Factory\Model\ProviderTableFactory',
                // ReferralTable
                '\Model\ReferralTable' => '\Factory\Model\ReferralTableFactory',
                // TblProductsTable
                '\Model\TblProductsTable' => '\Factory\Model\TblProductsTableFactory',
                // TblProductsRatingsTable
                '\Model\TblProductsRatingsTable' => '\Factory\Model\TblProductsRatingsTableFactory',
                // TblUsersTable
                '\Model\TblUsersTable' => '\Factory\Model\TblUsersTableFactory',
                // UserTable
                'Application\Model\UserTable' => 'Application\Factory\Model\UserTableFactory',
            )
        );
    }
