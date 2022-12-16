<?php

namespace App\DataTables\Audit;

use App\Traits\LogReader;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class QueryDataTable extends DataTable
{
    use LogReader;

    /**
     * Init log file.
     *
     * @return Collection
     */
    public function customData()
    {
        return collect(
            (object) $this->getFileList('daily', 'query')
        );
    }

    /**
     * Build DataTable class.
     *
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable()
    {
        return datatables()
            ->of($this->customData())
            ->addColumn('action', function($query){
                $name = explode('.', $query['name'])[0];

                return '<a href="'.route("admin.audit.query.show", $name).'" class="btn btn-success">View</a>';
            })
            ->setRowId('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->serverSide(false)
                    ->setTableId('query-table')
                    ->columns($this->getColumns())
                    ->language($this->getLanguage())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'desc')
                    ->lengthChange(true)
                    ->lengthMenu()
                    ->pageLength(10)
                    ->responsive(true)
                    ->autoWidth(true)
                    ->buttons([
                        Button::make('export'),
                        Button::make('print'),
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
            Column::make('name')
                    ->title(trans('table.query.name'))
                    ->addClass('text-center'),
            Column::make('size')
                    ->title(trans('table.query.size'))
                    ->addClass('text-center'),
            Column::make('type')
                    ->title(trans('table.query.type'))
                    ->addClass('text-center'),
            Column::make('content')
                    ->title(trans('table.query.content'))
                    ->addClass('text-center'),
            Column::make('last_updated')
                    ->title(trans('table.query.last_updated'))
                    ->addClass('text-center'),
            Column::make('action')
                    ->title(trans('table.query.action'))
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
        return 'Query_' . date('YmdHis');
    }
}
