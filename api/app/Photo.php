<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['path', 'food_id'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function getPath()
    {
        return asset("/storage" . $this->path);
    }

    public static function removeFile($location)
    {
        $filename = public_path() . '/storage' . $location;

        try {
            unlink($filename);
        } catch (\ErrorException $e) {

        }
    }

    public function delete()
    {
        self::removeFile($this->path);

        return parent::delete();
    }
}