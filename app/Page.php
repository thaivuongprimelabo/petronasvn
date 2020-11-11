<?php

namespace App;

use App\Constants\Common;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = Common::PAGES;

    public function getLink($url_ext = 'html') {
        return url($this->name_url . '.' . $url_ext);
    }
}
