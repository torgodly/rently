<?php

namespace App\Filament\Widgets;

use App\Models\Branch;
use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\Support\Htmlable;

class BranchReportChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 3;

    public function getHeading(): string|Htmlable|null
    {
        return __('Branches Report Chart');
    }

    protected function getData(): array
    {
        $user = auth()->user(); // الحصول على معلومات المستخدم الحالي
        $userType = $user->type; // تحديد نوع المستخدم (admin أو manager)
        $datasets = []; // مصفوفة لتخزين البيانات
        $colors = [ // ألوان خلفية للرسوم البيانية
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
            '#E7E9ED', '#B3E5FC', '#8BC34A', '#FFEB3B', '#9C27B0', '#FF9800'
        ];
        $borderColors = [ // ألوان حدود الرسوم البيانية
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
            '#E7E9ED', '#B3E5FC', '#8BC34A', '#FFEB3B', '#9C27B0', '#FF9800'
        ];
        $colorIndex = 0; // فهرس لاختيار الألوان
        $data = array_fill(1, 12, 0); // تهيئة مصفوفة البيانات بجميع الأشهر (بقيم صفرية)

        if ($userType == 'admin') { // إذا كان المستخدم من نوع admin
            $branches = Branch::all(); // الحصول على جميع الفروع

            foreach ($branches as $branch) { // حلقة لكل فرع
                $monthlyData = Order::selectRaw('MONTH(orders.created_at) as month, COUNT(*) as count') // تحديد البيانات الشهرية
                ->join('cars', 'orders.car_id', '=', 'cars.id') // الانضمام إلى جدول السيارات
                ->where('cars.branch_id', $branch->id) // فلترة حسب فرع السيارة
                ->where('orders.status', 'Completed') // فلترة حسب حالة الطلب
                ->groupBy('month') // تجميع البيانات حسب الشهر
                ->orderBy('month') // ترتيب البيانات حسب الشهر
                ->get()
                    ->pluck('count', 'month') // استخراج البيانات الشهرية
                    ->toArray();

                $branchData = $data; // استخدام المصفوفة المُهيأة

                foreach ($monthlyData as $month => $count) { // ملء المصفوفة بالقيم الفعلية
                    $branchData[$month] = $count;
                }

                $datasets[] = [ // إضافة البيانات إلى المصفوفة
                    'label' => $branch->name, // اسم الفرع
                    'data' => array_values($branchData), // القيم الشهرية
                    'backgroundColor' => $colors[$colorIndex % count($colors)], // لون الخلفية
                    'borderColor' => $borderColors[$colorIndex % count($borderColors)], // لون الحدود
                ];

                $colorIndex++; // تحديث الفهرس للون التالي
            }
        } elseif ($userType == 'manager') { // إذا كان المستخدم من نوع manager
            $branch = $user->branch; // الحصول على الفرع الذي يديره المدير
            $monthlyData = Order::selectRaw('MONTH(orders.created_at) as month, COUNT(*) as count') // تحديد البيانات الشهرية
            ->join('cars', 'orders.car_id', '=', 'cars.id') // الانضمام إلى جدول السيارات
            ->where('cars.branch_id', $branch->id) // فلترة حسب فرع السيارة
            ->where('orders.status', 'Completed') // فلترة حسب حالة الطلب
            ->groupBy('month') // تجميع البيانات حسب الشهر
            ->orderBy('month') // ترتيب البيانات حسب الشهر
            ->get()
                ->pluck('count', 'month') // استخراج البيانات الشهرية
                ->toArray();

            $branchData = $data; // استخدام المصفوفة المُهيأة

            foreach ($monthlyData as $month => $count) { // ملء المصفوفة بالقيم الفعلية
                $branchData[$month] = $count;
            }

            $datasets[] = [ // إضافة البيانات إلى المصفوفة
                'label' => $branch->name, // اسم الفرع
                'data' => array_values($branchData), // القيم الشهرية
                'backgroundColor' => $colors[$colorIndex % count($colors)], // لون الخلفية
                'borderColor' => $borderColors[$colorIndex % count($borderColors)], // لون الحدود
            ];
        }

        return [ // إرجاع البيانات النهائية
            'datasets' => $datasets,
            'labels' => ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'], // تسميات الأشهر
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
