<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Apartment;
use App\Models\ElectricityBillRecord;
use App\Models\GasBillRecord;
use App\Models\Payment;
use App\Models\RentalAgreement;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-bangladeshi';

    protected static bool $isLazy = false;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('billing_year')
                    ->options(array_combine(range(2000, Carbon::now()->format('Y')), range(2000, Carbon::now()->format('Y'))))
                    ->default(Carbon::now()->format('Y')),

                Forms\Components\Select::make('billing_month')
                    ->options([
                        'January' => 'January',
                        'February' => 'February',
                        'March' => 'March',
                        'April' => 'April',
                        'May' => 'May',
                        'June' => 'June',
                        'July' => 'July',
                        'August' => 'August',
                        'September' => 'September',
                        'October' => 'October',
                        'November' => 'November',
                        'December' => 'December',
                    ])
                    ->default(Carbon::now()->format('F')),

                Forms\Components\Select::make('apartment_id')
                    ->label('Apartment')
                    ->options(Apartment::all()->pluck('title', 'id'))
                    ->searchable()
                    ->live()
                    ->afterStateUpdated(
                        function(Set $set, ?string $state, Get $get) {
                            $rentalAgreement = RentalAgreement::latest()->where('apartment_id', $state)->whereNull('end_date')->first();
                            
                            if($rentalAgreement){
                                if($rentalAgreement->has_gas_connection){
                                    $set('gas_bill', GasBillRecord::latest()->where('type', 'double_stove')->value('amount'));
                                }
    
                                $set('rent', $rentalAgreement->rent);
                                $set('user_id', $rentalAgreement->user_id);
                                $set('total', $get('gas_bill') + $get('electricity_bill') + $get('rent'));
                                $set('rental_agreement_id', $rentalAgreement->id);
                            }
                        }
                    ),
                
                Hidden::make('rental_agreement_id'),

                Forms\Components\Select::make('user_id')
                    ->label('Tenant')
                    ->options(User::all()->pluck('name', 'id'))
                    ->disabled()
                    ->searchable(),

                Forms\Components\TextInput::make('gas_bill')
                    ->numeric()
                    ->required()
                    ->readOnly(),

                Forms\Components\TextInput::make('total_unit')
                    ->required()
                    ->numeric()
                    ->live(debounce: 1000)
                    ->afterStateUpdated(function(Set $set, ?string $state, Get $get) {      
                        $set('electricity_bill', ElectricityBillRecord::latest()->first()->value('per_unit_cost') * $state);
                        $set('total', $get('gas_bill') + $get('electricity_bill') + $get('rent'));
                    }),

                Forms\Components\TextInput::make('electricity_bill')
                    ->required()
                    ->numeric()
                    ->readOnly(),

                Forms\Components\TextInput::make('rent')
                    ->required()
                    ->numeric(),
                
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->readOnly(),

                Forms\Components\DateTimePicker::make('paid_at')
                    ->required()
                    ->default(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rentalAgreement.user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rentalAgreement.apartment.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gas_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('electricity_bill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paid_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
