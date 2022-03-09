<?php
/**
 * @Author: Gilang
 * @Date:   2022-03-10 01:18:39
 * @Last Modified by:   Gilang
 * @Last Modified time: 2022-03-10 03:30:32
 */
 
declare(strict_types=1);

namespace Addons\Simplecalculator\Model\Data;

use Addons\Simplecalculator\Api\Data\SimplecalculatorInterface;

class Simplecalculator extends \Magento\Framework\Api\AbstractExtensibleObject implements SimplecalculatorInterface
{
    /**
     * Get id
     * @return string|null
     */
    public function getId()
    {
        return $this->_get(self::ID);
    }

    /**
     * Set id
     * @param string $id
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Addons\Simplecalculator\Api\Data\SimplecalculatorExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Addons\Simplecalculator\Api\Data\SimplecalculatorExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get first_name
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->_get(self::FIRST_NAME);
    }

    /**
     * Set first_name
     * @param string $firstName
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }
	
	/**
     * Get last_name
     * @return string|null
     */
    public function getLastName()
    {
        return $this->_get(self::LAST_NAME);
    }

    /**
     * Set last_name
     * @param string $lastName
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * Get first_num
     * @return integer|null
     */
    public function getFirstNum()
    {
        return $this->_get(self::FIRST_NUM);
    }

    /**
     * Set first_num
     * @param integer $firstNum
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setFirstNum($firstNum)
    {
        return $this->setData(self::FIRST_NUM, $firstNum);
    }

    /**
     * Get second_num
     * @return integer|null
     */
    public function getSecondNum()
    {
        return $this->_get(self::SECOND_NUM);
    }

    /**
     * Set second_num
     * @param integer $secondNum
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setSecondNum($secondNum)
    {
        return $this->setData(self::SECOND_NUM, $secondNum);
    }

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->_get(self::CUSTOMER_ID);
    }

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }


    /**
     * Get operation
     * @return string|null
     */
    public function getOperation()
    {
        return $this->_get(self::OPERATION);
    }

    /**
     * Set operation
     * @param string $operation
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setOperation($operation)
    {
        return $this->setData(self::OPERATION, $operation);
    }


    /**
     * Get result
     * @return integer|null
     */
    public function getResult()
    {
        return $this->_get(self::OPERATION);
    }

    /**
     * Set result
     * @param integer $result
     * @return \Addons\Simplecalculator\Api\Data\SimplecalculatorInterface
     */
    public function setResult($result)
    {
        return $this->setData(self::OPERATION, $result);
    }
 
}

