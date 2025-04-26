<table class="table table-responsive" id="bouquets-table">
    <thead>
        <th>Productid</th>
        <th>Flowertype</th>
        <th>Size</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($bouquets as $bouquet)
        <tr>
            <td>{!! $bouquet->productid !!}</td>
            <td>{!! $bouquet->flowertype !!}</td>
            <td>{!! $bouquet->size !!}</td>
            <td>
                {!! Form::open(['route' => ['bouquets.destroy', $bouquet->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bouquets.show', [$bouquet->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('bouquets.edit', [$bouquet->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>