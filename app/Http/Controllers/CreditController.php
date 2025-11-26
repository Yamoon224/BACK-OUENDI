<?php

namespace App\Http\Controllers;

use App\Repositories\CreditRepository;
use App\Http\Resources\CreditResource;
use App\Http\Requests\CreditStoreRequest;
use App\Http\Requests\CreditUpdateRequest;

class CreditController extends Controller
{
    protected $repository;

    public function __construct(CreditRepository $repository)
    {
        $this->middleware(['auth', 'verified']);
        $this->repository = $repository;
    }

    /**
     * Afficher la liste des crédits.
     */
    public function index()
    {
        $credits = $this->repository->all();
        return view('credits.index', compact('credits'));
    }

    /**
     * Afficher le formulaire de création d'un crédit.
     */
    public function create()
    {
        return view('credits.add');
    }

    /**
     * Afficher le formulaire d'édition d'un crédit.
     */
    public function edit(int $id)
    {
        $credit = $this->repository->find($id);
        return view('credits.edit', compact('credit'));
    }

    /**
     * Enregistrer un nouveau crédit.
     */
    public function store(CreditStoreRequest $request)
    {
        $credit = $this->repository->create($request->validated());
        return redirect()->route('credits.index');
    }

    /**
     * Afficher un crédit spécifique.
     */
    public function show($id)
    {
        $credit = $this->repository->find($id);
        return new CreditResource($credit);
    }

    /**
     * Mettre à jour un crédit.
     */
    public function update(CreditUpdateRequest $request, $id)
    {
        $credit = $this->repository->update($id, $request->validated());
        return redirect()->route('credits.index');
    }

    /**
     * Supprimer un crédit.
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('credits.index');
    }
}
