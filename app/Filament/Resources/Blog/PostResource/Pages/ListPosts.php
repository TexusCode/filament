<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Widgets\StatsOverview;
use Filament\Actions;
use Widgets\AccountWidget;
use Filament\Facades\Filament;
use App\Filament\Resources\Blog\PostResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;
    protected static ?string $title = 'Список посты';
    protected ?string $heading = 'Custom Page Heading';
    protected ?string $subheading = 'Custom Page Subheading';

    // protected function getFooterWidgets(): array
    // {
    //     return [
    //         StatsOverview::make([
    //             'status' => 'active',
    //         ]),
    //     ];
    // }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
