<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Actions;
use Filament\Facades\Filament;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
