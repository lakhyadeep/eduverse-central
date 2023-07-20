<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $guarded = [];
    // 'client_name',
    // 'unqiue_client_id',
    // 'client_type_id',
    // 'email',
    // 'primary_contact_name',
    // 'primary_contact_number',
    // 'otp_verifiction_code',
    // 'address_line_1',
    // 'address_line_2',
    // 'plan_id',
    // 'logo',
    // 'status',
    // 'created_by',
    // 'updated_by'


    ////////relationship functions///////

    public function clientType()
    {
        return $this->hasOne(ClientType::class, 'id', 'client_type_id');
    }

    /////////end of relationship funtions///////////


    ////////////////Scope functions/////////////
    public function scopeGetAllClientsWithClientType()
    {
        $clients = Client::with('clientType')->get();
        return $clients;
    }

    ////////////////////////////




    /////////////Entity functions/////////////

    function getId()
    {
        return $this->id;
    }


    public function getCreatedAt()
    {
        return date('d/m/Y H:i A', strtotime($this->created_at));
    }

    public function getUpdatedAt()
    {
        return date('d/m/Y H:i A', strtotime($this->updated_at));
    }



    public function getEditUrl()
    {
        return route('clients.edit', ['client' => $this->getId()]);
    }

    public function getViewUrl()
    {
        return route('clients.view', ['client' => $this->getId()]);
    }
}
