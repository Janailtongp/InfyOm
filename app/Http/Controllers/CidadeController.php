<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Repositories\CidadeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CidadeController extends AppBaseController
{
    /** @var  CidadeRepository */
    private $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepo)
    {
        $this->cidadeRepository = $cidadeRepo;
    }

    /**
     * Display a listing of the Cidade.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cidades = $this->cidadeRepository->all();

        return view('cidades.index')
            ->with('cidades', $cidades);
    }

    /**
     * Show the form for creating a new Cidade.
     *
     * @return Response
     */
    public function create()
    {
        return view('cidades.create');
    }

    /**
     * Store a newly created Cidade in storage.
     *
     * @param CreateCidadeRequest $request
     *
     * @return Response
     */
    public function store(CreateCidadeRequest $request)
    {
        $input = $request->all();

        $cidade = $this->cidadeRepository->create($input);

        Flash::success('Cidade saved successfully.');

        return redirect(route('cidades.index'));
    }

    /**
     * Display the specified Cidade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cidade = $this->cidadeRepository->find($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        return view('cidades.show')->with('cidade', $cidade);
    }

    /**
     * Show the form for editing the specified Cidade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cidade = $this->cidadeRepository->find($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        return view('cidades.edit')->with('cidade', $cidade);
    }

    /**
     * Update the specified Cidade in storage.
     *
     * @param int $id
     * @param UpdateCidadeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCidadeRequest $request)
    {
        $cidade = $this->cidadeRepository->find($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        $cidade = $this->cidadeRepository->update($request->all(), $id);

        Flash::success('Cidade updated successfully.');

        return redirect(route('cidades.index'));
    }

    /**
     * Remove the specified Cidade from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cidade = $this->cidadeRepository->find($id);

        if (empty($cidade)) {
            Flash::error('Cidade not found');

            return redirect(route('cidades.index'));
        }

        $this->cidadeRepository->delete($id);

        Flash::success('Cidade deleted successfully.');

        return redirect(route('cidades.index'));
    }
}
