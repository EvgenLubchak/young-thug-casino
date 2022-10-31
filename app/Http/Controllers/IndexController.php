<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ThugGame\LinkService;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @param LinkService $linkService
     */
    public function __construct(private LinkService $linkService)
    {
    }

    /**
     * Dashboard index page
     *
     * @return View
     */
    public function index(): View
    {
        $links = $this->linkService->list();
        return view('dashboard.index')->with(['links' => $links]);
    }
}
