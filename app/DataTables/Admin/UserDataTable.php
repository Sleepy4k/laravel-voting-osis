<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('voting_status', function($query){
                if ($query->voting_status == 'true') {
                    return '<span class="badge bg-success">Sudah Voting</span>';
                } else {
                    return '<span class="badge bg-danger">Belum Voting</span>';
                }
            })
            ->addColumn('action', function($query){
                return '<a href="'.route("admin.user.edit", $query->id).'" class="btn btn-primary">Edit</a><a href="'.route("admin.user.show", $query->id).'" class="btn btn-success">View</a><form class="d-inline" action="'.route("admin.user.destroy", $query->id).'" method="post">'.csrf_field().method_field("delete").'<a href="" class="btn btn-danger confirm-delete">Hapus</a></form>';
            })
            ->rawColumns(['action','voting_status'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        if (auth()->user()->getRoleNames()[0] == 'superadmin') {
            return $model->newQuery();
        }
        
        return $model->role('user');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->language($this->getLanguage())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->lengthChange(true)
                    ->lengthMenu()
                    ->pageLength(10)
                    ->responsive(true)
                    ->autoWidth(true)
                    ->buttons([
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get language.
     *
     * @return array
     */
    protected function getLanguage()
    {
        return trans('datatable.translate');
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                    ->title(trans('table.user.id'))
                    ->addClass('text-center'),
            Column::make('name')
                    ->title(trans('table.user.name'))
                    ->addClass('text-center'),
            Column::make('nis')
                    ->title(trans('table.user.nis'))
                    ->addClass('text-center'),
            Column::make('grade')
                    ->title(trans('table.user.grade'))
                    ->addClass('text-center'),
            Column::make('voting_status')
                    ->title(trans('table.user.voting_status'))
                    ->addClass('text-center'),
            Column::make('action')
                    ->title(trans('table.user.action'))
                    ->exportable(false)
                    ->printable(false)
                    ->searchable(false)
                    ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
