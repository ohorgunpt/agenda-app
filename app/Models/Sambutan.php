<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * The roles that belong to the Sambutan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sambutan()
    {
        return $this->belongsToMany(Sambutan::class, 'agenda_id');
    }
}
