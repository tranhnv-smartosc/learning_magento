<?php

namespace Magento\ListProduct\Model;

use Magento\Tests\NamingConvention\true\mixed;

/**
 * Class ProductManagement
 * @package ViMagento\CustomApi\Model
 */
class ProductManagement implements \Magento\ListProduct\Api\ProductManagementInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory  $productCollectionFactory;

    /**
     * @var \Magento\Catalog\Model\Product\Attribute\Source\Status
     */
    protected \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus;

    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected \Magento\Framework\App\Request\Http $request;

    /**
     * ProductManagement constructor.
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus
     * @param \Magento\Framework\App\Request\Http $request
     */
    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus,
        \Magento\Framework\App\Request\Http $request
    )
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->productStatus = $productStatus;
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        $perPage = ($this->request->getParam('perPage')) ? $this->request->getParam('perPage') : 5;
        $page = ($this->request->getParam('page')) ? $this->request->getParam('page') : 1;
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('status', ['in' => $this->productStatus->getVisibleStatusIds()]);
        $collection->setPageSize($perPage);
        $collection->setCurPage($page);

        return $collection->toArray();
    }
}