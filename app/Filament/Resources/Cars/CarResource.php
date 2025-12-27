<?php

namespace App\Filament\Resources\Cars;

use App\Filament\Resources\Cars\Pages\CreateCar;
use App\Filament\Resources\Cars\Pages\EditCar;
use App\Filament\Resources\Cars\Pages\ListCars;
use App\Filament\Resources\Cars\RelationManagers\BookingsRelationManager;
use App\Filament\Resources\Cars\RelationManagers\MediaRelationManager;
use App\Filament\Resources\Cars\RelationManagers\ReviewsRelationManager;
use App\Filament\Resources\Cars\Schemas\CarForm;
use App\Filament\Resources\Cars\Tables\CarsTable;
use App\Models\Car;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static bool $shouldRegisterNavigation = true;
    protected static ?string $navigationLabel = 'Cars';

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Core Management';

    protected static ?string $recordTitleAttribute = 'name'; // FIXED

    public static function form(Schema $schema): Schema
    {
        return CarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            BookingsRelationManager::class,
            ReviewsRelationManager::class,
            MediaRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCars::route('/'),
            'create' => CreateCar::route('/create'),
            'edit' => EditCar::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

}
