<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientType extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'type_name',
        'status',
        'created_by',
        'updated_by'
    ];


    function clients()
    {

        return $this->belongsTo(Client::class, 'id', 'client_type_id');
    }


    // scope Functions ///

    public function scopeGetAllActiveClientType()
    {
        return ClientType::where('status', self::STATUS_ACTIVE)->orderby('type_name', 'asc')->get();
    }
}
