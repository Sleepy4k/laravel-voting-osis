<?php

namespace App\DataTables\System;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Spatie\TranslationLoader\LanguageLine;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class TranslateDataTable extends DataTable
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
            ->editColumn('lang_id', function($query) {
                if ($query->text) {
                    return $query->text['id'];
                } else {
                    return '-';
                }
            })
            ->editColumn('lang_en', function($query){
                if ($query->text) {
                    return $query->text['en'];
                } else {
                    return '-';
                }
            })
            ->addColumn('action', function($query){
                return '<a href="'.route("admin.system.translate.edit", $query->id).'" class="btn btn-primary">Edit</a><a href="'.route("admin.system.translate.show", $query->id).'" class="btn btn-success">View</a><form class="d-inline" action="'.route("admin.system.translate.destroy", $query->id).'" method="post">'.csrf_field().method_field("delete").'<a href="" class="btn btn-danger confirm-delete">Hapus</a></form>';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Spatie\TranslationLoader\LanguageLine $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LanguageLine $model): QueryBuilder
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
                    ->setTableId('translate-table')
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
                        Button::make('reset'),
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
                    ->title(trans('table.translate.id'))
                    ->addClass('text-center'),
            Column::make('group')
                    ->title(trans('table.translate.group'))
                    ->addClass('text-center'),
            Column::make('key')
                    ->title(trans('table.translate.key'))
                    ->addClass('text-center'),
            Column::computed('lang_id')
                    ->title(trans('table.translate.lang_id'))
                    ->addClass('text-center'),
            Column::computed('lang_en')
                    ->title(trans('table.translate.lang_en'))
                    ->addClass('text-center'),
            Column::computed('action')
                    ->title(trans('table.translate.action'))
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
        return 'Translate_' . date('YmdHis');
    }
}
