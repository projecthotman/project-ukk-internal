<?php

namespace App\Http\Controllers;

use App\Models\historyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengeluaranController extends Controller
{
    public function index()
    {
        $uid = Auth::user()->id;
        $data = historyModel::with(['barang.user'])
        ->where('nama', 'beli')
        ->where('id_user', $uid)
        ->paginate(10);
        return view('layouts.pages.pengeluaran.index', compact([
            'data'
        ]));
    }
}
