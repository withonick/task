<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index(){
        $data = Auth::user()->sessions;
        return view('index', ['data' => $data]);
    }

    public function terminateAll()
    {
        DB::table('sessions')
            ->where('user_id', auth()->id())
            ->where('id', '<>', session()->getId())
            ->delete();
        return redirect()->back();
    }

    public function terminate(Session $session)
    {
        $session->terminate();
        return redirect()->back();
    }
}
