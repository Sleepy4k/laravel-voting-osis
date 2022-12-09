<!DOCTYPE html>
<html lang="en">
    <head>
        @includeIf('partials.head.meta')

        <title>{{ basename(request()->path()) ? ucfirst(basename(request()->path())) . ' |' : '' }} {{ config()->get('app.name') }}</title>

        @includeIf('partials.head.icon')
        @includeIf('partials.head.datatable.css')
    </head>
    <body>
        <table class="table table-bordered table-condensed table-striped">
            @foreach($data as $row)
                @if ($loop->first)
                    <tr>
                        @foreach($row as $key => $value)
                            <th>{!! $key !!}</th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    @foreach($row as $key => $value)
                        @if(is_string($value) || is_numeric($value))
                            <td>{!! $value !!}</td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </body>
</html>
