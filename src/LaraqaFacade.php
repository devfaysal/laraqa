<?php

namespace Devfaysal\Laraqa;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Devfaysal\Laraqa\Skeleton\SkeletonClass
 */
class LaraqaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraqa';
    }
}
