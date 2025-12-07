<?php

namespace App\Filament\Resources\SportsCars;

use App\Filament\Resources\SportsCars\Pages\ManageSportsCars;
use App\Models\Car;
use App\Models\CarMedia;
use App\Models\SportsCar;
use App\Models\User;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SportsCarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Sport Cars';
    protected static ?string $pluralLabel = 'Sport Cars';
    protected static ?string $modelLabel = 'Sport Cars';
    protected static bool $shouldRegisterNavigation = true;
    protected static string|UnitEnum|null $navigationGroup = 'Manage Cars';
    // protected static ?string $navigationGroupIcon = 'heroicon-o-users'; 
    protected static ?string $slug = 'Sport Cars';
    protected static ?string $recordTitleAttribute = 'Sport Cars';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                ->schema([
                    // Owner select: only users with role 'owner'
                    Select::make('owner_id')
                        ->label('Owner')
                        ->required()
                        ->options(function () {
                            return User::whereHas('profile', function ($query) {
                                $query->where('role', 'owner');
                            })->pluck('username', 'id'); // username as label, id as value
                        }),

                    TextInput::make('name')
                        ->label('car model')
                        ->required(),

                    TextInput::make('brand')
                        ->required(),

                    // Category select
                    Select::make('category')
                        ->required()
                        ->options([
                            'Sedan' => 'Sports',
                            // add more categories as needed
                        ]),
                ]),

            Section::make('Pricing & Specifications')
                ->schema([
                    TextInput::make('price_per_day')
                        ->required()
                        ->numeric(),

                    // Fuel type select
                    Select::make('fuel_type')
                        ->required()
                        ->options([
                            'Petrol' => 'Petrol',
                            'Diesel' => 'Diesel',
                            'Electric' => 'Electric',
                            'Hybrid' => 'Hybrid',
                        ]),

                    // Transmission select
                    Select::make('transmission')
                        ->required()
                        ->options([
                            'Manual' => 'Manual',
                            'Automatic' => 'Automatic',
                        ]),

                    TextInput::make('seats')
                        ->required()
                        ->numeric(),

                    TextInput::make('year')
                        ->required()
                        ->numeric(),

                    TextInput::make('mileage')
                        ->numeric(),
                ]),

            Section::make('Vehicle Identification')
                ->schema([
                    TextInput::make('license_plate'),
                    TextInput::make('availability_status')
                        ->required()
                        ->default('available'),
                ]),

            Section::make('Description')
                ->schema([
                    Textarea::make('description')
                        ->columnSpanFull(),
                ]),

            FileUpload::make('car_images')
            ->label('Car Image')
            ->image()
            ->directory('cars')
            ->multiple()
            ->preserveFilenames()
            ->required(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextEntry::make('owner_id')->numeric(),
                        TextEntry::make('name'),
                        TextEntry::make('brand'),
                        TextEntry::make('category'),
                    ]),

                Section::make('Pricing & Specifications')
                    ->schema([
                        TextEntry::make('price_per_day')->numeric(),
                        TextEntry::make('fuel_type'),
                        TextEntry::make('transmission'),
                        TextEntry::make('seats')->numeric(),
                        TextEntry::make('year')->numeric(),
                        TextEntry::make('mileage')->numeric()->placeholder('-'),
                    ]),

                Section::make('Vehicle Identification')
                    ->schema([
                        TextEntry::make('license_plate')->placeholder('-'),
                        TextEntry::make('availability_status'),
                    ]),

                Section::make('Description')
                    ->schema([
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                Section::make('Timestamps')
                    ->schema([
                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn (Car $record): bool => $record->trashed()),
                        TextEntry::make('created_at')->dateTime()->placeholder('-'),
                        TextEntry::make('updated_at')->dateTime()->placeholder('-'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Sports Car')
            ->columns([
                TextColumn::make('owner.username')
                    ->label('owner name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('license_plate')
                    ->searchable(),
                TextColumn::make('brand')
                    ->searchable()
                    ->searchable(),
                TextColumn::make('price_per_day')
                    ->numeric()
                    ->sortable()
                    ->prefix('ETB '),
                TextColumn::make('fuel_type')
                    ->searchable(),
                TextColumn::make('transmission')
                    ->searchable(),
                TextColumn::make('year')
                    ->label('build year')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('availability_status')
                    ->label('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                            'pending'    => 'warning',
                            'available'   => 'success',
                            'booked'   => 'danger',
                            'maintenance'   => 'danger',
                            'completed'  => 'primary',
                            default      => 'gray',
                        })
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->availability_status === 'pending')
                    ->action(function ($record) {
                        $record->update(['availability_status' => 'available']);
                    }),
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSportsCars::route('/'),
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
            ->where('category','Sports');
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
