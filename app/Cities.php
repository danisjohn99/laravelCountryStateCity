<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model 
{
   
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'state_id',
    ];
}