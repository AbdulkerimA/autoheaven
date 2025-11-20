<?php

namespace App\Filament\Resources\Trucks;

use App\Filament\Resources\Trucks\Pages\CreateTrucks;
use App\Filament\Resources\Trucks\Pages\EditTrucks;
use App\Filament\Resources\Trucks\Pages\ListTrucks;
use App\Filament\Resources\Trucks\Pages\ViewTrucks;
use App\Filament\Resources\Trucks\Schemas\TrucksForm;
use App\Filament\Resources\Trucks\Schemas\TrucksInfolist;
use App\Filament\Resources\Trucks\Tables\TrucksTable;
use App\Models\Trucks;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrucksResource extends Resource
{
    protected static ?string $model = Trucks::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'trucks';

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
}
