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
        event(new StatsEvent(InfoHelper::cutLick($request->url())));
        return InfoHelper::checkink($request->url()) ? $next($request) : redirect(InfoHelper::NOT_LINK);
    }
}
