<?php

namespace App\Filament\Resources\Blog\PostCategoriesResource\Pages;

use App\Filament\Resources\Blog\PostCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePostCategories extends ManageRecords
{
    protected static string $resource = PostCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->createAnother(false)->modalHeading('salom'),
        ];
    }
}
