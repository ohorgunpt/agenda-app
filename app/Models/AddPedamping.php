<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AddPedamping extends Model
{
    use HasFactory;
    protected $guarded  = [];

    /**
     * Get the namaPendamping that owns the AddPedamping
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function namaPendamping()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * Get the user that owns the AddPedamping
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agenda()
    {
        return $this->belongsTo(Agenda::class, 'agenda_id');
    }

    /**
     * Get the user that owns the AddPedamping
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function namaUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
