<?php

namespace App\Filament\Resources\SUVS;

use App\Filament\Resources\SUVS\Pages\CreateSUV;
use App\Filament\Resources\SUVS\Pages\EditSUV;
use App\Filament\Resources\SUVS\Pages\ListSUVS;
use App\Filament\Resources\SUVS\Pages\ViewSUV;
use App\Filament\Resources\SUVS\Schemas\SUVForm;
use App\Filament\Resources\SUVS\Schemas\SUVInfolist;
use App\Filament\Resources\SUVS\Tables\SUVSTable;
use App\Models\Car;
use App\Models\CarMedia;
use App\Models\SUV;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SUVResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'SUV';
    protected static ?string $pluralLabel = 'SUV';
    protected static ?string $modelLabel = 'SUV';
    protected static bool $shouldRegisterNavigation = true;
    protected static string|UnitEnum|null $navigationGroup = 'Manage Cars';
    // protected static ?string $navigationGroupIcon = 'heroicon-o-users'; 
    protected static ?string $slug = 'SUV';
    protected static ?string $recordTitleAttribute = 'SUV';

    public static function form(Schema $schema): Schema
    {
        return SUVForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SUVInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SUVSTable::configure($table);
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
            'index' => ListSUVS::route('/'),
            'create' => CreateSUV::route('/create'),
            'view' => ViewSUV::route('/{record}'),
            'edit' => EditSUV::route('/{record}/edit'),
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
            ->where('category','SUV')
            ->orderByDesc('created_at');
    }

    // upload file request handler
    public static function afterCreate(Form $form, Model $record)
    {
        if ($form->getState()['car_images']) {
            foreach ($form->getState()['car_images'] as $imagePath) {
                CarMedia::create([
                    'car_id'    => $record->id,
                    'file_path' => $imagePath,
                ]);
            }
        }
    }
}
