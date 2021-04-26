<?php

namespace App\Http\Controllers\Auth;

use App\Color;
use App\Product;
use App\ServiceGroups;
use App\Size;
use App\Category;
use App\Vendor;
use App\Constants\Common;
use App\Constants\Status;
use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\ImageProduct;
use App\Constants\ProductType;
use App\Services;
use App\ProductServiceGroup;
use App\ProductDetailGroups;
use App\ProductDetails;
use App\Constants\ProductStatus;

class ProductsController extends AppController
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
    public function search(Request $request, $type = '') {
        
        return $this->doSearch($request, new Product(), $type);
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
                
                DB::beginTransaction();
                
                try {
                    $data = new Product();
                    $data->name          = Utils::cnvNull($request->name, '');
                    $data->name_url      = Utils::createNameUrl(Utils::cnvNull($request->name, '')) . '.' . time();
                    $data->price         = Utils::cnvNull($request->price, trans('auth.price_empty_text'));
                    $data->category_id   = Utils::cnvNull($request->category_id, '0');
                    $data->vendor_id     = Utils::cnvNull($request->vendor_id, '0');
                    $data->discount      = Utils::cnvNull($request->discount, 0);
                    $data->description   = Utils::cnvNull($request->description, '');
                    $data->summary   = Utils::cnvNull($request->summary, '');
                    $data->status        = Utils::cnvNull($request->status, Status::UNACTIVE);
                    $data->avail_flg     = Utils::cnvNull($request->avail_flg, ProductStatus::OUT_OF_STOCK);
                    $data->is_new        = Utils::cnvNull($request->is_new, 0);
                    $data->is_popular        = Utils::cnvNull($request->is_popular, 0);
                    $data->is_best_selling   = Utils::cnvNull($request->is_best_selling, 0);
                    $data->seo_keywords      = Utils::cnvNull($request->seo_keywords, '');
                    $data->seo_description   = Utils::cnvNull($request->seo_description, '');
                    $data->created_at    = date('Y-m-d H:i:s');
                    $data->updated_at    = date('Y-m-d H:i:s');
                    
                    if($data->save()) {
                        $is_main = $request->is_main;
                        $arrFilenames = [];
                        Utils::doUploadMultiple($request, 'upload_image', $data->id, $arrFilenames, $is_main);
                        if(count($arrFilenames)) {
                            DB::table(Common::IMAGES_PRODUCT)->insert($arrFilenames);
                        }
                        
                        // $this->addService($data->id, $request);
                        
                        DB::commit();
                        
                        return redirect(route('auth_products_create'))->with('success', trans('messages.CREATE_SUCCESS'));
                    }
                    
                } catch(\Exception $e) {
                    DB::rollBack();
                }
                
            } else {
                return redirect(route('auth_products_create'))->with('error', trans('messages.ERROR'));
            }

        } else {
            $this->getRootCategory();
            $this->getVendors();
        }

        $this->output['data'] = new Product();

        return view('auth.petronasvn.products.form', $this->output);
    }
    
    /**
     * create
     * @param Request $request
     */
    public function edit(Request $request, $id = null, $isCopy = null) {
        
        $request->flash();
        
        $validator = [];
        
        $data = Product::find($request->id);

        if($request->isMethod('post')) {
            
            $request->description = str_replace('\r\n', '', $request->description);
            $validator = Validator::make($request->all(), $this->rules);
            
            if (!$validator->fails()) {

                DB::beginTransaction();
                
                try {

                    if($isCopy) {
                        $copyData = $data->replicate();
                        $copyData->push();
                        $data->load('imageProducts');
                        foreach($data->getRelations() as $relation => $items){
                            foreach($items as $item){
                                unset($item->id);
                                $copyData->{$relation}()->create($item->toArray());
                            }
                        }

                        $data = $copyData;
                    }
    
                    $data->name          = Utils::cnvNull($request->name, '');
                    $data->name_url      = Utils::createNameUrl(Utils::cnvNull($request->name, ''));
                    $data->price         = Utils::cnvNull($request->price, trans('auth.price_empty_text'));
                    $data->category_id   = Utils::cnvNull($request->category_id, '0');
                    $data->vendor_id     = Utils::cnvNull($request->vendor_id, '0');
                    $data->discount      = Utils::cnvNull($request->discount, '');
                    $data->description   = Utils::cnvNull($request->description, '');
                    $data->summary       = Utils::cnvNull($request->summary, '');
                    $data->status        = Utils::cnvNull($request->status, Status::UNACTIVE);
                    $data->avail_flg     = Utils::cnvNull($request->avail_flg, ProductStatus::OUT_OF_STOCK);
                    $data->is_new        = Utils::cnvNull($request->is_new, 0);
                    $data->is_popular        = Utils::cnvNull($request->is_popular, 0);
                    $data->is_best_selling   = Utils::cnvNull($request->is_best_selling, 0);
                    $data->seo_keywords      = Utils::cnvNull($request->seo_keywords, '');
                    $data->seo_description   = Utils::cnvNull($request->seo_description, '');
                    $data->updated_at    = date('Y-m-d H:i:s');
                    if($isCopy) {
                        $data->created_at = date('Y-m-d H:i:s');
                    }
                    
                    if($data->save()) {
                        $is_main = $request->is_main;
    
                        $imageProducts = $data->imageProducts()->get();
    
                        $images_del = $request->images_del;
                        $is_main = $request->is_main;
    
                        foreach($imageProducts as $indx=>&$imageProduct) {
                            $imageProduct->is_main = $is_main ? 0 : $imageProduct->is_main;
                            $id = $imageProduct->id;
                            if(!is_null($images_del) && in_array($id, $images_del)) {
                                $imageProduct->delete();
                                unset($imageProducts[$indx]);
                            }
    
                            if($is_main && $imageProduct->id == $is_main) {
                                $imageProduct->is_main = 1;
                            }
                        }
    
                        // Add new image
                        $arrFilenames = [];
                        Utils::doUploadMultiple($request, 'upload_image', $data->id, $arrFilenames, $is_main);
                        if(count($arrFilenames)) {
                            foreach($arrFilenames as $file) {
                                $imageProduct = new ImageProduct();
                                $imageProduct->fill($file);
                                $imageProducts->push($imageProduct);
                            }
                        }

                        $data->imageProducts()->saveMany($imageProducts);

                        DB::commit();

                        $id = $isCopy ? $data->id : $request->id;
                        $message = $isCopy ? 'messages.COPY_SUCCESS' : 'messages.UPDATE_SUCCESS';
                        
                        return redirect(route('auth_products_edit', ['id' => $id]))->with('success', trans($message));
                    }

                } catch(\Exception $e) {
                    DB::rollBack();
                }

                
            } else {
                return redirect(route('auth_products_edit', ['id' => $request->id]))->with('error', trans('messages.ERROR'));
            }
        } else {
            $this->getRootCategory();
            $this->getVendors();
        }
        
        $this->output['data'] = $data;
        return view('auth.petronasvn.products.form', $this->output);
    }
    
    public function remove(Request $request) {
        $result = ['code' => 404];
        $ids = $request->ids;
        if(Product::destroy($ids)) {
            ProductDetails::whereIn('product_id', $ids)->delete();
            $image_products = ImageProduct::whereIn('product_id', $ids)->get();
            foreach($image_products as $image) {
                Utils::removeFile($image->image);
                Utils::removeFile($image->medium);
                Utils::removeFile($image->small);
            }
            ImageProduct::whereIn('product_id', $ids)->delete();
            $result['code'] = 200;
            return response()->json($result);
        }
    }

    public function copy(Request $request) {
        // if($request->isMethod('post')) {
        //     // return $this->create($request);
        //     $product = Product::find($request->id);
        //     $copyProduct = $product->replicate();
        //     $copyProduct->save();
        // }
        return $this->edit($request, null, true);
    }

    public function getRootCategory() {
        $categories = Category::active()->rootParent()->get()->pluck('name', 'id')->toArray();
        $this->output['root_categories'] = $categories;
    }
    
    public function getVendors() {
        $vendors = Vendor::active()->get()->pluck('name', 'id')->toArray();
        $this->output['vendors'] = $vendors;
    }

    private function addService($productId, $request) {
        $services = $request->service;
        
        if($services != null && count($services)) {
            ProductDetails::where('product_id', $productId)->delete();
            foreach($services as $key=>$value) {
                
                $items = $value['item'];
                
                if(!count($items)) {
                    continue;
                }
                
                $productDetailGroup = ProductDetailGroups::where('name', trim($value['group_name']))->first();
                if(!$productDetailGroup) {
                    $productDetailGroup               = new ProductDetailGroups();
                    $productDetailGroup->name         = strip_tags($value['group_name']);
                    $productDetailGroup->created_at   = date('Y-m-d H:i:s');
                    $productDetailGroup->save();
                }
                
                if($productDetailGroup->id) {
                    
                    foreach($items as $item) {
                        
                        if(Utils::blank($item['name'])) {
                            continue;
                        }
                        
                        $detail = new ProductDetails();
                        $detail->name = strip_tags($item['name']);
                        $detail->price = strip_tags($item['price']);
                        $detail->product_id = $productId;
                        $detail->product_detail_group_id = $productDetailGroup->id;
                        $detail->save();
                    }
                }
            }
        }
    }
    
}
