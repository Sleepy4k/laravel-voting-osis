<?php

namespace App\DataTables\Audit;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ModelDataTable extends DataTable
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
            ->editColumn('subject', function($query){
                $data = null;
                if (empty($query->subject_id)) {
                    $data = '-';
                } else {
                    $data = $query->subject_id;
                }
                if (empty($query->subject_type)) {
                    $data .= ' | -';
                } else {
                    $data .= ' | '.$query->subject_type;
                }

                return $data;
            })
            ->editColumn('causer', function($query){
                $data = null;
                if (empty($query->causer_id)) {
                    $data = '-';
                } else {
                    $data = $query->causer_id;
                }
                if (empty($query->causer_type)) {
                    $data .= ' | -';
                } else {
                    $data .= ' | '.$query->causer_type;
                }

                return $data;
            })
            ->editColumn('properties', function($query){
                return json_encode($query->properties);
            })
            ->editColumn('event', function($query){
                if (empty($query->event)) {
                    return '-';
                } else {
                    return $query->event;
                }
            })
            ->editColumn('created_at', function($query){
                return dateYmdToDmy($query->created_at);
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \patie\Activitylog\Models\Activity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $model): QueryBuilder
    {
        return $model->where('log_name', 'model');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('model-table')
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
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                        Button::make('copy')
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
                    ->title(trans('table.model.id'))
                    ->addClass('text-center'),
            Column::make('log_name')
                    ->title(trans('table.model.log_name'))
                    ->addClass('text-center'),
            Column::make('description')
                    ->title(trans('table.model.description'))
                    ->addClass('text-center'),
            Column::make('event')
                    ->title(trans('table.model.event'))
                    ->searchable(false)
                    ->addClass('text-center'),
            Column::computed('subject')
                    ->title(trans('table.model.subject'))
                    ->searchable(false)
                    ->addClass('text-center'),
            Column::computed('causer')
                    ->title(trans('table.model.causer'))
                    ->searchable(false)
                    ->addClass('text-center'),
            Column::make('properties')
                    ->title(trans('table.model.properties'))
                    ->searchable(false)
                    ->addClass('text-center'),
            Column::computed('created_at')
                    ->title(trans('table.model.created_at'))
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
        return 'Model_' . date('YmdHis');
    }
}
