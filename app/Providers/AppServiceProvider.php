<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // استدعاء الـ Gate للتحكم بالصلاحيات
use Illuminate\Pagination\Paginator; // استدعاء الـ Paginator لتصحيح تنسيق الجداول

class AppServiceProvider extends ServiceProvider
{
    /**
     * تسجيل أي خدمات خاصة بالتطبيق.
     */
    public function register(): void
    {
    }

    /**
     * تفعيل خدمات التطبيق عند التشغيل (Bootstrap).
     */
    public function boot(): void
    {
        // 1. تعريف صلاحية "الآدمن فقط" للتحكم في ظهور القوائم الجانبية والأزرار
        // هذا الشرط يعتمد على حقل 'role' الموجود في جدول الـ users
        Gate::define('admin-only', function ($user) {
            return $user->role === 'Admin';
        });

        // 2. تعريف صلاحية "المدير والآدمن" للعمليات الإدارية والموافقة على الطلبات 
        Gate::define('manager-access', function ($user) {
            return in_array($user->role, ['Admin', 'Manager']);
        });

        // 3. إجبار النظام على استخدام تنسيق Bootstrap 5 لعمليات الترقيم (Pagination)
        Paginator::useBootstrapFive();
    }
}