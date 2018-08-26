<?php

namespace Servitor\NovaServitorMonitorCard;

use Laravel\Nova\Card;

class NovaServitorMonitorCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public function __construct( ?string $component = null )
    {
        parent::__construct( $component );
    }

    /**
     * setMonitor function.
     *
     * @param $monitorId
     *
     * @return NovaServitorMonitorCard
     */
    public function setMonitor($monitorId)
    {
        $this->withMeta([
            'monitorId' => $monitorId
        ]);
        return $this;
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-servitor-monitor-card';
    }
}
