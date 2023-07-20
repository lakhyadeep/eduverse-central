<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\DataTables\ClientsDataTable;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\ClientType;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientsDataTable $dataTable)
    {
        //dd($dataTable);
        return $dataTable->render('client.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $ct = new ClientType;
        $types = $ct->scopeGetAllActiveClientType();
        $data['types'] = $types;
        return view('client.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated) && !empty($validated))
            Client::create($validated);
        $message = "Client created successfully";
        return redirect(route('clients.index'))->with('message', ['type' => 'success', 'text' => $message]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
