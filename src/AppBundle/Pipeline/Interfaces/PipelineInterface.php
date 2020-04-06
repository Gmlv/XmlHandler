<?php

namespace AppBundle\Pipeline\Interfaces;

use AppBundle\Pipeline\Context;

/**
 * Interface PipelineInterface
 * @package AppBundle\Pipeline\Interfaces
 */
interface PipelineInterface
{
    /**
     * @param Context $context
     * @return mixed
     */
    public function execute(Context $context);
}
