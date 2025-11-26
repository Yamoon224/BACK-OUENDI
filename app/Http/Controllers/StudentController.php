<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->middleware(['auth', 'verified', 'admin']);
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Total students
        $totalStudents = $this->repository->all([], [['role', '=', 'student']])->count();
        // Paid students (ex: ceux avec paiement confirmé)
        $paidStudents = $this->repository->all([], [['role', '=', 'student'], ['status', '=', 'ENABLE']])->count();
        // Active students (dernière connexion par exemple)
        $activeStudents = $this->repository->all([], [['role', '=', 'student'], ['updated_at', '>=', now()->subWeek()]])->count();
        // Pending students (nouveaux non confirmés)
        $pendingStudents = $this->repository->all([], [['role', '=', 'student'], ['status', '=', 'DISABLE']])->count();
        // Croissance (exemple : variation % par rapport à la semaine précédente)
        $previousWeekTotal = $this->repository->all([], [['role', '=', 'student'], ['created_at', '>=', now()->subWeeks(2)], ['updated_at', '<', now()->subWeek()]])->count();
        $previousWeekPaid = $this->repository->all([], [['role', '=', 'student'], ['status', '=', 'ENABLE'], ['updated_at', '>=', now()->subWeeks(2)], ['updated_at', '<', now()->subWeek()]])->count();
        $previousWeekActive = $this->repository->all([], [['role', '=', 'student'], ['updated_at', '>=', now()->subWeeks(2)], ['updated_at', '<', now()->subWeek()]])->count();
        $previousWeekPending = $this->repository->all([], [['role', '=', 'student'], ['status', '=', 'DISABLE'], ['updated_at', '>=', now()->subWeeks(2)], ['updated_at', '<', now()->subWeek()]])->count();
        
        $growthStudents = $previousWeekTotal ? round((($totalStudents - $previousWeekTotal) / $previousWeekTotal) * 100) : 0;
        $growthPaid     = $previousWeekPaid ? round((($paidStudents - $previousWeekPaid) / $previousWeekPaid) * 100) : 0;
        $growthActive   = $previousWeekActive ? round((($activeStudents - $previousWeekActive) / $previousWeekActive) * 100) : 0;
        $growthPending  = $previousWeekPending ? round((($pendingStudents - $previousWeekPending) / $previousWeekPending) * 100) : 0;

        $students = $this->repository->paginate([], 10, [['role', '=', 'student']]);
        $levels = ['LICENCE I', 'LICENCE II', 'LICENCE III', 'MASTER I', 'MASTER II', 'DOCTORAT'];
        return view('students', compact(
            'levels', 'students',
            'totalStudents', 'paidStudents', 'activeStudents', 'pendingStudents',
            'growthStudents', 'growthPaid', 'growthActive', 'growthPending'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        // 1. Validation des données
        $data = $request->except('_token');

        // 2. Gestion des fichiers uploadés

        if ($request->hasFile('cni_path')) {
            $data['cni_path'] = 'storage/' . $request->file('cni_path')->store('uploads/cni', 'public');
        }

        if ($request->hasFile('student_card_path')) {
            $data['student_card_path'] = 'storage/' . $request->file('student_card_path')->store('uploads/student_cards', 'public');
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = 'storage/' . $request->file('photo')->store('uploads/photos', 'public');
        }

        $data['password'] = Hash::make($data['password']);

        // 3. Création du user
        $user = $this->repository->create($data);

        // 4. Réponse ( pour DataTables / Ajax )
        if ($request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => __('locale.created_successfully'),
                'data'    => $user
            ]);
        }

        // 5. Réponse classique (si jamais le form n'est pas en Ajax)
        return redirect()->back()->with('success', __('locale.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        // 1. Validation des données
        $data = $request->except('_token');

        // 2. Gestion des fichiers uploadés
        if ($request->hasFile('cni_path')) {
            $data['cni_path'] = 'storage/' . $request->file('cni_path')->store('uploads/cni', 'public');
        }

        if ($request->hasFile('student_card_path')) {
            $data['student_card_path'] = 'storage/' . $request->file('student_card_path')->store('uploads/student_cards', 'public');
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = 'storage/' . $request->file('photo')->store('uploads/photos', 'public');
        }

        if (!empty($data['university'])) {
            $data['university'] = strtoupper($data['university']);
        }

        $user = $this->repository->update($id, $data);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
