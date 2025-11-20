<?php

namespace App\Filament\Resources\Sedans;

use App\Filament\Resources\Sedans\Pages\CreateSedan;
use App\Filament\Resources\Sedans\Pages\EditSedan;
use App\Filament\Resources\Sedans\Pages\ListSedans;
use App\Filament\Resources\Sedans\Pages\ViewSedan;
use App\Filament\Resources\Sedans\Schemas\SedanForm;
use App\Filament\Resources\Sedans\Schemas\SedanInfolist;
use App\Filament\Resources\Sedans\Tables\SedansTable;
use App\Models\Car;
use App\Models\Sedan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SedanResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-truck';

    protected static ?string $recordTitleAttribute = 'Sedans';
    protected static ?string $navigationLabel = 'Sedans';
    protected static ?string $pluralLabel = 'Sedans';
    protected static ?string $modelLabel = 'Sedan';
    protected static bool $shouldRegisterNavigation = true;
    protected static string|UnitEnum|null $navigationGroup = 'Manage Cars';
    // protected static ?string $navigationGroupIcon = 'heroicon-o-users'; 
    protected static ?string $slug = 'Sedans';

    public static function form(Schema $schema): Schema
    {
        return SedanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SedanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SedansTable::configure($table);
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
            'index' => ListSedans::route('/'),
            'create' => CreateSedan::route('/create'),
            'view' => ViewSedan::route('/{record}'),
            'edit' => EditSedan::route('/{record}/edit'),
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
            ->where('category','Sedan');
    }
}
