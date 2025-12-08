<?php

namespace App\Filament\Widgets;

use App\Models\Review;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestOrders extends TableWidget
{
    protected int | string | array $columnSpan = 2;
    protected static ?int $sort = 6;
    // protected

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Review::query())
            ->recordTitleAttribute('Sports Car')
            ->columns([
                ImageColumn::make('customer.profile.profile_picture')
                    ->label('user prfile')
                    ->disk('public')
                    ->imageSize(45)
                    ->circular(),
                TextColumn::make('customer.username')
                    ->label('user name')
                    ->sortable(),
                TextColumn::make('comment')
                    ->label('feedback')
                    ->limit(50)
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                Action::make('make it visible')
                    // ->color('green')
                    ->action(function ($comment) {
                        $comment->update(['visibility' => true]);
                    }),
                ViewAction::make('view comment')
                    ->modalWidth('lg')
                    ->modalContent(fn ($record) => view('filament.pages.widgets.review-infolist', [
                        'record' => $record,
                    ])),
                DeleteAction::make('delete'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
