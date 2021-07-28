<?php

namespace Magento\ListProduct\Api;

/**
 * Interface ProductManagementInterface
 * @package Magento\ListProduct\Api
 */
interface ProductManagementInterface
{
    /**
     * @return array
     */
    public function getList(): array;
}