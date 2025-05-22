<?php

namespace App\Filament\Resources\Blog\NewsResource\Pages;

use App\Filament\Resources\Blog\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;
}
