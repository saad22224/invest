<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'الاستثمار لمدة 3 أيام',
                'description' => 'الربح التراكمي 5% - أخذ الربح الصافي مع رأس المال',
                'profit_margin' => 5.00,
                'duration_days' => 3,
                'price' => 100.00,
            ],
            [
                'name' => 'الاستثمار لمدة أسبوعين',
                'description' => 'الربح التراكمي 10% - أخذ الربح الصافي مع رأس المال',
                'profit_margin' => 10.00,
                'duration_days' => 14,
                'price' => 250.00,
            ],
            [
                'name' => 'الاستثمار لمدة 20 يوم',
                'description' => 'الربح التراكمي 15% - أخذ الربح الصافي مع رأس المال',
                'profit_margin' => 15.00,
                'duration_days' => 20,
                'price' => 500.00,
            ],
            [
                'name' => 'الاستثمار لمدة شهر',
                'description' => 'الربح التراكمي 25% - أخذ الربح الصافي مع رأس المال',
                'profit_margin' => 25.00,
                'duration_days' => 30,
                'price' => 1000.00,
            ],
            [
                'name' => 'عرض خاص لفترة محدودة',
                'description' => 'استثمار مميز مع عائد مرتفع - يتم تحديد التفاصيل من الادمن',
                'profit_margin' => 30.00,
                'duration_days' => 10,
                'price' => 750.00,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
