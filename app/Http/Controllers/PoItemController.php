<?php

namespace App\Http\Controllers;

use App\Models\PoItem;
use Illuminate\Http\Request;

class PoItemController extends Controller
{
    public function index()
    {
        $po_items = PoItem::paginate(10);
        return view('po_items.index', compact('po_items'));
    }

    public function store(Request $request)
    {
        // التحقق من البيانات لضمان دقتها (Task 4)
        $request->validate([
            'quantity' => 'required|numeric',
            'unit_price' => 'required|numeric',
        ]);

        PoItem::create($request->all());
        return back()->with('success', 'Item added to order.');
    }

    // الحل: استخدام Route Model Binding بحقن موديل PoItem مباشرة
    public function update(Request $request, PoItem $poItem)
    {
        // تحديث البيانات باستخدام Eloquent
        $poItem->update($request->all());
        
        return back()->with('success', 'Item updated successfully.');
    }
}