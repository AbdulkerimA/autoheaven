<?php

namespace App\Filament\Resources\Sports;

use App\Filament\Resources\Sports\Pages\CreateSports;
use App\Filament\Resources\Sports\Pages\EditSports;
use App\Filament\Resources\Sports\Pages\ListSports;
use App\Filament\Resources\Sports\Pages\ViewSports;
use App\Filament\Resources\Sports\Schemas\SportsForm;
use App\Filament\Resources\Sports\Schemas\SportsInfolist;
use App\Filament\Resources\Sports\Tables\SportsTable;
use App\Models\Car;
use App\Models\Sports;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SportsResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'sports';
    protected static ?string $navigationLabel = 'sports';
    protected static ?string $pluralLabel = 'sports';
    protected static ?string $modelLabel = 'sport';
    protected static bool $shouldRegisterNavigation = true;
    protected static string|UnitEnum|null $navigationGroup = 'Manage Cars';
    // protected static ?string $navigationGroupIcon = 'heroicon-o-users'; 
    protected static ?string $slug = 'sports';

    public static function form(Schema $schema): Schema
    {
        return SportsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SportsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SportsTable::configure($table);
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
            'index' => ListSports::route('/'),
            'create' => CreateSports::route('/create'),
            'view' => ViewSports::route('/{record}'),
            'edit' => EditSports::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('category','sport');
    }
}
