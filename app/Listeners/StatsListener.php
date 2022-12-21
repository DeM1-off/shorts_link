<?php

namespace App\Listeners;

use App\Events\StatsEvent;
use App\Helper\InfoHelper;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Log;

class StatsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * @param StatsEvent $event
     * @return void
     */
    public function handle(StatsEvent $event)
    {
        try {
            $count = ShortLink::where('code', $event->data)->first();
            if ($count->stats >= 2) {
                ShortLink::where('code', $event->data)->update(['stats' => $count->stats - 1]);
            }
        } catch (\Exception $e) {
            Log::error($e);
            redirect(InfoHelper::NOT_LINK);
        }
    }
}
