<?php

namespace App\Filament\Admin\Widgets;

use App\Models\PersonalityTest;
use App\Models\TestPurchase;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // protected ?string $heading = 'Analytics';
    // protected ?string $description = 'An overview of some analytics.';

    protected function getStats(): array
    {
        return [
            Stat::make(__('admin/users.users'), User::count())
                ->description(__('admin/dashboard.total_registered_users'))
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->color('success'),

            Stat::make(__('admin/personality_tests.personality_tests'), PersonalityTest::count())
                ->description(__('admin/dashboard.total_personality_tests'))
                ->descriptionIcon('heroicon-o-clipboard-document-list', IconPosition::Before)
                ->color('success'),

            Stat::make(__('admin/personality_tests.test_purchases'), $this->getSucceededPurchasesTotal())
                ->description(__('admin/dashboard.total_test_purchases'))
                ->descriptionIcon('heroicon-o-banknotes', IconPosition::Before)
                ->color('success'),
        ];
    }

    protected function getSucceededPurchasesTotal(): string
    {
        $total = TestPurchase::where('status', 'succeeded')->sum('amount_cents');

        return number_format($total / 100, 2) . ' ' . __('admin/dashboard.SAR');
    }
}
