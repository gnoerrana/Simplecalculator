# Magento 2 Simple Calculator Module for customer 

Magento 2 calculate math operation (Addition & Substraction) from customer dashbord. 

## Installation


### Type 1: Zip file

 - Unzip the zip file in `app/code/Addons` (create folder "Addons" if it doesn't exist)/
 - Enable the module by running `php bin/magento module:enable Addons_Simplecalculator`
 - run `php bin/magento setup:upgrade`
 - run `php bin/magento setup:di:compile`
 - Deploy static files `php bin/magento setup:static-content:deploy -f`
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - In progress


## Configuration

- 

## Specifications

-

## How to access 
Frontend: Login as user -> go to customer dasboard / my account -> choose simple calculator menu -> Fill the form
Banckend: Login as backend user -> customers menu -> choose simple calculator to see customers calculation submission.



