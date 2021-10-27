<?php

namespace App\Http\Controllers\Auth;

use App\Banner;
use App\Constants\Common;
use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannersController extends AppController
{

    private $bannerDemensions = [
        'center' => '870x460',
        'left' => '268x582',
        'right_up' => '568x275',
        'right_down' => '568x275'
    ];
    
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
    }
    
    /**
     * search
     * @param Request $request
     */
    public function search(Request $request) {
        $uri = explode("/", $request->getRequestUri());
        $wheres[] = ['pos', '=', $uri[3]];

        return $this->doSearch($request, new Banner(), '', 'auth.petronasvn.banners.index', $wheres);
    }

    /**
     * center
     */
    public function index(Request $request) {
        return view('auth.petronasvn.index', $this->search($request));
    }
    
    /**
     * create
     * @param Request $request
     */
    public function create(Request $request) {
        
        $request->flash();
        
        $validator = [];

        $uri = explode("/", $request->getRequestUri());
        $pos = $uri[3];
        
        if($request->isMethod('post')) {
            
            $select_type = Utils::cnvNull($request->select_type, 'use_image');
            
            if($select_type == 'use_image') {
                unset($this->rules['youtube_id']);
                if(isset($this->rules['upload_banner'])) {
                    $this->rules['upload_banner'] = str_replace('required_upload_banner', 'required', str_replace('#select_type', 'true', $this->rules['upload_banner']));
                }
            } else {
                unset($this->rules['upload_banner']);
                if(isset($this->rules['youtube_id'])) {
                    $this->rules['youtube_id'] = str_replace('required_youtube_id', 'required', str_replace('#select_type', 'true', $this->rules['youtube_id']));
                }
            }
            
            $validator = Validator::make($request->all(), $this->rules);
            
            if (!$validator->fails()) {
                $data = new Banner();
                // if($select_type == 'use_image') {
                //     $filename = '';
                //     $key = 'upload_banner';
                //     $demension = $this->config['config'][$key . '_image_size'];
                //     Utils::resizeImage($key, $request->$key, $demension, $filename);
                //     $data->link           = Utils::cnvNull($request->link, '');
                //     $data->banner         = $filename;
                // } else {
                //     $data->youtube_id    = Utils::cnvNull($request->youtube_embed_url, '');
                // }
                $filename = '';
                $demension = $this->bannerDemensions[$pos];
                Utils::doUploadAndResize($request, 'upload_banner', $filename, $demension);
                $data->link           = Utils::cnvNull($request->link, '');
                $data->banner         = $filename;;
                $data->description    = Utils::cnvNull($request->description, '');
                $data->status         = Utils::cnvNull($request->status, 0);
                $data->select_type    = Utils::cnvNull($request->select_type, 'use_image');
                $data->pos            = $uri[3];
                $data->created_at     = date('Y-m-d H:i:s');
                $data->updated_at     = date('Y-m-d H:i:s');
                
                if($data->save()) {
                    return redirect(route('auth_' . $this->name . '_create'))->with('success', trans('messages.CREATE_SUCCESS'));
                }
            } else {
                return redirect(route('auth_' . $this->name . '_create'))->with('error', trans('messages.ERROR'));
            }
        }

        $this->output['bannerDemensions'] = $this->bannerDemensions[$uri[3]];
        $this->output['data'] = new Banner();
        
        return view('auth.petronasvn.banners.form', $this->output);
    }
    
    /**
     * edit
     * @param Request $request
     */
    public function edit(Request $request) {
        
        $request->flash();
        
        $validator = [];
        
        $data = Banner::find($request->id);
        $uri = explode("/", $request->getRequestUri());
        if($request->isMethod('post')) {
            
            $select_type = Utils::cnvNull($request->select_type, 'use_image');
            
            if($select_type == 'use_image') {
                unset($this->rules['youtube_id']);
                if(isset($this->rules['upload_banner']) && Utils::blank($data->banner)) {
                    $this->rules['upload_banner'] = str_replace('required_upload_banner', 'required', str_replace('#select_type', 'true', $this->rules['upload_banner']));
                } else {
                    unset($this->rules['upload_banner']);
                }
            } else {
                unset($this->rules['upload_banner']);
                if(isset($this->rules['youtube_id'])) {
                    $this->rules['youtube_id'] = str_replace('required_youtube_id', 'required', str_replace('#select_type', 'true', $this->rules['youtube_id']));
                }
            }
            
            $validator = Validator::make($request->all(), $this->rules);
            
            if (!$validator->fails()) {
                
                // $select_type = Utils::cnvNull($request->select_type, 'use_image');
                // if($select_type == 'use_image') {
                //     $filename = $data->banner;
                //     $filename_hidden = $request->banner_hidden;
                //     if(Utils::blank($filename_hidden)) {
                //         $filename = null;
                //     }
                    
                //     $key = 'upload_banner';
                //     $demension = $this->config['config'][$key . '_image_size'];
                //     Utils::resizeImage($key, $request->$key, $demension, $filename);
                //     $data->link           = Utils::cnvNull($request->link, '');
                //     $data->banner         = $filename;
                //     $data->youtube_id    = '';
                // } else {
                //     $data->youtube_id    = Utils::cnvNull($request->youtube_embed_url, '');
                //     $data->link           = '';
                //     $data->banner         = '';
                // }
                $filename = $data->banner;
                
                
                $pos = $uri[3];
                $demension = $this->bannerDemensions[$pos];
                Utils::doUploadAndResize($request, 'upload_banner', $filename, $demension);
                $data->link           = Utils::cnvNull($request->link, '');
                $data->banner         = $filename;
                $data->pos            = $pos;
                $data->description    = Utils::cnvNull($request->description, '');
                $data->status         = Utils::cnvNull($request->status, 0);
                $data->select_type    = Utils::cnvNull($request->select_type, 'use_image');
                $data->updated_at     = date('Y-m-d H:i:s');
                
                if($data->save()) {
                    return redirect(route('auth_' . $this->name . '_edit', ['id' => $request->id]))->with('success', trans('messages.UPDATE_SUCCESS'));
                }
            } else {
                return redirect(route('auth_' . $this->name . '_edit', ['id' => $request->id]))->with('error', trans('messages.ERROR'));
            }
        }
        $this->output['data'] = $data;
        $this->output['bannerDemensions'] = $this->bannerDemensions[$uri[3]];
        return view('auth.petronasvn.banners.form', $this->output);
    }
    
    public function remove(Request $request) {
        $result = ['code' => 404];
        $ids = $request->ids;
        $data = Banner::whereIn('id', $ids)->get();
        foreach($data as $dt) {
            Utils::removeFile($dt->banner);
        }
        if(Banner::destroy($ids)) {
            $result['code'] = 200;
            return response()->json($result);
        }
    }
}
