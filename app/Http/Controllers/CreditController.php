<?php

namespace App\Http\Controllers;

use App\Repositories\CreditRepository;
use App\Http\Resources\CreditResource;
use App\Http\Requests\CreditStoreRequest;
use App\Http\Requests\CreditUpdateRequest;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class CreditController extends Controller
{
    protected $repository;
    protected $studentRepository;

    public function __construct(CreditRepository $repository, UserRepository $studentRepository)
    {
        $this->middleware(['auth', 'verified']);
        $this->repository = $repository;
        $this->studentRepository = $studentRepository;
    }

    /**
     * Afficher la liste des crédits.
     */
    public function index()
    {
        $credits = $this->repository->all();
        $students = $this->studentRepository->all([], [['role', '=', 'student']]);

        // Récupérer toutes les demandes de crédits
        $totalCredits = $credits->count();
        $pendingCredits = $credits->where('status', 'pending')->count();
        $approvedCredits = $credits->where('status', 'approved')->count();
        $rejectedCredits = $credits->where('status', 'rejected')->count();

        // Calculer la croissance par rapport à la semaine dernière
        $now = Carbon::now();
        $lastWeek = $now->subWeek();

        $totalLastWeek = $credits->where('created_at', '>=', $lastWeek)->count();
        $pendingLastWeek = $credits->where('status', 'pending')
                                ->where('created_at', '>=', $lastWeek)
                                ->count();
        $approvedLastWeek = $credits->where('status', 'approved')
                                ->where('created_at', '>=', $lastWeek)
                                ->count();
        $rejectedLastWeek = $credits->where('status', 'rejected')
                                ->where('created_at', '>=', $lastWeek)
                                ->count();

        // Calcul des pourcentages de croissance
        $growthTotal = $totalLastWeek ? round(($totalCredits - $totalLastWeek) / $totalLastWeek * 100, 1) : 0;
        $growthPending = $pendingLastWeek ? round(($pendingCredits - $pendingLastWeek) / $pendingLastWeek * 100, 1) : 0;
        $growthApproved = $approvedLastWeek ? round(($approvedCredits - $approvedLastWeek) / $approvedLastWeek * 100, 1) : 0;
        $growthRejected = $rejectedLastWeek ? round(($rejectedCredits - $rejectedLastWeek) / $rejectedLastWeek * 100, 1) : 0;

        return view('credits', compact(
            'credits', 'students',
            'totalCredits', 'pendingCredits', 'approvedCredits', 'rejectedCredits',
            'growthTotal', 'growthPending', 'growthApproved', 'growthRejected'
        ));
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
