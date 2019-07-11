<?php

namespace Nour\Images\Helper;

use Intervention\Image\ImageManagerStatic as Image;
use Nour\Images\Model\ImageModel;

trait Imageable
{
    private $arrPath,$arrSrc,$path,$file,$src;
    private $width=1280;
    private $height=720;



    public function width($width){
        $this->width=$width;
        return $this;
    }
    public function hasFile(){
        if(!is_null($this->file) and !empty($this->file))
            return true;
        return false;
    }

    public function height($height){
        $this->height=$height;
        return $this;
    }
    public function photo($file){

        if($file){
            $this->file=$file;
            $photo_name = $this->photoPath."-" . $this->getID() . '-' . $file->getClientOriginalName();
            $this->path = public_path("images/$this->photoPath/".$photo_name);
            $this->src="public/images/".$this->photoPath.'/'.$photo_name;
        }
        return $this;
    }
    public function upload(){
        if(!is_null($this->Image)){
            $this->delete_photo();
        }
        Image::make($this->file->getRealPath())->resize($this->width, $this->height)->save($this->path);
        $this->Image()->create([
            'src'=>$this->src
        ]);
        return $this;
    }
    public function delete_photo(){

        try {
            unlink(public_path(str_replace('public/','',$this->Image->src)));
            $this->Image()->delete();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
    public function getPath(){
        return $this->src;
    }

    public function Image(){
        return $this->morphOne(ImageModel::class,'imagable');
    }
    public function getID(){
        $pk=$this->primaryKey;
        return $this->$pk;
    }
}