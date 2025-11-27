<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() 
    {
        // -------------------------
        // Users
        // -------------------------
        $users = User::all();
        $totalUsers = $users->count();

        $lastWeek = Carbon::now()->subWeek();
        $usersLastWeek = User::where('created_at', '>=', $lastWeek)->count();
        $growthUsers = $usersLastWeek ? round(($totalUsers - $usersLastWeek) / $usersLastWeek * 100, 1) : 0;

        // Active students
        $activeStudents = User::where('role', 'student')->where('status', 'ENABLE')->count();
        $activeStudentsLastWeek = User::where('role', 'student')
                                      ->where('status', 'ENABLE')
                                      ->where('created_at', '>=', $lastWeek)
                                      ->count();
        $growthActive = $activeStudentsLastWeek ? round(($activeStudents - $activeStudentsLastWeek) / $activeStudentsLastWeek * 100, 1) : 0;

        // -------------------------
        // Credits
        // -------------------------
        $pendingCredits = Credit::where('status', 'PENDING')->count();
        $approvedCredits = Credit::where('status', 'APPROVED')->count();

        $pendingCreditsLastWeek = Credit::where('status', 'PENDING')->where('created_at', '>=', $lastWeek)->count();
        $approvedCreditsLastWeek = Credit::where('status', 'APPROVED')->where('created_at', '>=', $lastWeek)->count();

        $growthPending = $pendingCreditsLastWeek ? round(($pendingCredits - $pendingCreditsLastWeek) / $pendingCreditsLastWeek * 100, 1) : 0;
        $growthApproved = $approvedCreditsLastWeek ? round(($approvedCredits - $approvedCreditsLastWeek) / $approvedCreditsLastWeek * 100, 1) : 0;
        $users = $users->take(6);
        // -------------------------
        // Passer à la vue
        // -------------------------
        return view('dashboard', compact(
            'users',
            'totalUsers', 'growthUsers',
            'activeStudents', 'growthActive',
            'pendingCredits', 'growthPending',
            'approvedCredits', 'growthApproved'
        ));
    }

    public function setLocaleLanguage($locale)
    {
        session(compact('locale'));
    
        app()->setLocale(session('locale'));
        return back()->with(['message'=>'']);
    }
}
