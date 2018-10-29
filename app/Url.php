<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $range = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
        do{
            $url = '';
            for($i = 0; $i < 8; $i++){
                $url = $url . $range[array_rand($range)];
            }
        } while(URL::where('shortUrl', '=', $url)->first());
        return $url;
    }
}
