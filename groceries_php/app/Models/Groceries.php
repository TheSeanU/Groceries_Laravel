<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groceries extends Model
{
    use HasFactory;
}



DB::table('groceries')->insert(
  [
    'product_name'=>'Chees',
    'product_description'=>'Nice old ripen chees 48+',
    'product_price'=>'5,99',
    'product_amount'=>'1'
  ]);
