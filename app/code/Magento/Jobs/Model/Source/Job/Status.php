<?php
namespace Magento\Jobs\Model\Source\Job;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Magento\Jobs\Model\Job
     */
    protected $_job;

    /**
     * Constructor
     *
     * @param \Magento\Jobs\Model\Job $job
     */
    public function __construct(\Magento\Jobs\Model\Job $job)
    {
        $this->_job = $job;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_job->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}