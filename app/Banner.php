<?php

namespace App;

use App\Constants\Common;
use App\Constants\Status;
use App\Helpers\Utils;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = Common::BANNERS;

    public function getBanner() {
        return url($this->banner);
    }

    public function getTitle() {
        return isset($this->title) ? $this->title : 'Mac';
    }

    public function getDescription() {
        return isset($this->description) ? $this->description : 'Macs differ from Windows  PCs in that they run Apple’s  own operating system,  OS X.';
    }

    public function scopeActive($query) {
        return $query->where('status', Status::ACTIVE);
    }

    public function scopeImage($query) {
        return $query->where('select_type', 'use_image');
    }

    public function scopeYoutube($query) {
        return $query->where('select_type', 'use_youtube');
    }
    
    // Attribute
    public function getBannerAttribute($value) {
        if($this->select_type === 'use_image') {
            if(!Utils::blank($value)) {
                return Utils::getImageLink($value);
            }
        } else {
            return 'http://img.youtube.com/vi/' . $this->youtube_id . '/0.jpg';
        }
        
        return Utils::getImageLink(Common::NO_IMAGE_FOUND);
    }
    
}
