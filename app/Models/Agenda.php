<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the datadukung that owns the Agenda
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datadukung()
    {
        return $this->belongsTo(Datadukung::class, 'agenda_id', 'id');
    }
}
