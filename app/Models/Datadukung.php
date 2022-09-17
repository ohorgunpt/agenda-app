<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datadukung extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the Datadukung
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datadukung()
    {
        return $this->belongsTo(Agenda::class, 'agenda_id', 'id');
    }

}
