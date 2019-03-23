<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspiration extends Model
{
    protected $fillable = ['project_id','image_url', 'img_info'];

    public function Inspiration()
       {
           return $this->belongsTo('App\Project');
       }
}
