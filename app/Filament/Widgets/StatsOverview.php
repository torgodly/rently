<?php

namespace App\Filament\Widgets;

use App\Models\Branch;
use App\Models\Car;
use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    // دالة للحصول على الإحصائيات
    protected function getStats(): array
    {
        $user = Auth::user(); // الحصول على معلومات المستخدم الحالي
        $userType = $user->type; // تحديد نوع المستخدم

        if ($userType === 'admin') {
            // الحصول على إحصائيات المسؤول
            return $this->getAdminStats();
        }

        if ($userType === 'manager') {
            // الحصول على إحصائيات المدير
            return $this->getManagerStats($user->branch->id);
        }

        if ($userType === 'user') {
            // الحصول على إحصائيات المستخدم
            return $this->getUserStats($user->id);
        }

        return []; // إرجاع مصفوفة فارغة إذا لم يكن نوع المستخدم معروفًا
    }


    // دالة للحصول على إحصائيات المستخدم
    private function getUserStats(int $userId): array
    {
        return [
                // إحصائية إجمالي الطلبات
                $this->createStat(__('Total Orders'), Order::where('user_id', $userId)->count(), 'blue', 'tabler-package'),

                // إحصائية الطلبات النشطة
                $this->createStat(__('Active Orders'), Order::where('user_id', $userId)->where('status', 'active')->count(), 'green', 'tabler-check'),

                // إحصائية الطلبات المكتملة
                $this->createStat(__('Completed Orders'), Order::where('user_id', $userId)->where('status', 'completed')->count(), 'yellow', 'tabler-check'),

                // إحصائية الطلبات المعلقة
                $this->createStat(__('Pending Orders'), Order::where('user_id', $userId)->where('status', 'pending')->count(), 'orange', 'tabler-clock'),
        ];
    }

// دالة للحصول على إحصائيات المسؤول
private
function getAdminStats(): array
{
    return [
        // إحصائية إجمالي الطلبات
        $this->createStat(__('Total Orders'), Order::count(), 'blue', 'tabler-package'),

        // إحصائية الطلبات النشطة
        $this->createStat(__('Active Orders'), Order::where('status', 'active')->count(), 'green', 'tabler-check'),

        // إحصائية الطلبات المكتملة
        $this->createStat(__('Completed Orders'), Order::where('status', 'completed')->count(), 'yellow', 'tabler-check'),

        // إحصائية الطلبات المعلقة
        $this->createStat(__('Pending Orders'), Order::where('status', 'pending')->count(), 'orange', 'tabler-clock'),

        // إحصائية إجمالي الفروع
        $this->createStat(__('Total Branches'), Branch::count(), 'purple', 'tabler-building'),

        // إحصائية إجمالي العملاء
        $this->createStat(__('Total Customers'), User::where('type', 'user')->count(), 'red', 'tabler-users'),

        // إحصائية إجمالي المواقع
        $this->createStat(__('Total Locations'), Branch::count(), 'cyan', 'tabler-map'),

        // إحصائية إجمالي السيارات
        $this->createStat(__('Total Cars'), Car::count(), 'teal', 'tabler-car'),

        // إحصائية السيارات المتاحة
        $this->createStat(__('Available Cars'), Car::where('available', '1')->count(), 'lime', 'tabler-car'),
    ];
}

// دالة للحصول على إحصائيات المدير
private
function getManagerStats(int $branchId): array
{
    return [
        // إحصائية إجمالي الطلبات في الفرع
        $this->createStat(__('Total Orders'), $this->getBranchOrderCount($branchId), 'blue', 'tabler-package'),

        // إحصائية الطلبات النشطة في الفرع
        $this->createStat(__('Active Orders'), $this->getBranchOrderCount($branchId, 'active'), 'green', 'tabler-check'),

        // إحصائية الطلبات المكتملة في الفرع
        $this->createStat(__('Completed Orders'), $this->getBranchOrderCount($branchId, 'completed'), 'yellow', 'tabler-check'),

        // إحصائية الطلبات المعلقة في الفرع
        $this->createStat(__('Pending Orders'), $this->getBranchOrderCount($branchId, 'pending'), 'orange', 'tabler-clock'),

        // إحصائية إجمالي السيارات في الفرع
        $this->createStat(__('Total Cars'), Car::where('branch_id', $branchId)->count(), 'teal', 'tabler-car'),

        // إحصائية السيارات المتاحة في الفرع
        $this->createStat(__('Available Cars'), Car::where('branch_id', $branchId)->where('available', '1')->count(), 'lime', 'tabler-car'),
    ];
}


// دالة لإنشاء إحصائية جديدة
private
function createStat(string $label, int $value, string $color, string $icon): Stat
{
    return Stat::make($label, $value) // إنشاء إحصائية جديدة
    ->color($color) // تعيين لون الإحصائية
    ->description(__($label)) // تعيين وصف الإحصائية
    ->descriptionIcon($icon) // تعيين أيقونة الوصف
    ->icon($icon) // تعيين أيقونة الإحصائية
    ->chart([7, 2, 10, 3, 15, 4, 17]); // بيانات الرسم البياني (تعديل حسب الحاجة)
}

// دالة للحصول على عدد الطلبات في الفرع المحدد
private
function getBranchOrderCount(int $branchId, string $status = null): int
{
    $query = Order::join('cars', 'orders.car_id', '=', 'cars.id')
        ->where('cars.branch_id', $branchId); // تحديد الفرع

    if ($status) {
        $query->where('orders.status', $status); // تصفية الطلبات حسب الحالة إذا تم تحديدها
    }

    return $query->count(); // إرجاع عدد الطلبات
}
}
