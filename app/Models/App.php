<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $appends = ['age_format'];
    protected $table = 'app';
    protected $fillable=[
        'name',
        'birthdate'
    ];


    public function getAgeFormatAttribute(){
        $age = explode('-', $this->birthdate);

        $birth = Carbon::createFromDate($age[0], $age[1], $age[2]);

        return $birth->age;
    }

}
