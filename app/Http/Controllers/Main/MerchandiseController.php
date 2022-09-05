<?php

namespace App\Http\Controllers\Main;

use App\Entities\Content\Slider;
use App\Entities\Core\ConfigurationModel;
use App\Entities\Core\Tracker;
use App\Entities\Event\Event;
use App\Entities\Merchandise\Product;
use App\Http\Controllers\Controller;
use App\Http\Traits\RajaOngkirTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class MerchandiseController extends Controller{

    use RajaOngkirTrait;

    public function __construct(){
        $tracker = new Tracker();
        $tracker->visits();

        View::share('config',ConfigurationModel::find(1));
        View::share('event',Event::all());

        Carbon::setLocale('id');
    }

    public function index(Request $request){

        if (!$request->cari){
            $data['data']           = Product::orderBy('id', 'DESC')->paginate(12);
            $data['query']          = '';
        }else{
            $data['data']           = Product::where('name','like',"%".$request->cari."%")->orderBy('id', 'DESC')->paginate(12);
            $data['query']          = $request->cari;
        }

        $cookieData             = stripslashes(Cookie::get('shopping_cart'));
        $cartData               = json_decode($cookieData, true);

        $data['countCart']      = $cartData ? count($cartData) : 0;

        return view('main.merchandise.index', $data);
    }

    public function detail($slug){

        if (!$slug){
            abort(404);
        }

        $data['data']           = Product::getBySlug($slug);

        return view('main.merchandise.detail', $data);
    }

    public function addCart(Request $request, $slug){

        if (!$slug){
            abort(404);
        }

        $product            = Product::getBySlug($slug);

        if ($request->quantity <= 0){
            alert()->info('Mohon Maaf!','Minimum pembelian adalah 1 pcs');
            return redirect()->back();
        }

        if(Cookie::get('shopping_cart')) {
            $cookieData     = stripslashes(Cookie::get('shopping_cart'));
            $cartData       = json_decode($cookieData, true);
        } else {
            $cartData       = [];
        }

        $itemId             = array_column($cartData, 'item_id');
        $productId          = $product->id;
        $productQty         = $request->quantity;
        $productPrice       = $product->price;
        $productTotal       = $product->price * $request->quantity;
        $totalWeight        = $product->weight * $request->quantity;

        if(in_array($productId, $itemId)) {
            foreach($cartData as $keys => $values) {
                if($cartData[$keys]["item_id"] == $productId) {
                    $cartData[$keys]["item_quantity"]   = $productQty;
                    $cartData[$keys]["item_total"]      = $productTotal;
                    $item_data                          = json_encode($cartData);
                    $minutes                            = 180;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));

                    alert()->success('Sukses!',$cartData[$keys]["item_name"].' Berhasil Ditambahkan.');
                    return redirect()->route('merchandise.main');
                }
            }
        } else {
            $productName    = $product->name;
            $productImg     = $product->image;
            $priceVal       = $productPrice;

            if($product) {
                $itemArr = [
                    'item_id'       => $productId,
                    'item_name'     => $productName,
                    'item_quantity' => $productQty,
                    'item_price'    => $priceVal,
                    'item_image'    => $productImg,
                    'item_total'    => $productTotal,
                    'item_weight'   => $totalWeight
                ];

                $cartData[]     = $itemArr;

                $itemData       = json_encode($cartData);
                $minutes        = 180;
                Cookie::queue(Cookie::make('shopping_cart', $itemData, $minutes));

                alert()->success('Sukses!',$productName.' Berhasil Ditambahkan.');
                return redirect()->route('merchandise.main');
            }
        }

    }

    public function destroyCart(){

        Cookie::queue(Cookie::forget('shopping_cart'));

        return redirect()->back();

    }

    public function cart(){
        $cookieData             = stripslashes(Cookie::get('shopping_cart'));
        $cartData               = json_decode($cookieData, true);

        $data['data']           = $cartData;

        return view('main.merchandise.cart', $data);
    }

    public function checkout(){
        $cookieData             = stripslashes(Cookie::get('shopping_cart'));
        $cartData               = json_decode($cookieData, true);

        if (!$cartData){
            alert()->info('Mohon Maaf!','Untuk mengakses halaman ini diharuskan untuk memilih merchandise terlebih dahulu');
            return redirect()->back();
        }

        $data['cart']           = $cartData;
        $data['province']       = $this->getProvince();

        return view('main.merchandise.checkout', $data);
    }

}
