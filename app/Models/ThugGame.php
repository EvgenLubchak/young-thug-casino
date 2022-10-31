<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThugGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'result',
        'money_won',
    ];

    /**
     * @return BelongsTo
     */
    public function thugGamesLink(): BelongsTo
    {
        return $this->belongsTo(ThugGameLink::class);
    }
}
