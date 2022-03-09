<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:28:41
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Api\Data;

interface SimplecalculatorInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
	const ID = 'id';
    const CUSTOMER_ID = 'customer_id';
    const FIRST_NAME = 'first_name';
	const LAST_NAME = 'last_name';
    const FIRST_NUM = 'first_num';
    const SECOND_NUM = 'second_num';
    const OPERATION = 'operation';
	const RESULT = 'result';

    /**
     * Get id
     * @return string|null
     */
    public function getId();

    /**
     * Set id
     * @param string $id
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setId($id);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Addons\Simplecalculator\Api\Data\SimplecalculatorExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Addons\Simplecalculator\Api\Data\SimplecalculatorExtensionInterface $extensionAttributes
    );

    /**
     * Get first_name
     * @return string|null
     */
    public function getFirstName();

    /**
     * Set first_name
     * @param string $firstName
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setFirstName($firstName);
	
	/**
     * Get last_name
     * @return string|null
     */
    public function getLastName();

    /**
     * Set last_name
     * @param string $lastName
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setLastName($lastName);

    /**
     * Get first_num
     * @return string|null
     */
    public function getFirstNum();

    /**
     * Get first_num
     * @param integer $firstNum
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setFirstNum($firstNum);

    /**
     * Get second_num
     * @return integer|null
     */
    public function getSecondNum();

    /**
     * Set second_num
     * @param integer $secondNum
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setSecondNum($secondNum);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setCustomerId($customerId);

    /**
     * Get operation
     * @return string|null
     */
    public function getOperation();

    /**
     * Set operation
     * @param string $operation
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setOperation($operation);

    /**
     * Get result
     * @return integer|null
     */
    public function getResult();

    /**
     * Set result
     * @param integer $result
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setResult($result);

    
}

