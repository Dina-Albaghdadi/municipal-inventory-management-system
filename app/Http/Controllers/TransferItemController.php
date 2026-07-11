<?php
namespace App\Http\Controllers;
use App\Models\TransferItem;
class TransferItemController extends Controller {
    public function index() {
        $transferItems = TransferItem::paginate(10);
        return view('transfer_items.index', compact('transferItems'));
    }
}