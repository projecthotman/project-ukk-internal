<?php

namespace App\Http\Controllers;

use App\Models\historyModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pendapatanController extends Controller
{
    public function index()
    {
        $uid = Auth::user()->id;
        $data = historyModel::with(['barang.user'])
        ->where('nama', 'pendapatan')
        ->where('id_user', $uid)
        ->paginate(10);
        return view('layouts.pages.pendapatan.index', compact(['data']));
    }
}
