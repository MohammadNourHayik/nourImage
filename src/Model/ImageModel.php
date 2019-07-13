<?php

namespace Nour\Images\Model;

use Illuminate\Database\Eloquent\Model;



class ImageModel extends Model
{
    //  $table->increments('id');
    //$table->string('src');
    //$table->morphs('imagable');
    //
    //$table->index('id');
    //$table->timestamps();

    protected $table ="images";
    protected $fillable =  [
        'src',
        'imagable_type',
        'imagable_id'
    ];
    public function Imagable(){
        return $this->morphTo();
    }
}