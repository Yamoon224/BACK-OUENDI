<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Repositories\CreditRepository;
use App\Http\Resources\CreditResource;
use App\Http\Requests\CreditStoreRequest;
use App\Http\Requests\CreditUpdateRequest;
use Illuminate\Http\Client\Request;

class CreditController extends Controller
{
    protected $repository;

    public function __construct(CreditRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Afficher la liste des crédits.
     */
    public function index()
    {
        // Vérifier si un user_id est passé en paramètre
        $userId = request()->query('user_id');

            // Récupérer les crédits de l'utilisateur donné
        $credits = $userId 
            ? $this->repository->all([], [['user_id', '=', $userId]])
                : $this->repository->all();

        return CreditResource::collection($credits);
    }

    /**
     * Enregistrer un nouveau crédit.
     */
    public function store(CreditStoreRequest $request)
    {
        $credit = $this->repository->create($request->validated());
        return (new CreditResource($credit))
            ->response()
            ->setStatusCode(201);
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
        return new CreditResource($credit);
    }

    /**
     * Supprimer un crédit.
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->noContent();
    }
}
