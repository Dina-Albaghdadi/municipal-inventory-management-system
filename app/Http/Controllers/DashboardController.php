<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Warehouse;
use App\Models\PurchaseOrder;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * عرض لوحة التحكم مع الإحصائيات الحية.
     */
    public function index(): View
    {
        // 1. إجمالي الأصناف المسجلة في جدول items 
        $totalItems = Item::count();

        // 2. عدد المستودعات التي حالتها 'Active' بناءً على جدول warehouses 
        $activeWarehouses = Warehouse::where('status', 'Active')->count();

        // 3. طلبات الشراء المعلقة (Draft أو Ordered) بناءً على جدول purchase_orders 
        $pendingOrders = PurchaseOrder::whereIn('status', ['Draft', 'Ordered'])->count();

        // 4. تنبيهات نقص المخزون: مقارنة كمية المستودع (stock) بحد إعادة الطلب (items) 
        $lowStockAlerts = Stock::whereHas('item', function($query) {
            $query->whereColumn('stock.quantity', '<=', 'items.reorder_level');
        })->count();

        // تمرير البيانات لواجهة dashboard.blade.php
        return view('dashboard', compact(
            'totalItems', 
            'activeWarehouses', 
            'pendingOrders', 
            'lowStockAlerts'
        ));
    }
}