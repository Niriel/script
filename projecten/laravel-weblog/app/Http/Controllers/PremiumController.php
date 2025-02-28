<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostPremiumRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use app\Models\User;

class PremiumController extends Controller
{
    public function index()
    {
        return view('premium.index');
    }

    public function purchase()
    {
        return view('premium.purchase');
    }

    public function store(PostPremiumRequest $request)
    {
        $validated = $request->validated();
        $validated['has_premium'] = true;
        $user = User::find(Auth::id());
        $user->has_premium = true;
        $user->save();
        return redirect()->route('dashboard.index');
    }
}
