<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Shop;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public string $range = 'daily';
    public int $totalRevenue = 0;
    public int $totalOrders = 0;
    public int $completedOrders = 0;
    public int $uniqueVisitors = 0;
    public float $averageOrderValue = 0.0;
    public array $incomeChartLabels = [];
    public array $incomeChartData = [];
    public array $visitorChartLabels = [];
    public array $visitorChartData = [];
    public bool $visitorsTableExists = false;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }

    public function mount(): void
    {
        $this->visitorsTableExists = Schema::hasTable('visitors');
        $this->refreshAnalytics();
    }

    public function setRange(string $range): void
    {
        if (! in_array($range, ['daily', 'weekly', 'monthly'], true)) {
            $range = 'daily';
        }

        $this->range = $range;
        $this->refreshAnalytics();
    }

    public function refreshAnalytics(): void
    {
        $shopIds = $this->getShopIds();

        $this->setIncomeMetrics($shopIds);
        $this->setVisitorMetrics($shopIds);
        $this->setOrderMetrics($shopIds);
    }

    protected function getShopIds(): array
    {
        $user = Auth::user();
        $shopIds = $user->shop()->pluck('id')->toArray();

        if (empty($shopIds)) {
            if ($user->shop_id) {
                $shopIds[] = $user->shop_id;
            } else {
                $shopIds = Shop::query()
                    ->where('user_id', $user->id)
                    ->orWhere('tenant_id', $user->id)
                    ->pluck('id')
                    ->toArray();
            }
        }

        return $shopIds;
    }

    protected function setIncomeMetrics(array $shopIds): void
    {
        $query = Payment::query()
            ->where('status', 'completed')
            ->whereHas('booking', function ($booking) use ($shopIds) {
                $booking->whereIn('shop_id', $shopIds)
                    ->where('status', 'approved');
            });

        $this->totalRevenue = (int) $query->sum('amount');
        $this->incomeChartData = $this->buildSeries($query, 'paid_at', 'amount');
        $this->incomeChartLabels = array_keys($this->incomeChartData);
    }

    protected function setVisitorMetrics(array $shopIds): void
    {
        if ($this->visitorsTableExists) {
            $query = Visitor::query()
                ->whereIn('shop_id', $shopIds)
                ->whereNotNull('user_id');
        } else {
            $query = Booking::query()
                ->whereIn('shop_id', $shopIds)
                ->whereNotNull('user_id');
        }

        $this->uniqueVisitors = (int) $query->distinct('user_id')->count('user_id');
        $this->visitorChartData = $this->buildSeries($query, $this->visitorsTableExists ? 'visited_at' : 'created_at', 'user_id', true);
        $this->visitorChartLabels = array_keys($this->visitorChartData);
    }

    protected function setOrderMetrics(array $shopIds): void
    {
        $this->totalOrders = Booking::query()
            ->whereIn('shop_id', $shopIds)
            ->count();

        $this->completedOrders = Booking::query()
            ->whereIn('shop_id', $shopIds)
            ->where('status', 'approved')
            ->count();

        $this->averageOrderValue = $this->completedOrders > 0
            ? round($this->totalRevenue / $this->completedOrders, 2)
            : 0.0;
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
