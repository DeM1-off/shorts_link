<?php

namespace App\Http\Middleware;

use App\Events\StatsEvent;
use App\Helper\InfoHelper;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CheckLink
{

    /**
     * @param Request $request
     * @param Closure $next
     * @return Application|\Illuminate\Http\RedirectResponse|Redirector|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (InfoHelper::checkink($request->url())) {
            event(new StatsEvent(InfoHelper::cutLick($request->url())));
            return $next($request);
        } else {
            return redirect(InfoHelper::NOT_LINK);
        }
    }
}
