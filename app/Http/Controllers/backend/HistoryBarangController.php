<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryBarangController extends Controller
{
    public function History()
    {
        return view('admin.history.history');
    }
    public function HistoryTimeline()
    {
        return view('admin.history.history_timeline');
    }
}
