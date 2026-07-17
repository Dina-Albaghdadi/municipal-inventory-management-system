<?php

namespace App\Http\Controllers;

use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        // استخدام الترقيم (Pagination)
        $stocks = Stock::with(['warehouse', 'item'])->paginate(10);
        return view('stocks.index', compact('stocks'));
    }


    public function show(Stock $stock)
    {
        // تحميل العلاقات لضمان عرض البيانات في الواجهة
        $stock->load(['warehouse', 'item']);
        return view('stocks.show', compact('stock'));
    }
}