<?php

namespace App\Filament\Resources\Trucks;

use App\Filament\Resources\Cars\Pages\CreateCar;
use App\Filament\Resources\Cars\Pages\EditCar;
use App\Filament\Resources\Cars\Pages\ListCars;
use App\Filament\Resources\Cars\Pages\ViewCar;
use App\Filament\Resources\Cars\Schemas\CarForm;
use App\Filament\Resources\Cars\Schemas\CarInfolist;
use App\Filament\Resources\Cars\Tables\CarsTable;
use App\Filament\Resources\Trucks\Pages\CreateTrucks;
use App\Filament\Resources\Trucks\Pages\EditTrucks;
use App\Filament\Resources\Trucks\Pages\ListTrucks;
use App\Filament\Resources\Trucks\Pages\ViewTrucks;
use App\Filament\Resources\Trucks\Schemas\TrucksForm;
use App\Filament\Resources\Trucks\Schemas\TrucksInfolist;
use App\Filament\Resources\Trucks\Tables\TrucksTable;
use App\Models\Car;
use App\Models\Trucks;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class TrucksResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-truck';

    protected static ?string $recordTitleAttribute = 'trucks';
    protected static ?string $navigationLabel = 'Trucks';
    protected static ?string $pluralLabel = 'Trucks';
    protected static ?string $modelLabel = 'Truck';
    protected static bool $shouldRegisterNavigation = true;
    protected static string|UnitEnum|null $navigationGroup = 'Manage Cars';
    // protected static ?string $navigationGroupIcon = 'heroicon-o-users'; 
    protected static ?string $slug = 'Trucks';

    public static function form(Schema $schema): Schema
    {
        return TrucksForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TrucksInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrucksTable::configure($table);
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
            'index' => ListTrucks::route('/'),
            'create' => CreateTrucks::route('/create'),
            'view' => ViewTrucks::route('/{record}'),
            'edit' => EditTrucks::route('/{record}/edit'),
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
            ->where('category','Truck');
    }
}
