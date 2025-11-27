<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return UserResource::collection($this->repository->all());
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();

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

        $data['password'] = Hash::make($data['password']);

        $user = $this->repository->create($data);
        return new UserResource($user);
    }

    public function show($id)
    {
        $user = $this->repository->find($id);
        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->validated();

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

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user = $this->repository->update($id, $data);
        return new UserResource($user);
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->noContent();
    }

    /**
     * Login API – JWT
     */
    public function apiLogin(Request $request)
    {
        $phone = $request->input('phone');
        $password = $request->input('password');
        $role = 'student';

        $user = User::with('credits')->firstWhere(compact('phone', 'role'));

        if (! $user || ! Hash::check($password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Identifiants Incorrects',
            ], 401);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
        ]);
    }

    /**
     * Logout API – JWT
     */
    public function apiLogout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'success' => true,
            'message' => 'Déconnexion réussie'
        ]);
    }
}
