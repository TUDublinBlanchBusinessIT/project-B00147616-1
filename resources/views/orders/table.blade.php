<table class="table table-responsive" id="orders-table">
    <thead>
        <th>Orderdate</th>
        <th>Deliverytime</th>
        <th>Customerid</th>
        <th>Bouquetid</th>
        <th>Quantity</th>
        <th>Total</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($orders as $orders)
        <tr>
            <td>{!! $orders->orderdate !!}</td>
            <td>{!! $orders->deliverytime !!}</td>
            <td>{!! $orders->customerid !!}</td>
            <td>{!! $orders->bouquetid !!}</td>
            <td>{!! $orders->quantity !!}</td>
            <td>{!! $orders->total !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $orders->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$orders->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('orders.edit', [$orders->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>