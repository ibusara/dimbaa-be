<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreMatchReport extends Model
{
    protected $fillable = [
        'match_id',
        'away_team',
        'city',
        'competition',
        'home_team',
        'kick_off_time',
        'match_commissionar',
        'match_date',
        'stadium'
    ];

    /**
     * Get the matchEvent that owns the PreMatchReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matchevent(): BelongsTo
    {
        return $this->belongsTo(MatchRecord::class, 'match_id', 'id');
    }
}