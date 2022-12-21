<?php

namespace App\Services\ShortLink;

/**
 * Interface ShortLinkServiceInterface
 * @package App\Service\ShortLink
 */
interface ShortLinkServiceInterface
{


    /**
     * @param   $request
     */
    public function addLink( $request);

    /**
     * @param  $code
     */
    public function showLinkAndAddStats($code);


}
