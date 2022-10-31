<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ThugGameLink;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ThugGameLinkRepository
{
    private const LINK_PER_PAGE = 10;

    /**
     * @param array $date
     * @return ThugGameLink
     */
    public function store(array $date): ThugGameLink
    {
        return Auth::user()->thugGameLinks()->create($date);
    }

    /**
     * Return unique db token string
     *
     * @return string
     */
    public function uniqueTokenStr(): string
    {
        do {
            $token = Str::random(10);
        } while (ThugGameLink::whereToken($token)->first() instanceof ThugGameLink);
        return $token;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return ThugGameLink::orderBy('id', 'DESC')->paginate(self::LINK_PER_PAGE);
    }

    /**
     * @param ThugGameLink $thugGameLink
     */
    public function deactivate(ThugGameLink $thugGameLink): void
    {
        $thugGameLink->active = false;
        $thugGameLink->save();
        $thugGameLink->refresh();
    }
}
