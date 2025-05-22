<?php

namespace App\Filament\Resources\Blog\NewsResource\Pages;

use App\Filament\Resources\Blog\NewsResource;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNews extends ViewRecord
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
