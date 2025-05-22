<?php

namespace App\Filament\Resources\Blog;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use App\Models\Blog\Posts;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Models\Blog\PostCategories;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Blog\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Posts::class;
    protected static ?string $navigationLabel = 'Статьи';
    protected static ?string $navigationGroup = 'Блог';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 1;

    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
    //             \Filament\Infolists\Components\Section::make()
    //                 ->schema(
    //                     [
    //                         //
    //                     ]
    //                 )
    //         ]);
    // }
    public static function getEloquentQuery(): Builder
    {
        $user = Filament::auth()->user();

        return parent::getEloquentQuery()
            ->when(!$user->is_admin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->columns([
                        'sm' => 1,
                        'lg' => 8,
                    ])
                    ->schema([
                        Section::make('hello')
                            ->description('lorem5  ')
                            ->columns(2)
                            ->schema(
                                [
                                    TextInput::make('title')
                                        ->required()
                                        ->label('Заголовок')
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                    TextInput::make('slug')
                                        ->required()
                                        ->label('Слуг'),
                                    RichEditor::make('content')->columnSpanFull()
                                        ->fileAttachmentsDirectory('post-content')
                                        ->fileAttachmentsVisibility('public')
                                        ->required()
                                        ->label('Контент'),

                                ]
                            )->columnSpan(6),
                        Section::make()
                            ->schema(
                                [
                                    FileUpload::make('cover')
                                        ->image()
                                        ->imageEditor()
                                        ->label('Обложка')
                                        ->directory('photos')
                                        ->visibility('public')
                                        ->imagePreviewHeight('250')
                                        ->imageCropAspectRatio('1:1')
                                        ->imageResizeTargetWidth('720')
                                        ->imageResizeTargetHeight('720')
                                        ->previewable()
                                        ->required(),
                                    TextInput::make('video')
                                        ->label('Ссылка на видео'),
                                    Select::make('category_id')
                                        ->label('Категория')
                                        ->required()
                                        ->options(PostCategories::all()->pluck('name', 'id'))
                                        ->searchable(),
                                    TagsInput::make('tags'),
                                    Toggle::make('status')
                                        ->required()
                                        ->label('Статус'),
                                ]
                            )->columnSpan(2)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->label('Заголовок'),
                TextColumn::make('author.name')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->label('Автор'),
                TextColumn::make('category.name')
                    ->label('Категория')
                    ->sortable(),
                TextColumn::make('tags')
                    ->searchable()
                    ->label('Теги'),
                TextColumn::make('views')
                    ->sortable()
                    ->label('Просмотры'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->label('Статус'),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->extremePaginationLinks()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()->slideOver(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkActionGroup::make([]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
            'view' => Pages\ViewPost::route('/{record}/view'),
        ];
    }
}
