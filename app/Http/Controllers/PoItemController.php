<?php
namespace App\Http\Controllers;
use App\Models\PoItem;
class PoItemController extends Controller {
    public function index() {
        $poItems = PoItem::paginate(10);
        return view('po_items.index', compact('poItems'));
    }
}