<?php

namespace App\Filament\Resources\MiniBuses;

use App\Filament\Resources\MiniBuses\Pages\CreateMiniBus;
use App\Filament\Resources\MiniBuses\Pages\EditMiniBus;
use App\Filament\Resources\MiniBuses\Pages\ListMiniBuses;
use App\Filament\Resources\MiniBuses\Pages\ViewMiniBus;
use App\Filament\Resources\MiniBuses\Schemas\MiniBusForm;
use App\Filament\Resources\MiniBuses\Schemas\MiniBusInfolist;
use App\Filament\Resources\MiniBuses\Tables\MiniBusesTable;
use App\Models\Car;
use App\Models\MiniBus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class MiniBusResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-truck';

    protected static ?string $recordTitleAttribute = 'Mini Bus';
    protected static ?string $navigationLabel = 'Mini Bus';
    protected static ?string $pluralLabel = 'Mini Bus';
    protected static ?string $modelLabel = 'Mini bus';
    protected static bool $shouldRegisterNavigation = true;
    protected static string|UnitEnum|null $navigationGroup = 'Manage Cars';
    // protected static ?string $navigationGroupIcon = 'heroicon-o-users'; 
    protected static ?string $slug = 'Mini Bus';

    public static function form(Schema $schema): Schema
    {
        return MiniBusForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MiniBusInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MiniBusesTable::configure($table);
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
            'index' => ListMiniBuses::route('/'),
            'create' => CreateMiniBus::route('/create'),
            'view' => ViewMiniBus::route('/{record}'),
            'edit' => EditMiniBus::route('/{record}/edit'),
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
            ->where('category','mini bus')
            ->orderByDesc('created_at');
    }
}
