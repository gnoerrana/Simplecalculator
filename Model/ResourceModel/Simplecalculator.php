<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:30:45
 */

namespace Addons\Simplecalculator\Model\ResourceModel;

class Simplecalculator extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('addons_simplecalculator', 'id');   //here "addons_simplecalculator" is table name and "id" is the primary key of custom table
    }
}

