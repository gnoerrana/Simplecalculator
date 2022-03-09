<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:28:35
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Api\Data;

interface SimplecalculatorSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Simplecalculator list.
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface[]
     */
    public function getItems();

    /**
     * Set id list.
     * @param \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

