<?php

namespace App\DataTables\System;

use App\Models\Menu;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class MenuDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                return '<a href="'.route("admin.system.menu.edit", $query->id).'" class="btn btn-primary">Edit</a><a href="'.route("admin.system.menu.show", $query->id).'" class="btn btn-success">View</a><form class="d-inline" action="'.route("admin.system.menu.destroy", $query->id).'" method="post">'.csrf_field().method_field("delete").'<a href="" class="btn btn-danger confirm-delete">Hapus</a></form>';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Menu $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Menu $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('menu-table')
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
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
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
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id')
                    ->title(trans('table.menu.id'))
                    ->addClass('text-center'),
            Column::make('name')
                    ->title(trans('table.menu.name'))
                    ->addClass('text-center'),
            Column::make('label')
                    ->title(trans('table.menu.label'))
                    ->addClass('text-center'),
            Column::make('ordering')
                    ->title(trans('table.menu.ordering'))
                    ->addClass('text-center'),
            Column::make('role')
                    ->title(trans('table.menu.role'))
                    ->addClass('text-center'),
            Column::computed('action')
                    ->title(trans('table.menu.action'))
                    ->exportable(false)
                    ->printable(false)
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
        return 'Menu_' . date('YmdHis');
    }
}