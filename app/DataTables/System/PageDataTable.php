<?php

namespace App\DataTables\System;

use App\Models\Page;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PageDataTable extends DataTable
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
            ->editColumn('menu_id', function($query){
                return $query->menu->label;
            })
            ->editColumn('permission', function($query){
                return $query->permission ?: '-';
            })
            ->addColumn('action', function($query){
                return '<a href="'.route("admin.system.page.edit", $query->id).'" class="btn btn-primary">Edit</a><a href="'.route("admin.system.page.show", $query->id).'" class="btn btn-success">View</a><form class="d-inline" action="'.route("admin.system.page.destroy", $query->id).'" method="post">'.csrf_field().method_field("delete").'<a href="" class="btn btn-danger confirm-delete">Hapus</a></form>';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Page $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Page $model): QueryBuilder
    {
        return $model->with('menu')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('page-table')
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
                    ->title(trans('table.page.id'))
                    ->addClass('text-center'),
            Column::make('name')
                    ->title(trans('table.page.name'))
                    ->addClass('text-center'),
            Column::make('label')
                    ->title(trans('table.page.label'))
                    ->addClass('text-center'),
            Column::make('menu_id')
                    ->title(trans('table.page.menu_id'))
                    ->addClass('text-center'),
            Column::make('route')
                    ->title(trans('table.page.route'))
                    ->addClass('text-center'),
            Column::make('icon')
                    ->title(trans('table.page.icon'))
                    ->addClass('text-center'),
            Column::make('permission')
                    ->title(trans('table.page.permission'))
                    ->addClass('text-center'),
            Column::computed('action')
                    ->title(trans('table.page.action'))
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
        return 'Page_' . date('YmdHis');
    }
}