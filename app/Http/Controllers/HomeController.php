<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Poster;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Province;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Tags;
use App\Models\Url;
use App\Models\User;
use App\Traits\HandleFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    use HandleFile;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }
    function filterVideo($string) {
        $array = explode(",", $string);

        $result = array();
        $imageExtensions = array("png", "jpg", "jpeg", "gif");
        $videoExtensions = array("mp4", "avi", "mov", "wmv");
        $result['images'] = [];
        $result['videos'] = [];
        foreach ($array as $item) {
            $extension = pathinfo($item, PATHINFO_EXTENSION);
            if (in_array($extension, $imageExtensions)) {
                $result['images'][] = $item;
            } else if (in_array($extension, $videoExtensions)) {
                $result['videos'][] = $item;
            }
        }

        return $result;
    }

    public function root()
    {
        $categories = Category::where('id', '>', 0)->orderBy('ordering', 'ASC')->get();

        $data = [];
        foreach ($categories as $key => $category) {
            if ($key === 5) {
                break;
            }
            $products = $category->products()
                ->orderBy('ordering', 'ASC')
                ->take(5)
                ->get();

            $data[$category->title] = $products;
        }
        $sliders = Slider::where('is_show', true)->orderBy('ordering', 'ASC')->get();
        $first_poster = Poster::where('is_show', true)->orderBy('ordering', 'ASC')->take(4)->get();
        $second_poster = Poster::where('is_show', true)->orderBy('ordering', 'ASC')->skip(4)->take(1)->first();
        $customers = Customer::where('id', '>', 0)->orderBy('ordering', 'ASC')->get();

        return view('frontend.index', compact(['data', 'categories', 'sliders', 'first_poster', 'second_poster', 'customers']));
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }

    public function checkURL(Request $request)
    {
        $input = $request->all();

        $url = Url::where('alias', $input['alias'])->where('module', $input['module'])->latest('created_at')->first();
        if (!isset($url)) return response([
            'success' => false,
            'data' => 0
        ]);
        $data = Url::latest('created_at')->first();
        return response([
            'success' => true,
            'data' => $data->id,
        ]);
    }

    public function getAllTags(Request $request, $module) {
        $tagsAll = Tags::where('id', '>=', 0)->select('id', 'name as text')->get()->toArray();

        if ($request->get('param') !== null) {
            $model = '\\App\Models\\'.ucfirst($module);
            $news = $model::find($request->get('param'));

            $tagIds = $news->tags()->select('tags.id as tas_id')->get()->toArray();

            foreach ($tagIds as $tagId) {
                $foundKey = array_search($tagId['tas_id'], array_column($tagsAll, 'id'));

                if ($foundKey >= 0) {
                    $tagsAll[$foundKey]['selected'] = true;
                }
            }
        }

        return response()->json(['data' => $tagsAll]);
    }

    public function storeTag(Request $request) {
        $totalInput = $request->all();
        $tag = Tags::where('name', $totalInput['text'])->get();
        $newTagID = null;
        if (count($tag) === 0) {
            $input['name'] = $totalInput['text'];
            $newTag = Tags::create($input);
            $newTagID = $newTag->id;
        }

        $temp = Tags::where('id', '>=', 0)->where('id', '<>', $newTagID)->select('id', 'name as text')->get()->toArray();
        return response([
            'success' => true,
            'data' => $temp,
        ]);
    }

    public function uploadImage(Request $request, $module): string
    {
        $findName = $request->file('gallery')[0]->getClientOriginalName();
        $find = false;
        $path = public_path().'/images/'.$module;
        if (is_dir($path)) {
            $listFindName = scandir($path);
            $find = array_search($findName, $listFindName);
        }

        if ($request->has('gallery') && !$find) {
            $image = $request->file('gallery')[0];

            $responsiveAvatar = $this->uploadAndConvertImage($image, '/images/'.$module);
            return $responsiveAvatar->getData()->path;
        }

        return '/images/products/'.$findName;
    }

    public function getImageProduct(Request $request) {
        $product = Product::find($request->get('param'));

        $images = explode(',', $product->images);
        $imageFormats = [];
        foreach ($images as $image) {
            if (strlen($image) > 0) {
                $imageFormat = ['source' => $image, 'options' => ['type' => 'input']];
                $imageFormats[] = $imageFormat;
            }
        }

        return response()->json(['data' => $imageFormats]);
    }
    public function sendMailContact(Request $request) {
        $input = $request->all();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d-m-y H:i:s');
        Mail::send('frontend.mail.mail-contact', ['contact' => $input, 'dateNow' => $date], function ($m) use ($input) {
            $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $m->to($input['send_to'], 'DMCmedia')->subject('[Pháo hoa quốc phòng] Thông tin cần liên hệ!');
        });

        return response([
            'success' => true
        ]);
    }
    public function getProductId($id) {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['data' => $product]);
        }

        return response()->json(['data' => null]);
    }
    public function getDistrictByProvince($provinceCode) {
        $province = Province::where('code', $provinceCode)->first();
        $district_html = \App\Helper\StringHelper::getSelectOptionPlace([], '', 'Vui lòng chọn quận huyện', false);
        if ($province) {
            $district_html = \App\Helper\StringHelper::getSelectOptionPlace($province->districts, '', 'Vui lòng chọn quận huyện', false);
        }

        return response()->json(['data' => $district_html]);
    }

    public function getWardByProvince($districtCode) {
        $district = District::where('code', $districtCode)->first();
        $ward_html = \App\Helper\StringHelper::getSelectOptionPlace([], '', 'Vui lòng chọn xã/phường thị trấn', false);
        if ($district) {
            $ward_html = \App\Helper\StringHelper::getSelectOptionPlace($district->wards, '', 'Vui lòng chọn xã/phường thị trấn', false);
        }

        return response()->json(['data' => $ward_html]);
    }
    public function createOrder(Request $request) {
        $input = $request->all();
        $orderInput = [];
        foreach ($input['basic_info'] as $info) {
            $orderInput[$info['name']] = $info['value'];
        }
        $mailTo = $orderInput['send_to'];
        $orderInput['status'] = 'progress';
        DB::beginTransaction();
        try {
            $totalPrice = 0;
            $order = Order::create($orderInput);

            $inputOrderDetail = [];
            foreach ($input['orders'] as $orderDetail) {
                $inputOrderDetail['order_id'] = $order->id;
                $inputOrderDetail['product_id'] = $orderDetail['id'];
                $inputOrderDetail['price_discount'] = $orderDetail['price'];
                $inputOrderDetail['price'] = $orderDetail['price'];
                $inputOrderDetail['quantity'] = $orderDetail['quantity'];
                $totalPrice += $orderDetail['quantity'] * $orderDetail['price'];
                OrderDetail::create($inputOrderDetail);
            }
            DB::commit();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d-m-y H:i:s');
            Mail::send('frontend.mail.mail-order', ['order' => $order, 'dateNow' => $date, 'totalPrice' => $totalPrice], function ($m) use ($mailTo) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $m->to($mailTo, 'DMCmedia')->subject('[Pháo hoa quốc phòng] Đơn đặt hàng mới!');
            });
            return response()->json(['isSuccess' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['isSuccess' => false]);
        }
    }
    public function changeStatusOrder(Request $request) {
        $input = $request->all();
        $order = Order::find($input['orderId']);
        if ($order) {
            try {
                $order->update(['status'=>$input['status']]);
                return response()->json(['isSuccess' => true]);
            } catch (\Exception $e) {
                return response()->json(['isSuccess' => false]);
            }
        } else {
            return response()->json(['isSuccess' => false]);
        }
    }

    function checkPromotion($code, Request $request) {
        $order = $request->get('orders');
        $promo = Promotion::where('code', $code)->first();
        if (!$promo) {
            return response()->json(['success' => false, 'message' => 'Mã code không được tìm thấy!']);
        }
        $currentDateTime = Carbon::now();
        if ($promo->from_date !== null && $currentDateTime->lessThan($promo->from_date)) {
            return response()->json(['discount' => 0, 'success' => false, 'message' => "Chương trình khuyến mãi đã hết hạn !"]);
        }

        if ($promo->to_date !== null && $currentDateTime->greaterThan($promo->to_date)) {
            return response()->json(['discount' => 0, 'success' => false, 'message' => "Chương trình khuyến mãi đã hết hạn !"]);
        }
        $total = 0;
        foreach ($order as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        if ($total < $promo->min_total) {
            return response()->json(['discount' => 0, 'success' => false, 'message' => "Chương trình áp dụng cho đơn hàng trên ".number_format($promo->min_total)]);
        }
        if ($promo->fixed_price > 0) {
            return response()->json(['discount' => $promo->fixed_price, 'success' => true, 'message' => "Chương trình đã được áp dụng"]);
        }
        if ($promo->fixed_percent > 0) {
            $tempDiscount = ($promo->fixed_percent * $total)/100;
            $maxDiscount = $promo->max_discount ?? 0;

            if ($maxDiscount === 0) {
                $discount = $tempDiscount;
            } else {
                if ($tempDiscount > $maxDiscount) {
                    $discount = $promo->max_discount;
                } else {
                    $discount = $tempDiscount;
                }
            }

            return response()->json(['discount' => $discount, 'success' => true, 'message' => "Chương trình đã được áp dụng"]);
        }

        return response()->json(['discount' => 0, 'success' => false, 'message' => "Chương trình khuyến mãi đã hết hạn !"]);
    }
    public function getPromotion($code, Request $request) {
        return $this->checkPromotion($code, $request);
    }

    public function getColor(Request $request) {
        dd($request->all());
    }
}
