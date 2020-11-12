<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Banner;
use App\Page;
use App\Product;
use App\Vendor;
use App\Constants\Common;
use App\Constants\ContactStatus;
use App\Constants\Status;
use App\Helpers\Utils;
use App\Category;
use App\Contact;
use App\PostGroups;
use App\Post;
use App\Constants\PostStatus;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends AppController
{
    public $breadcrumb = [];
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->breadcrumb = [route('home') => trans('shop.home')];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        $centerBanners = Banner::active()->image()->where('pos', 'center')->orderBy('updated_at', 'DESC')->get();

        $leftBanners = Banner::active()->image()->where('pos', 'left')->orderBy('updated_at', 'DESC')->first();

        $rightUpBanners = Banner::active()->image()->where('pos', 'right_up')->orderBy('updated_at', 'DESC')->first();

        $rightDownBanners = Banner::active()->image()->where('pos', 'right_down')->orderBy('updated_at', 'DESC')->first();
        
        $categories = Category::select('id', 'name', 'name_url', 'parent_id')->active()->where('parent_id', 0)->orderBy('updated_at', 'DESC')->get();
        
        $newProducts = Product::active()->isNew()->orderBy('updated_at', 'DESC')->limit(3)->get();

        $bestSellerProducts = Product::active()->isBestSelling()->orderBy('updated_at', 'DESC')->limit(3)->get();
        
        $featureProducts = Product::active()->orderBy('updated_at', 'DESC')->limit(16)->get();
        
        $chunks = $featureProducts->chunk(8);

        // echo '<pre>';
        // print_r($chunks);
        // exit;

        $this->output['centerBanners'] = $centerBanners;
        $this->output['leftBanners'] = $leftBanners;
        $this->output['rightUpBanners'] = $rightUpBanners;
        $this->output['rightDownBanners'] = $rightDownBanners;
        $this->output['categories'] = $categories;
        $this->output['newProducts'] = $newProducts;
        $this->output['bestSellerProducts'] = $bestSellerProducts;
        $this->output['featureProducts'] = $chunks;
        
        $this->setSEO([
            'title' => $this->output['config']['web_description'],
            'summary' => $this->output['config']['web_description'],
            'keywords' => [$this->output['config']['web_name']],
            'link' => route('home'),
            'type' => 'website',
            'image' => Utils::getImageLink($this->output['config']['web_banner'])
        ]);

        return view('petronasvn.home', $this->output);
    }
    
    public function vendor(Request $request) {
        
        $vendor = Vendor::select('id', 'name')->active()->where('name_url', $request->slug)->first();
        
        if(!$vendor) {
            return redirect('/');
        }
        
        $this->output['breadcrumbs'] = [
            ['link' => '#', 'text' => $vendor->getName()]
        ];
        $this->output['data'] = $vendor;
        $this->output['view_type'] = 'grid';
        $this->output['page_name'] = 'vendor-page';
        
        $this->setSEO(['title' => $vendor->getName(), 'link' => $vendor->getLink()]);
        
        return view('shop.product_list', $this->output);
    }
    
    public function category(Request $request) {
        $category = Category::select('id', 'name')->active()->where('name_url', $request->slug)->first();

        $categories = Category::select('id', 'name', 'name_url', 'parent_id')->active()->where('parent_id', 0)->orderBy('updated_at', 'DESC')->get();
        
        $newProducts = Product::active()->isNew()->orderBy('updated_at', 'DESC')->limit(3)->get();

        $bestSellerProducts = Product::active()->isBestSelling()->orderBy('updated_at', 'DESC')->limit(3)->get();

        if(!$category) {
            return redirect('/');
        }
        
        $this->output['breadcrumbs'] = [
            ['link' => '#', 'text' => $category->getName()]
        ];
        $this->output['data'] = $category;
        $this->output['view_type'] = 'grid';
        $this->output['page_name'] = 'category-page';
        $this->output['categories'] = $categories;
        $this->output['newProducts'] = $newProducts;
        $this->output['bestSellerProducts'] = $bestSellerProducts;
        
        $this->setSEO(['title' => $category->getName(), 'link' => $category->getLink()]);
        
        return view('petronasvn.category', $this->output);
    }
    
    public function productDetails(Request $request) {
        $slug = $request->slug;
        
        $product = Product::select(
                        'products.name',
                        'products.name_url',
                        'products.price',
                        'products.id',
                        'products.description',
                        'products.summary',
                        'products.category_id',
                        'products.vendor_id',
                        'products.is_new',
                        'products.is_best_selling',
                        'products.is_popular',
                        'products.discount',
                        'products.status',
                        'products.avail_flg',
                        'products.seo_keywords',
                        'products.seo_description'
                    )
                    ->where(['products.status' => Status::ACTIVE, 'products.name_url' => $slug])->first();
        
        if(!$product) {
            return redirect('/');
        }
        
        $this->setSEO([
            'title' => $product->name,
            'summary' => $product->getSEODescription(),
            'section' => $product->getCategoryName(),
            'keywords' => [$product->getSEOKeywords(), $product->getCategoryName(), $this->output['config']['web_name']],
            'link' => $product->getLink(),
            'type' => 'product',
            'image' => $product->getFirstImage()
        ]);
        
        $this->output['breadcrumbs'] = [
            ['link' => $product->getCategoryLink(), 'text' => $product->getCategoryName()],
            ['link' => '#', 'text' => $product->getName()]
        ];
        $this->output['data'] = $product;
        return view('petronasvn.product_detail', $this->output);
        
    }
    
    public function products(Request $request) {

        $categories = Category::select('id', 'name', 'name_url', 'parent_id')->active()->where('parent_id', 0)->orderBy('updated_at', 'DESC')->get();
        
        $newProducts = Product::active()->isNew()->orderBy('updated_at', 'DESC')->limit(3)->get();

        $bestSellerProducts = Product::active()->isBestSelling()->orderBy('updated_at', 'DESC')->limit(3)->get();
        
        $this->setSEO(['title' => trans('shop.main_nav.products.text'), 'link' => route('products')]);

        $this->output['categories'] = $categories;
        $this->output['newProducts'] = $newProducts;
        $this->output['bestSellerProducts'] = $bestSellerProducts;
        
        return view('petronasvn.products', $this->output);
    }
    
    public function about(Request $request) {
        
        $about = Page::where('type', 'gioi_thieu')->first();

        $this->output['page'] = $about;
        
        $this->setSEO(['title' => trans('petronasvn.main_nav.about.text'), 'link' => route('about')]);
        
        return view('petronasvn.page', $this->output);
    }
    
    public function orderIntroduction(Request $request) {
        
        $about = Page::where('type', 'mua_hang')->first();

        $this->output['page'] = $about;
        
        $this->setSEO(['title' => trans('petronasvn.main_nav.order_introduction.text'), 'link' => route('order_introduction')]);
        
        return view('petronasvn.page', $this->output);
    }
    
    public function guaranteePolicy(Request $request) {
        
        $about = Page::where('type', 'bao_hanh')->first();

        $this->output['page'] = $about;
        
        $this->setSEO(['title' => trans('petronasvn.policy.guarantee_txt'), 'link' => route('guarantee_policy')]);
        
        return view('petronasvn.page', $this->output);
    }
    
    public function shipmentPolicy(Request $request) {
        
        $about = Page::where('type', 'van_chuyen')->first();

        $this->output['page'] = $about;
        
        $this->setSEO(['title' => trans('shop.policy.shipment_txt'), 'link' => route('shipment_policy')]);
        
        return view('petronasvn.page', $this->output);
    }
    
    public function contact(Request $request) {
        
        
        if($request->ajax()) {
            
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'content' => 'required',
                'subject' => 'required',
            ];
            
            if($request->getSession()->has('captcha')) {
                $rules['captcha'] = 'required|captcha';
            }
            
            $messages = [
                'name.required' => trans('validation.required', ['attribute' => 'Họ tên']),
                'email.required' => trans('validation.required', ['attribute' => 'E-mail']),
                'phone.required' => trans('validation.required', ['attribute' => 'Số điện thoại']),
                'subject.required' => trans('validation.required', ['attribute' => 'Tựa đề']),
                'content.required' => trans('validation.required', ['attribute' => 'Nội dung']),
                'email.email' => trans('validation.email'),
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            if($validator->fails()) {
                $errors = $validator->errors();
                $result['#contact_error'] = $this->createErrorList($errors->toArray());
                return response()->json($result);
            }
            
            DB::beginTransaction();
            
            try {
                
                $contact = new Contact();
                
                $contact->name = Utils::cnvNull($request->name, '');
                $contact->email = Utils::cnvNull($request->email, '');
                $contact->phone = Utils::cnvNull($request->phone, '');
                $contact->content = Utils::cnvNull($request->content, '');
                $contact->subject = Utils::cnvNull($request->subject, '');
                $contact->status = ContactStatus::NEW_CONTACT;
                $contact->created_at    = date('Y-m-d H:i:s');
                $contact->updated_at    = date('Y-m-d H:i:s');
                
                // Config mail
                $subject = trans('auth.subject_mail', ['web_name' => $this->output['config']['web_name'], 'title' => trans('shop.mail_subject.contact', ['email' => $request->email])]);
                $config = [
                    'from' => $this->output['config']['mail_from'],
                    'from_name' => $this->output['config']['mail_name'],
                    'subject' => $subject,
                    'msg' => [
                        'contact_name' => $contact->name,
                        'contact_email' => $contact->email,
                        'contact_phone' => $contact->phone,
                        'contact_subject' => $contact->subject,
                        'contact_content' => $contact->content,
                        'contact_created_at' => Utils::formatDate($contact->created_at)
                    ],
                    'to'       => $this->output['config']['web_email'],
                    'template' => 'shop.emails.contact_alert'
                ];
                
                $message = Utils::sendMail($config);
                if(!Utils::blank($message)) {
                    \Log::error($message);
                }
                
                if($contact->save()) {
                    $result['#contact_success'] = trans('messages.SEND_CONTACT_SUCCESS');
                    $result['#captcha_img'] = captcha_img('flat');
                } else {
                    $result['#contact_error'] = trans('messages.ERROR');
                }
                
                DB::commit();
                
            }  catch(\Exception $e) {
                $result['#contact_error'] = trans('messages.ERROR');
                DB::rollBack();
            }
            
            return response()->json($result);
        }
        
        $this->output['breadcrumbs'] = [
            ['link' => '#', 'text' => trans('shop.main_nav.contact.text')]
        ];
        
        $this->setSEO(['title' => trans('shop.main_nav.contact.text'), 'link' => route('contact')]);
        
        return view('shop.contact', $this->output);
    }
    
    public function search(Request $request) {
        
        $keyword = $request->q;
        $this->output['breadcrumbs'] = [
            ['link' => '#', 'text' => trans('shop.search_results', compact('keyword'))]
        ];
        
        $this->setSEO(['title' => trans('shop.search_results')]);
        
        return view('shop.search', $this->output);
    }
    
    public function posts(Request $request) {

        $posts = Post::active()->orderBy('created_at', 'desc');
        
        $this->setSEO(['title' => trans('petronasvn.main_nav.posts.text'), 'link' => route('posts.list')]);
        
        return view('petronasvn.posts', $this->output);
    }
    
    public function postDetails(Request $request) {
        
        $slug1 = $request->slug1;
        
        $post = Post::active()->where('name_url', $slug1)->first();
        
        if(!$post) {
            return redirect('/');
        }
        
        $this->output['data'] = $post;
        
        $this->setSEO([
            'title' => $post->name,
            'summary' => $post->getSEODescription(),
            'keywords' => [$post->getSEOKeywords(), $this->output['config']['web_name']],
            'link' => $post->getLink(),
            'type' => 'article',
            'image' => $post->getImage()
        ]);
            
        return view('petronasvn.post_details', $this->output);
    }
    
    public function postGroup(Request $request) {
        
        $slug = $request->slug;
        $postGroup = PostGroups::select('id', 'name')->active()->where('name_url', $slug)->first();
        
        if(!$postGroup) {
            return redirect('/');
        }
        
        $this->output['breadcrumbs'] = [
            ['link' => route('posts'), 'text' => trans('shop.main_nav.posts.text')],
            ['link' => '#', 'text' => $postGroup->getName()],
        ];
        
        $this->output['title'] = $postGroup->getName();
        $this->output['data'] = $postGroup;
        $this->output['page_name'] = 'posts-group-page';
        
        $this->setSEO(['title' => $postGroup->getName(), 'link' => $postGroup->getLink()]);
        
        return view('shop.posts', $this->output);
    }
    
    public function loadData(Request $request) {
        $result = [];
        
        if($request->ajax()) {
            $id = $request->id;
            $lastId = $request->lastId;
            $limit = $request->limit;
            $sort = $request->sort;
            $page = $request->page_name;

            $query = null;
            
            switch($page) {
                case 'category':

                    $query = Product::active();

                    $query = $query->where('category_id', $id);

                    $view = 'petronasvn.common.product_list';

                    break;

                case 'products':
                    
                    $query = Product::active();

                    $view = 'petronasvn.common.product_list';

                    break;

                case 'posts':

                    $query = Post::active()->orderBy('updated_at', 'desc');

                    $view = 'petronasvn.common.post_list';

                    break;

                case 'recent_articles':

                    $query = Post::active()->orderBy('created_at', 'desc');

                    $view = 'petronasvn.common.recent_articles';

                    break;
            }

            if($sort == 'is_new') {
                $query = $query->where('is_new', Status::IS_NEW);
            }

            if($sort == 'is_best_selling') {
                $query = $query->where('is_best_selling', Status::IS_BEST_SELLING);
            }

            if($sort == 'is_discount') {
                $query = $query->where('discount', '>', 0);
            }

            if($sort == 'price_ascending') {
                $query = $query->orderByRaw('CAST(price AS UNSIGNED) asc');
            }

            if($sort == 'price_descending') {
                $query = $query->orderByRaw('CAST(price AS UNSIGNED) desc');
            }

            $total = $query->count();

            if($lastId > 0) {
                $query = $query->where('id', '>', $lastId);
            }

            $data = $query->limit($limit)->get();

            
            $html = view($view, ['data' => $data, 'route' => $page])->render();
            $lastId = count($data) ? $data[count($data) - 1]->id : 0;
            return response()->json(['html' => $html, 'last_id' => $lastId, 'total' => $total]);
            
        }
    }
}
