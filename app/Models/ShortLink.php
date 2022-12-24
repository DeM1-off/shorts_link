<?php

namespace App\Models;

use App\Helper\InfoHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $table = 'short_links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'link',
        'stats',
        'date_del'
    ];

    /**
     * Checks work link
     *
     * @param $query
     * @param $code
     * @return mixed
     */
    public function scopeCheckLink($query, $code): mixed
    {
        return $query->where([
            ['date_del', '>', now()],
            ['stats', '>=', 1],
            ['code', InfoHelper::cutLink($code)]
        ]);
    }
}
