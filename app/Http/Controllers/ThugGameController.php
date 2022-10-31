<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ThugGameLink;
use App\Services\ThugGame\GameService;
use App\Services\ThugGame\LinkService;
use Illuminate\View\View;

class ThugGameController extends Controller
{
    /**
     * @param LinkService $linkService
     * @param GameService $gameService
     */
    public function __construct(private LinkService $linkService, private GameService $gameService)
    {
    }

    /**
     * Game page
     *
     * @param ThugGameLink $thugGameLink
     * @return View
     */
    public function index(ThugGameLink $thugGameLink): View
    {
        $this->linkService->handleLink($thugGameLink);
        return view('dashboard.thug-game')->with(['link' => $thugGameLink]);
    }

    /**
     * Run game
     *
     * @param ThugGameLink $thugGameLink
     * @return View
     */
    public function store(ThugGameLink $thugGameLink): View
    {
        $game = $this->gameService->game($thugGameLink);
        return view('dashboard.thug-game')->with([
            'link' => $thugGameLink,
            'game' => $game,
        ]);
    }

    /**
     * History page
     *
     * @param ThugGameLink $thugGameLink
     * @return View
     */
    public function history(ThugGameLink $thugGameLink): View
    {
        $history = $this->gameService->history($thugGameLink);
        return view('dashboard.thug-game-history')->with([
            'link' => $thugGameLink,
            'history' => $history,
        ]);
    }
}
