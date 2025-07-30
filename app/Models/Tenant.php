<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRemainingDaysAttribute()
    {
        if ($this->days) {
            $expireDate = $this->created_at->copy()->addDays($this->days);
            $today = now();
            if ($expireDate->isPast()) {
                return 0;
            }
            return $today->diffInDays($expireDate);
        }
        return null;
    }
}
