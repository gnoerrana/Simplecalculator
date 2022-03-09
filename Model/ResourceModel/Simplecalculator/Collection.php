<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:30:39
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Model\ResourceModel\Simplecalculator;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Addons\Simplecalculator\Model\Simplecalculator::class,
            \Addons\Simplecalculator\Model\ResourceModel\Simplecalculator::class
        );
		$this->_map['fields']['id'] = 'main_table.id';
    }
}

