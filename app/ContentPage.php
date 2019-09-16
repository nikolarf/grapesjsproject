<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    protected $guarded = [];

    public function users()
    {
        $this->belongsTo(User::class); 
    } 

    public function getRouteKeyName()
    {
        return 'id';
    }

}
