<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('username')->required()->unique(ignoreRecord: true),
                        TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                        TextInput::make('profile.phone')->tel()->required(),
                        // TextInput::make('address')->required(),
                        FileUpload::make('profile.profile_picture')->image()->directory('profiles'),
                        TextInput::make('password')->password()->required(fn ($record) => !$record)->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null),
                    ])->columns(2),

                Section::make('Profile / Role')
                    ->schema([
                        Select::make('profile.role')
                            ->label('Role')
                            ->options([
                                'admin' => 'Admin',
                                'owner' => 'Owner',
                                'customer' => 'Customer',
                            ])
                            ->required(),
                        DatePicker::make('profile.date_of_birth'),
                        Radio::make('profile.gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ]),
                    ])->columns(2),

                Section::make('Emergency Contact')
                    ->schema([
                        TextInput::make('profile.emergency_name'),
                        TextInput::make('profile.emergency_phone'),
                    ])->columns(2),

                Section::make('Address Info')
                    ->schema([
                        TextInput::make('profile.street'),
                        TextInput::make('profile.city'),
                        TextInput::make('profile.region'),
                    ])->columns(2),
            ]);
    }
}
