<?php
namespace App\Http\Controllers;
use App\Models\Item; 
use Illuminate\Http\Request;

class ItemController extends Controller {
    public function index() {
        $items = Item::paginate(10); 
        return view('items.index', compact('items'));
    }
//لمعالجة رفع الصور
    public function store(Request $request) {
        $request->validate([
            'code' => 'required|unique:items,code',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,category_id',
            'unit' => 'required|string|max:50',
            'min_stock' => 'required|integer|min:0',
            'max_stock' => 'required|integer|min:0|gte:min_stock',
            'status' => 'required|boolean',
        ]);

        Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }
}