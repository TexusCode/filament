<?php

namespace App\Filament\Resources\Blog\NewsResource\Pages;

use App\Filament\Resources\Blog\NewsResource;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNews extends ListRecords
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
