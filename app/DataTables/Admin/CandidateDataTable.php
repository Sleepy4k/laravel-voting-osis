<?php

namespace App\DataTables\Admin;

use App\Models\Candidate;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CandidateDataTable extends DataTable
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
            ->editColumn('image', function($query){
                if (file_exists(public_path('storage/image/' . $query->image))) {
                    return '<a href="' . asset("storage/image/".$query->image) . '" data-lightbox="example-1"><img id="zoom-img" class="img-fluid mb-3" src="' . asset("storage/image/".$query->image) . '" width="50"></a>';
                } else {
                    return '<a href="' . asset("image/candidate.jpg") . '" data-lightbox="example-1"><img id="zoom-img" class="img-fluid mb-3" src="' . asset("image/candidate.jpg") . '" width="50"></a>';
                }
            })
            ->editColumn('vision', function($query){
                return Str::limit($query->vision, 100, '...');
            })
            ->editColumn('mission', function($query){
                return Str::limit($query->mission, 100, '...');
            })
            ->addColumn('action', function($query){
                return '<a href="'.route("admin.candidate.edit", $query->id).'" class="btn btn-primary">Edit</a><a href="'.route("admin.candidate.show", $query->id).'" class="btn btn-success">View</a><form class="d-inline" action="'.route("admin.candidate.destroy", $query->id).'" method="post">'.csrf_field().method_field("delete").'<a href="" class="btn btn-danger confirm-delete">Hapus</a></form>';
            })
            ->rawColumns(['action','image'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Candidate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Candidate $model): QueryBuilder
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
                    ->setTableId('candidate-table')
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
                    ->title(trans('table.candidate.id'))
                    ->addClass('text-center'),
            Column::make('chairman')
                    ->title(trans('table.candidate.chairman'))
                    ->addClass('text-center'),
            Column::make('vice_chairman')
                    ->title(trans('table.candidate.vice_chairman'))
                    ->addClass('text-center'),
            Column::make('image')
                    ->title(trans('table.candidate.image'))
                    ->exportable(false)
                    ->searchable(false)
                    ->addClass('text-center'),
            Column::make('vision')
                    ->title(trans('table.candidate.vision'))
                    ->addClass('text-center'),
            Column::make('mission')
                    ->title(trans('table.candidate.mission'))
                    ->addClass('text-center'),
            Column::make('action')
                    ->title(trans('table.candidate.action'))
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
        return 'Candidate_' . date('YmdHis');
    }
}
