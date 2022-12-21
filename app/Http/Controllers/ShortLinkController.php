<?php

namespace App\Http\Controllers;

use App\Helper\InfoHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\ShortLink;
use App\Http\Requests\ShortLinkRequest;
use App\Services\ShortLink\ShortLinkServiceInterface;
use Illuminate\Routing\Redirector;

class ShortLinkController extends Controller
{

    /**
     * @var ShortLinkServiceInterface
     */
    private ShortLinkServiceInterface $shortService;

    /**
     * CompanyController constructor.
     * @param ShortLinkServiceInterface $shortService
     */
    public function __construct(ShortLinkServiceInterface $shortService)
    {
        $this->shortService = $shortService;
    }

    /**
     * isplay a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('welcome', ['shortLinks' => ShortLink::latest()->get()]);
    }


    /**
     * Add new link
     *
     * @param ShortLinkRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ShortLinkRequest $request)
    {
        $this->shortService->addLink($request);
        return redirect('/')
            ->with(InfoHelper::SUCCESS, InfoHelper::CREATE_SUCCESS);
    }


    /**
     * Makes a substitute link to redirect to the added page.
     *
     * @param $code
     * @return mixed
     */
    public function shortenLink($code)
    {
        return redirect($this->shortService->showLinkAndAddStats($code));
    }
}
