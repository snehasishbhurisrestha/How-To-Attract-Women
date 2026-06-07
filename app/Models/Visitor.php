<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip',
        'page',
        'url',
        'user_agent',
        'browser',
        'platform',
        'device',
        'referer',
        'country',
        'city',
        'session_id',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /* ── Relationships ── */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* ── Scopes ── */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('created_at', now()->year);
    }

    public function scopeUnique($query)
    {
        return $query->distinct('ip');
    }
}