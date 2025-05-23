<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->modalHeading('Удалить пост')
                ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
                ->modalSubmitActionLabel('Yes, delete it'),
        ];
    }
}
