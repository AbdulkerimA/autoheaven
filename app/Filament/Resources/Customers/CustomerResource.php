<?php

namespace App\Filament\Resources\Customers;

use App\Filament\Resources\Customers\Pages\ManageCustomers;
use App\Filament\Resources\Users\Pages\ManageUsers;
use App\Models\Customer;
use App\Models\User;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class CustomerResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'customers';
    protected static ?string $navigationLabel = 'Customers';
    protected static ?string $pluralLabel = 'Customers';
    protected static ?string $modelLabel = 'Customer';
    protected static bool $shouldRegisterNavigation = true;
    protected static string|UnitEnum|null $navigationGroup = 'users';
    protected static ?string $navigationGroupIcon = 'heroicon-o-users'; 
    protected static ?string $slug = 'customers';


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->required(fn ($operation) => $operation === 'create'),

                            TextInput::make('username')
                                ->required(fn ($operation) => $operation === 'create'),

                            TextInput::make('email')
                                ->label('Email address')
                                ->email()
                                ->required(fn ($operation) => $operation === 'create'),

                            // DateTimePicker::make('email_verified_at'),
                        ]),
                    ]),
                Section::make('Security')
                    ->schema([
                        // TextInput::make('password')
                        //     ->password(),
                            // ->required(fn ($operation) => $operation === 'create'),

                        TextInput::make('role')
                            ->default('admin')
                            ->required(fn ($operation) => $operation === 'create'),
                    ]),
                Section::make('Contact & Profile')
                    ->schema([
                        TextInput::make('profile.profile_picture'),
                        TextInput::make('profile.phone')->tel(),
                        // Textarea::make('profileaddress')->columnSpanFull(),
                    ]),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')->schema([
                    TextEntry::make('name'),
                    TextEntry::make('username'),
                    TextEntry::make('email')->label('Email address'),
                    // // TextEntry::make('email_verified_at')
                    //     ->dateTime()
                    //     ->placeholder('-'),
                    TextEntry::make('role'),
                ]),

                Section::make('Contact & Profile')->schema([
                    ImageEntry::make('profile.profile_picture')
                        ->circular()
                        ->disk('public')
                        ->imageSize(60)
                        ->placeholder('-'),
                    TextEntry::make('profile.phone')
                        ->placeholder('-'),
                    TextEntry::make('profile.city')->placeholder('-')
                        ->columnSpanFull(),
                ]),

                Section::make('System Info')->schema([
                    TextEntry::make('deleted_at')
                        ->dateTime()
                        ->visible(fn ($record) => $record->trashed()),
                    TextEntry::make('created_at')
                        ->dateTime()
                        ->placeholder('-'),
                    TextEntry::make('updated_at')
                        ->dateTime()
                        ->placeholder('-'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('admins')
            ->columns([
                ImageColumn::make('profile.profile_picture')
                    ->label('Profile')
                    ->default('-')
                    ->disk('public')
                    ->circular()
                    ->imageSize(45),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('profile.role')
                    ->searchable(),
                TextColumn::make('prfile.phone')
                    ->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
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
            'index' => ManageCustomers::route('/'),
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
            ->whereHas('profile',function($query){
                $query->where('role','customer');
            });
    }
}
