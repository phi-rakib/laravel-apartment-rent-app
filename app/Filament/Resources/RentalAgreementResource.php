<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalAgreementResource\Pages;
use App\Filament\Resources\RentalAgreementResource\RelationManagers;
use App\Models\Apartment;
use App\Models\RentalAgreement;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalAgreementResource extends Resource
{
    protected static ?string $model = RentalAgreement::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('created_at');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Customer')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),    
                Select::make('apartment_id')
                    ->label('Apartment')
                    ->options(Apartment::all()->pluck('title', 'id'))
                    ->searchable(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\TextInput::make('rent')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('has_gas_connection'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('apartment.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_gas_connection')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListRentalAgreements::route('/'),
            'create' => Pages\CreateRentalAgreement::route('/create'),
            'edit' => Pages\EditRentalAgreement::route('/{record}/edit'),
        ];
    }
}
