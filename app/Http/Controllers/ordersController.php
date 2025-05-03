<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateordersRequest;
use App\Http\Requests\UpdateordersRequest;
use App\Repositories\ordersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderDetail;


class ordersController extends AppBaseController
{
    /** @var ordersRepository $ordersRepository*/
    private $ordersRepository;

    public function __construct(ordersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
    }

    /**
     * Display a listing of the orders.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $orders = $this->ordersRepository->all();

        return view('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new orders.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created orders in storage.
     *
     * @param CreateOrdersRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdersRequest $request)
    {
        $input = $request->all();

        $orders = $this->ordersRepository->create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified orders.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->ordersRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified orders.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->ordersRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with('order', $order);
    }

    /**
     * Update the specified orders in storage.
     *
     * @param int $id
     * @param UpdateOrdersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdersRequest $request)
{
    $order = $this->ordersRepository->find($id);

    if (empty($order)) {
        Flash::error('Order not found');
        return redirect(route('orders.index'));
    }

    $order = $this->ordersRepository->update($request->all(), $id);

    Flash::success('Order updated successfully.');
    return redirect(route('orders.index'));
}

    /**
     * Remove the specified orders from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->ordersRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->ordersRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }

    /** function for checkout form */
    public function checkout()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            $lineitems = array();
            foreach ($cart as $productid => $qty) {
                $lineitem['product'] = \App\Models\Product::find($productid);
                $lineitem['qty'] = $qty;
                $lineitems[] = $lineitem;
            }
            return view('orders.checkout')->with('lineitems', $lineitems);
        }
        else {
            Flash::error("There are no items in your cart");
            return redirect(route('products.displaygrid'));
        }
    }

    /** function to place order */
    public function placeorder(Request $request)
{
    $thisOrder = new Order();
    $thisOrder->orderdate = (new \DateTime())->format("Y-m-d");
    $thisOrder->save();

    $orderID = $thisOrder->id;
    $productids = $request->productid;
    $quantities = $request->quantity;

    for ($i = 0; $i < sizeof($productids); $i++) {
        OrderDetail::create([
            'order_id' => $orderID,
            'product_id' => $productids[$i],
            'quantity' => $quantities[$i],
            'price' => \App\Models\Product::find($productids[$i])->price, // optional if price is static
        ]);
    }

    Session::forget('cart');
    Flash::success("Your Order has been placed.");
    return redirect(route('products.displaygrid'));
}
}
