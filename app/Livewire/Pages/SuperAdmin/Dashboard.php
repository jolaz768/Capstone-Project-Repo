<?php

namespace App\Livewire\Pages\SuperAdmin;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public string $range = 'monthly';
    public int $totalRevenue = 0;
    public int $totalShops = 0;
    public int $activeShops = 0;
    public int $inactiveShops = 0;
    public int $totalUsers = 0;
    public int $totalOrders = 0;
    public int $completedOrders = 0;
    public int $totalVisitors = 0;
    public bool $visitorsTableExists = false;

    public array $revenueChartLabels = [];
    public array $revenueChartData = [];
    public array $visitorChartLabels = [];
    public array $visitorChartData = [];
    public array $userChartLabels = [];
    public array $userChartData = [];
    public array $orderTrendLabels = [];
    public array $orderTrendSeries = [];
    public array $topShopNames = [];
    public array $topShopRevenue = [];
    public array $topShopOrders = [];

    #[Layout('components.layouts.superadmin')]
    public function render()
    {
        return view('livewire.pages.super-admin.dashboard');
    }

    public function mount(): void
    {
        $this->visitorsTableExists = Schema::hasTable('visitors');
        $this->refreshAnalytics();
    }

    public function setRange(string $range): void
    {
        if (! in_array($range, ['daily', 'weekly', 'monthly'], true)) {
            $range = 'monthly';
        }

        $this->range = $range;
        $this->refreshAnalytics();
    }

    public function refreshAnalytics(): void
    {
        $this->setPlatformMetrics();
        $this->setRevenueAnalytics();
        $this->setVisitorAnalytics();
        $this->setUserAnalytics();
        $this->setOrderAnalytics();
        $this->setTopShopAnalytics();
    }

    protected function setPlatformMetrics(): void
    {
        $this->totalShops = Shop::count();
        $this->activeShops = Shop::where('is_active', true)->count();
        $this->inactiveShops = max($this->totalShops - $this->activeShops, 0);
        $this->totalUsers = User::count();
        $this->totalOrders = Booking::count();
        $this->completedOrders = Booking::where('status', 'approved')->count();
        $this->totalRevenue = (int) Payment::where('status', 'completed')->sum('amount');
        $visitorQuery = $this->visitorsTableExists ? Visitor::query() : Booking::query()->whereNotNull('user_id');
        $this->totalVisitors = (int) ($this->visitorsTableExists
            ? $visitorQuery->distinct('user_id')->count('user_id')
            : $visitorQuery->distinct('user_id')->count('user_id'));
    }

    protected function setRevenueAnalytics(): void
    {
        $query = Payment::query()->where('status', 'completed');
        $this->revenueChartData = $this->buildSeries($query, 'paid_at', 'amount');
        $this->revenueChartLabels = array_keys($this->revenueChartData);
    }

    protected function setVisitorAnalytics(): void
    {
        if ($this->visitorsTableExists) {
            $query = Visitor::query()->whereNotNull('user_id');
            $dateColumn = 'visited_at';
        } else {
            $query = Booking::query()->whereNotNull('user_id');
            $dateColumn = 'created_at';
        }

        $this->visitorChartData = $this->buildSeries($query, $dateColumn, 'user_id', true);
        $this->visitorChartLabels = array_keys($this->visitorChartData);
    }

    protected function setUserAnalytics(): void
    {
        $query = User::query();
        $this->userChartData = $this->buildSeries($query, 'created_at', 'id', true);
        $this->userChartLabels = array_keys($this->userChartData);
    }

    protected function setOrderAnalytics(): void
    {
        $statuses = ['pending', 'approved', 'rejected', 'cancelled'];
        $series = [];

        foreach ($statuses as $status) {
            $query = Booking::query()->where('status', $status);
            $series[] = [
                'name' => ucfirst($status),
                'data' => array_values($this->buildSeries($query, 'created_at', 'id', true)),
            ];
        }

        $this->orderTrendLabels = array_keys($this->buildPeriods());
        $this->orderTrendSeries = $series;
    }

    protected function setTopShopAnalytics(): void
    {
        $topShops = Shop::query()
            ->leftJoin('bookings', 'bookings.shop_id', '=', 'shops.id')
            ->selectRaw('shops.name, SUM(CASE WHEN bookings.status = "approved" THEN bookings.total_price ELSE 0 END) AS revenue, COUNT(CASE WHEN bookings.status = "approved" THEN 1 END) AS order_count')
            ->groupBy('shops.id', 'shops.name')
            ->orderByDesc('revenue')
            ->limit(5)
            ->get();

        $this->topShopNames = $topShops->pluck('name')->toArray();
        $this->topShopRevenue = $topShops->pluck('revenue')->map(fn ($value) => (int) $value)->toArray();
        $this->topShopOrders = $topShops->pluck('order_count')->map(fn ($value) => (int) $value)->toArray();
    }

    protected function buildSeries($query, string $dateColumn, string $aggregate, bool $distinct = false): array
    {
        $periods = $this->buildPeriods();
        $builder = clone $query;

        $results = $builder
            ->whereBetween($dateColumn, $this->getQueryWindow())
            ->selectRaw($this->getPeriodSelect($dateColumn) . ', ' . ($distinct ? 'COUNT(DISTINCT ' . $aggregate . ')' : 'SUM(' . $aggregate . ')') . ' AS total')
            ->groupBy('period')
            ->orderBy('period')
            ->pluck('total', 'period')
            ->toArray();

        return collect($periods)
            ->mapWithKeys(function ($period) use ($results) {
                return [
                    $period['label'] => isset($results[$period['key']]) ? (int) $results[$period['key']] : 0,
                ];
            })
            ->all();
    }

    protected function buildPeriods(): array
    {
        $start = $this->getRangeStart();
        $periods = [];

        if ($this->range === 'weekly') {
            $cursor = $start->copy()->startOfWeek();
            for ($index = 0; $index < 12; $index++) {
                $periods[] = [
                    'key' => $cursor->format('o-') . str_pad($cursor->isoWeek(), 2, '0', STR_PAD_LEFT),
                    'label' => $cursor->format('M j'),
                ];
                $cursor->addWeek();
            }
        } elseif ($this->range === 'monthly') {
            $cursor = $start->copy()->firstOfMonth();
            for ($index = 0; $index < 12; $index++) {
                $periods[] = [
                    'key' => $cursor->format('Y-m'),
                    'label' => $cursor->format('M Y'),
                ];
                $cursor->addMonth();
            }
        } else {
            $cursor = $start->copy();
            for ($index = 0; $index < 30; $index++) {
                $periods[] = [
                    'key' => $cursor->format('Y-m-d'),
                    'label' => $cursor->format('M j'),
                ];
                $cursor->addDay();
            }
        }

        return $periods;
    }

    protected function getRangeStart(): Carbon
    {
        return match ($this->range) {
            'weekly' => now()->startOfWeek()->subWeeks(11),
            'monthly' => now()->startOfMonth()->subMonths(11),
            default => now()->subDays(29),
        };
    }

    protected function getQueryWindow(): array
    {
        return [
            $this->getRangeStart()->startOfDay(),
            now()->endOfDay(),
        ];
    }

    protected function getPeriodSelect(string $dateColumn): string
    {
        return match ($this->range) {
            'weekly' => "CONCAT(YEAR({$dateColumn}), '-', LPAD(WEEK({$dateColumn}, 1), 2, '0')) AS period",
            'monthly' => "DATE_FORMAT({$dateColumn}, '%Y-%m') AS period",
            default => "DATE({$dateColumn}) AS period",
        };
    }
}
