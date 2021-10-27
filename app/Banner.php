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
        return Utils::getImageLink($this->banner);
    }

    public function getTitle() {
        return isset($this->title) ? $this->title : 'Mac';
    }

    public function getLink() {
        return $this->link;
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

    public function scopeSwiper($query) {
        return $query->where('pos', 'swiper');
    }

    public function scopeRightUp($query) {
        return $query->where('pos', 'right_up');
    }

    public function scopeRightDown($query) {
        return $query->where('pos', 'right_down');
    }
    
    // Attribute
    public function getBannerAttribute($value) {
        if(!Utils::blank($value)) {
            return Utils::getImageLink($value);
        }
        
        return Utils::getImageLink(Common::NO_IMAGE_FOUND);
    }

    // public function getLinkBannerAttribute($value) {
    //     return $this->banner;
    // }
    
}
