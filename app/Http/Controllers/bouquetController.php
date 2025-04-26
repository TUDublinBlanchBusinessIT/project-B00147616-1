<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebouquetRequest;
use App\Http\Requests\UpdatebouquetRequest;
use App\Repositories\bouquetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class bouquetController extends AppBaseController
{
    /** @var bouquetRepository $bouquetRepository*/
    private $bouquetRepository;

    public function __construct(bouquetRepository $bouquetRepo)
    {
        $this->bouquetRepository = $bouquetRepo;
    }

    /**
     * Display a listing of the bouquet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bouquets = $this->bouquetRepository->all();

        return view('bouquets.index')
            ->with('bouquets', $bouquets);
    }

    /**
     * Show the form for creating a new bouquet.
     *
     * @return Response
     */
    public function create()
    {
        return view('bouquets.create');
    }

    /**
     * Store a newly created bouquet in storage.
     *
     * @param CreatebouquetRequest $request
     *
     * @return Response
     */
    public function store(CreatebouquetRequest $request)
    {
        $input = $request->all();

        $bouquet = $this->bouquetRepository->create($input);

        Flash::success('Bouquet saved successfully.');

        return redirect(route('bouquets.index'));
    }

    /**
     * Display the specified bouquet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bouquet = $this->bouquetRepository->find($id);

        if (empty($bouquet)) {
            Flash::error('Bouquet not found');

            return redirect(route('bouquets.index'));
        }

        return view('bouquets.show')->with('bouquet', $bouquet);
    }

    /**
     * Show the form for editing the specified bouquet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bouquet = $this->bouquetRepository->find($id);

        if (empty($bouquet)) {
            Flash::error('Bouquet not found');

            return redirect(route('bouquets.index'));
        }

        return view('bouquets.edit')->with('bouquet', $bouquet);
    }

    /**
     * Update the specified bouquet in storage.
     *
     * @param int $id
     * @param UpdatebouquetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebouquetRequest $request)
    {
        $bouquet = $this->bouquetRepository->find($id);

        if (empty($bouquet)) {
            Flash::error('Bouquet not found');

            return redirect(route('bouquets.index'));
        }

        $bouquet = $this->bouquetRepository->update($request->all(), $id);

        Flash::success('Bouquet updated successfully.');

        return redirect(route('bouquets.index'));
    }

    /**
     * Remove the specified bouquet from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bouquet = $this->bouquetRepository->find($id);

        if (empty($bouquet)) {
            Flash::error('Bouquet not found');

            return redirect(route('bouquets.index'));
        }

        $this->bouquetRepository->delete($id);

        Flash::success('Bouquet deleted successfully.');

        return redirect(route('bouquets.index'));
    }
}
