<?php

declare(strict_types=1);

namespace App\Services\ThugGame;

use App\DTO\Auth\RegisterRequestDTO;
use App\Models\ThugGame;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Models\ThugGameLink;
use App\Repositories\ThugGameRepository;
use Illuminate\Database\Eloquent\Collection;

class GameService
{
    const MIN_RESULT_INT = 1;
    const MAX_RESULT_INT = 1000;

    /**
     * @param UserRepository $userRepository
     * @param ThugGameRepository $thugGameRepository
     */
    public function __construct(private UserRepository $userRepository, private ThugGameRepository $thugGameRepository)
    {
    }

    /**
     * @param RegisterRequestDTO $registerRequestDTO
     * @return User
     */
    public function store(RegisterRequestDTO $registerRequestDTO): User
    {
        return $this->userRepository->store($registerRequestDTO->toArray());
    }

    /**
     * @param ThugGameLink $thugGameLink
     * @return ThugGame
     */
    public function game(ThugGameLink $thugGameLink): ThugGame
    {
        $data = [];
        $data['result'] = rand(self::MIN_RESULT_INT, self::MAX_RESULT_INT);
        if( $data['result'] % 2 == 0 ){
            //win
            switch ( true ){
                case $data['result'] > 900;
                    $percentage = 70;
                    $data['money_won'] = ($percentage / 100) * $data['result'];
                    break;
                case $data['result'] > 600;
                    $percentage = 50;
                    $data['money_won'] = ($percentage / 100) * $data['result'];
                    break;
                case $data['result'] > 300;
                    $percentage = 30;
                    $data['money_won'] = ($percentage / 100) * $data['result'];
                    break;
                case $data['result'] < 300;
                    $percentage = 10;
                    $data['money_won'] = ($percentage / 100) * $data['result'];
                    break;
            }
        } else {
            //lose
            $data['money_won'] = 0;
        }
        $data['money_won'] = (int)$data['money_won'];
        return $this->thugGameRepository->store($thugGameLink, $data);
    }

    /**
     * @param ThugGameLink $thugGameLink
     * @return Collection
     */
    public function history(ThugGameLink $thugGameLink): Collection
    {
        return $this->thugGameRepository->history($thugGameLink->id);
    }
}
