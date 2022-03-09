<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:28:38
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SimplecalculatorRepositoryInterface
{

    /**
     * Save Simplecalculator
     * @param \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface $simplecalculator
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface $simplecalculator
    );

    /**
     * Retrieve Simplecalculator
     * @param string $simplecalculatorId
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($simplecalculatorId);

    /**
     * Retrieve Simplecalculator matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Simplecalculator
     * @param \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface $simplecalculator
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface $simplecalculator
    );

    /**
     * Delete Simplecalculator by ID
     * @param string $simplecalculatorId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($simplecalculatorId);
}

