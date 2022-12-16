<?php

namespace App\DataTables\Audit;

use App\Traits\LogReader;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class SystemShowDataTable extends DataTable
{
    use LogReader;

    /**
     * Init log file.
     *
     * @return Collection
     */
    public function customData()
    {
        $name = basename(request()->path());

        return collect(
            (object) $this->getFileContent($name)
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
                    ->setTableId('system-show-table')
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
            Column::make('env')
                    ->title(trans('table.system.env'))
                    ->addClass('text-center'),
            Column::make('type')
                    ->title(trans('table.system.type'))
                    ->addClass('text-center'),
            Column::make('timestamp')
                    ->title(trans('table.system.timestamp'))
                    ->addClass('text-center'),
            Column::make('message')
                    ->title(trans('table.system.message'))
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
        return 'System_show_' . date('YmdHis');
    }
}
