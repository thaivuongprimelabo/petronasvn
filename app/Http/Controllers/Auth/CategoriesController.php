<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Common;
use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Category;

class CategoriesController extends AppController
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        parent::__construct();
        
        $this->middleware('auth');
        
    }
    
    /**
     * search
     * @param Request $request
     */
    public function search(Request $request) {
        return $this->doSearch($request, new Category());
    }
    
    /**
     * create
     * @param Request $request
     */
    public function create(Request $request) {
        
        $request->flash();
        
        $validator = [];
        
        if($request->isMethod('post')) {
            
            $validator = Validator::make($request->all(), $this->rules);
            
            if (!$validator->fails()) {
                $parentCate = Category::select(DB::raw('(CASE WHEN parent_id = 0 THEN id ELSE parent_id END) AS id'))->where('id', $request->parent_id)->first();
                
                $data = new Category();
                $data->name         = Utils::cnvNull($request->name, '');
                $data->name_url     = Utils::createNameUrl(Utils::cnvNull($request->name, ''));
                $data->parent_id    = Utils::cnvNull($request->parent_id, 0);
                $data->parent_id    = Utils::cnvNull($request->parent_id, 0);
                $data->parent_parent_id = $parentCate ? $parentCate->id : 0;
                $data->status       = Utils::cnvNull($request->status, 0);
                $data->created_at   = date('Y-m-d H:i:s');
                $data->updated_at   = date('Y-m-d H:i:s');
                
                if($data->save()) {
                    return redirect(route('auth_categories_create'))->with('success', trans('messages.CREATE_SUCCESS'));
                }
            } else {
                return redirect(route('auth_categories_create'))->with('error', trans('messages.ERROR'));
            }
        }

        $this->getRootCategory();
        
        return view('auth.petronasvn.categories.form', $this->output);
    }
    
    /**
     * edit
     * @param Request $request
     */
    public function edit(Request $request) {
        
        $request->flash();
        
        $validator = [];
        
        $data = Category::find($request->id);
        
        if($request->isMethod('post')) {
            
            $validator = Validator::make($request->all(), $this->rules);
            if (!$validator->fails()) {
                // $parentCate = Category::select(DB::raw('(CASE WHEN parent_id = 0 THEN id ELSE parent_id END) AS id'))->where('id', $request->parent_id)->first();
                
                $data->name         = Utils::cnvNull($request->name, '');
                $data->name_url     = Utils::createNameUrl(Utils::cnvNull($request->name, ''));
                $data->parent_id    = 0;
                $data->parent_parent_id = 0;
                $data->status       = Utils::cnvNull($request->status, 0);
                $data->updated_at   = date('Y-m-d H:i:s');
                
                if($data->save()) {
                    return redirect(route('auth_categories_edit', ['id' => $request->id]))->with('success', trans('messages.UPDATE_SUCCESS'));
                }
            } else {
                return redirect(route('auth_categories_edit', ['id' => $request->id]))->with('error', trans('messages.ERROR'));
            }
            
        }
        
        $this->getRootCategory();
        $this->output['data'] = $data;
        return view('auth.petronasvn.categories.form', $this->output);
    }
    
    public function remove(Request $request) {
        $result = ['code' => 404];
        $ids = $request->ids;
        if(Category::destroy($ids)) {
            $result['code'] = 200;
            return response()->json($result);
        }
    }

    public function getRootCategory() {
        $categories = Category::active()->rootParent()->get()->pluck('name', 'id')->toArray();
        $this->output['root_categories'] = $categories;
    }
}
