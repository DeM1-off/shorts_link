<?php

namespace App\Services\ShortLink;

use App\Helper\InfoHelper;
use App\Models\ShortLink;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Str;

class ShortLinkService implements ShortLinkServiceInterface
{

    /**
     * Create new Link
     *
     * @param $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addLink($request)
    {
        return ShortLink::create([
            'code' => Str::random(6),
            'link' => $request->link,
            'stats' => $request->integer('stats'),
            'date_del' => InfoHelper::getDeleteDate($request->get('date_del')),
        ]);
    }


    /**
     * Show
     *
     * @param $code
     * @return int
     */
    public function showLinkAndAddStats($code)
    {
        return ShortLink::where('code', $code)->first()->link ?? InfoHelper::NOT_LINK;
    }


}
