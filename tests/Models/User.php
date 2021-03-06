<?php

namespace Moecasts\Laravel\Wallet\Test\Models;

use Illuminate\Database\Eloquent\Model;
use Moecasts\Laravel\Wallet\Interfaces\Exchangeable;
use Moecasts\Laravel\Wallet\Interfaces\Taxing;
use Moecasts\Laravel\Wallet\Interfaces\Transferable;
use Moecasts\Laravel\Wallet\Models\Wallet;
use Moecasts\Laravel\Wallet\Traits\HasWallets;

class User extends Model implements Transferable, Taxing
{
    use HasWallets;

    protected $table = 'users';

    protected $fillable = [
        'name',
    ];

    public function getReceiptWallet(string $currency): Wallet
    {
        return $this->getWallet($currency);
    }

    public function getFeePercent(): float
    {
        return 10;
    }
}
