<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Config;

class Url extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'urls';

    protected $fillable = ['user', 'longUrl', 'shortUrl'];

    /**
     * Generate guaranteed unique string
     * Possible cominations: 62^8
     * 
     * @return string
     */
    public static function generate(){
        $range = Config::get('constants.url.range');
        $length = Config::get('constants.url.length');
        
        do{
            $url = '';
            for($i = 0; $i < $length; $i++){
                $url = $url . $range[array_rand($range)];
            }
        } while(URL::where('shortUrl', '=', $url)->first());
        return $url;
    }
}
