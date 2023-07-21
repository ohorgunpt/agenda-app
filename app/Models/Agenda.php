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

    /**
     * Get the user that owns the Agenda
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function namauser()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * Get all of the comments for the Agenda
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pendamping()
    {
        return $this->hasMany(AddPedamping::class);
    }


    /**
     * Get the namaUnit that owns the Agenda
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function namaUnit()
    {
        return $this->hasMany(Unit::class);
    }


   }
