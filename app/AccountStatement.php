<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountStatement extends Model {

    public $table = 'account_statement';

    public $fillable = [
        'user_id',
        'description',
        'operation',
        'value'
    ];

}