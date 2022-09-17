<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointer extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * The roles that belong to the Pointer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pointer()
    {
        return $this->belongsToMany(Pointer::class, 'agenda_id');
    }
}
