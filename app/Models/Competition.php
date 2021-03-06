<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Country;

class Competition extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'competitions';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'country_id',
        'league_id',
        'category_id',
        'home_team',
        'away_team',
        'start_time',
        'rate',
        'trust',
        'advice_id',
        'played',
        'won',
    ];
    // protected $hidden = [];
    // protected $dates = [];

    public function country() {
        return self::belongsTo(Country::class);
    }

    public function league() {
        return self::belongsTo(League::class);
    }

    public function category() {
        return self::belongsTo(Category::class);
    }

    public function advice() {
        return self::belongsTo(Advice::class);
    }
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
