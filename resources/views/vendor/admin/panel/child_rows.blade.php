<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
    <div class="row">
        <div class="col-md-12">

            @if (count($child_rows))
                <p>Order items:</p>
			
                <table class="table table-condensed table-bordered" style="m-t-10">
                    <thead>
                    <tr>
                        {{-- Table columns --}}
                        @foreach($child_rows_columns as $column)
                            <th>{{ \Illuminate\Support\Str::title(str_replace('_', ' ', $column)) }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($child_rows as $key => $entry)
                        <tr>
                            @foreach($child_rows_columns as $column)
                                <td>{!! $entry->{$column} !!} </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                {!! trans('admin::messages.No translations available.') !!}<br><br>
            @endif
        </div>
    </div>
</div>
