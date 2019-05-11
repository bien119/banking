<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
    protected $table = 'LoanAccount';

    // public function tinTuc() {
    // 	return $this->hasMany('App\TinTuc','idLoaiTin','id');
    // }

    public function customer() {
    	return $this->belongsTo('App\Customer','id_customer','id');
    }

        public function loanrate() {
    	return $this->belongsTo('App\Loanrate','idLoanrate','id');
    }
}
