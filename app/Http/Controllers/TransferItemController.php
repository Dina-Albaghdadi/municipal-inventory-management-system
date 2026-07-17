<?php

namespace App\Http\Controllers;

use App\Models\TransferItem;
use Illuminate\Http\Request;

class TransferItemController extends Controller
{
    public function index()
    {
        $transfer_items = TransferItem::with(['transferOrder', 'item'])->paginate(10);
        return view('transfer_items.index', compact('transfer_items'));
    }

    public function store(Request $request)
    {
        TransferItem::create($request->all());
        return back();
    }
}