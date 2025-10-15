<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


use App\Filament\Resources\OrderResource\Widgets\OrderStats;


class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderStats::class
        ];
    }

    public function getTabs(): array
{
    return [
        'all' => ListRecords\Tab::make('All'),

        'processing' => ListRecords\Tab::make('Processing')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'processing')),

        'shipped' => ListRecords\Tab::make('Shipped')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'shipped')),
        'delivered' => ListRecords\Tab::make('Delivered')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'delivered')),
        'canceled' => ListRecords\Tab::make('Canceled')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'canceled')), 
    ];
}


}
