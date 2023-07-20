<?php

namespace App\DataTables;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */

    const TABLE_ID = "clients-table";
    public function dataTable()
    {
        $query = (new Client)->scopeGetAllClientsWithClientType();
        return datatables($query)
            ->addColumn('client_type_id', static function (Client $client) {
                return $client->clientType->type_name;
            })

            ->addColumn('created_at', static function (Client $client) {
                return $client->getCreatedAt();
            })
            ->addColumn('updated_at', static function (Client $client) {
                return $client->getUpdatedAt();
            })

            ->addColumn('status', static function (Client $client) {
                $table_id = self::TABLE_ID;
                $status = view('client.button.status')->with(compact('client', 'table_id'))->render();
                return $status;
            })
            ->addColumn('action', static function (Client $client) {
                $table_id = self::TABLE_ID;
                $action = view('client.button.action')->with(compact('client', 'table_id'))->render();
                return $action;
            })
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Client $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html()
    {
        return $this->builder()
            ->setTableId(self::TABLE_ID)
            ->columns($this->getColumns())
            ->minifiedAjax();
        // ->parameters([
        //     'responsive' => true,
        // ]);
    }
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('id', 'SL.No')->width(2),
            Column::make('client_name')->width(2),
            Column::computed('client_type_id', 'Client Type')->width(2),
            Column::make('primary_contact_name')->width(2),
            Column::make('primary_contact_number')->width(2),
            Column::make('email')->width(2),
            // Column::make('plan_id')->width(2),
            Column::computed('created_at')->width(2),
            Column::computed('updated_at')->width(2),
            Column::make('status'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(20)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Clients_' . date('YmdHis');
    }
}
