<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ThugGameLink;
use App\Models\ThugGame;
use Illuminate\Database\Eloquent\Collection;

class ThugGameRepository
{
    const HISTORY_RECORD_PER_PAGE = 3;

    /**
     * @param ThugGameLink $thugGameLink
     * @param array $data
     * @return ThugGame
     */
    public function store(ThugGameLink $thugGameLink, array $data): ThugGame
    {
        return $thugGameLink->thugGames()->create($data);
    }

    /**
     * @param int $linkId
     * @return Collection
     */
    public function history(int $linkId): Collection
    {
        return ThugGame::whereThugGameLinkId($linkId)->latest()->take(self::HISTORY_RECORD_PER_PAGE)->get();
    }
}
