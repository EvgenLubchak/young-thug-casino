<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ThugGame\LinkService;
use App\Models\ThugGameLink;
use Illuminate\Http\RedirectResponse;

class ThugGameLinkController extends Controller
{
    /**
     * @param LinkService $linkService
     */
    public function __construct(private LinkService $linkService)
    {
    }

    /**
     * Store game link
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        $this->linkService->store();
        return redirect()->route('dashboard')->with(['message' => 'link created']);
    }

    /**
     * Deactivate link
     *
     * @param ThugGameLink $thugGameLink
     * @return RedirectResponse
     */
    public function deactivate(ThugGameLink $thugGameLink): RedirectResponse
    {
        $this->linkService->deactivate($thugGameLink);
        return redirect()->route('dashboard')->with(['message' => 'link deactivated']);
    }
}
