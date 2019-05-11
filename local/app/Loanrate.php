<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loanrate extends Model
{
    protected $table = 'loanrate';

    public function loanAccount() {
    	return $this->hasMany('App\Loanrate','id_loanrate','id');
    }

    // public function theLoai() {
    // 	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    // }
}
