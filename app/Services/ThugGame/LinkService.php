<?php

declare(strict_types=1);

namespace App\Services\ThugGame;

use App\Repositories\ThugGameLinkRepository;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\ThugGameLink;
use Illuminate\Http\Response;

class LinkService
{
    const URL_LIFETIME_DAYS = 7;

    /**
     * @param ThugGameLinkRepository $thugGameLinkRepository
     */
    public function __construct(private ThugGameLinkRepository $thugGameLinkRepository)
    {
    }

    /**
     * Store link
     */
    public function store(): void
    {
        $data = [];
        $data['token'] = $this->thugGameLinkRepository->uniqueTokenStr();
        $data['lifetime'] = Carbon::now()->addDays(self::URL_LIFETIME_DAYS)->toDateTimeString();
        $this->thugGameLinkRepository->store($data);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return $this->thugGameLinkRepository->list();
    }

    /**
     * @param ThugGameLink $thugGameLink
     */
    public function deactivate(ThugGameLink $thugGameLink): void
    {
        $this->thugGameLinkRepository->deactivate($thugGameLink);
    }

    /**
     * @param ThugGameLink $thugGameLink
     */
    public function handleLink(ThugGameLink $thugGameLink): void
    {
        $now = Carbon::now();
        $lifeTime = Carbon::createFromDate($thugGameLink->lifetime);
        if( $now->greaterThan($lifeTime) ){
            abort(Response::HTTP_NOT_FOUND);
        }
        if( !$thugGameLink->active ){
            abort(Response::HTTP_NOT_FOUND);
        }
    }
}
