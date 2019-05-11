<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavingAccount extends Model
{
    protected $table = 'savingaccount';

    // public function tinTuc() {
    // 	return $this->hasMany('App\TinTuc','idLoaiTin','id');
    // }

    public function customer() {
    	return $this->belongsTo('App\Customer','idcustomer','id');
    }

        public function interestrate() {
    	return $this->belongsTo('App\Interestrate','id_rate	','id');
    }
}
