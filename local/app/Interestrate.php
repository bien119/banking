<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interestrate extends Model
{
    protected $table = 'interestrate';

    public function savingAccount() {
    	return $this->hasMany('App\SavingAccount','id_rate','id');
    }

    // public function theLoai() {
    // 	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    // }
}
