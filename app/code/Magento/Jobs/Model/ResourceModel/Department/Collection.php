<?php
namespace Magento\Jobs\Model\ResourceModel\Department;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Magento\Jobs\Model\Department::DEPARTMENT_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magento\Jobs\Model\Department', 'Magento\Jobs\Model\ResourceModel\Department');
    }

}