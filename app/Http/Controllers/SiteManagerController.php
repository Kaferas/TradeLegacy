<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\AdressLocation;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Live;
use App\Models\parteners;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\Tags;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class SiteManagerController extends Controller
{
    public function home(){
        $contact=AdressLocation::first();
        $sliders=Slider::where("status",0)->orderBy("id","DESC")->get();
        $parteners=parteners::where("deleted_status",0)->get();
        $schedulers = Schedule::first();
        $faqs = \App\Models\Faq::where("is_published",1)->get();
        $blogs= Articles::where("is_published",'on')->where("deleted_status",0)->with('tags','categories','user','pictures')->orderBy("id","DESC")->paginate(6);
        return view('front.home',['schedulers'=>$schedulers,'about' => $contact ,'blogs' => $blogs,'sliders'=>$sliders,'parteners'=>$parteners,'faqs'=>$faqs]);
    }

    public function adresse(){
        $schedulers = Schedule::first();
        return view('front.blogs.adresse',['schedulers' => $schedulers]);
    }

    public function about(){
        $contact=AdressLocation::first();
        $teams= Team::where("deleted_status",0)->get();
        return view('front.blogs.about',['teams' => $teams,'about'=>$contact]);
    }
    public function contact(){
        $contact=AdressLocation::first();
        $teams= Team::where("deleted_status",0)->get();
        return view('front.blogs.contact',['teams' => $teams,'about'=>$contact]);
    }

    public function allBlogs(){
        $blogs= Articles::where("is_published",'on')->where("deleted_status",0)->with('tags','categories','user','pictures')->orderBy("id","DESC")->paginate(6);
        $category=Categories::where("deleted_status",0)->withCount('posts')->get();
        $tags=Tags::where('deleted_status',0)->get();
        $recents = Articles::where("deleted_status", 0)->with("user","tags","categories","pictures")->orderBy('id', "DESC")->take(3)->get();
        return view('front.blogs.all',['blogs' => $blogs,'categories'=>$category,'recents'=>$recents,'tags'=>$tags]);
    }

    public function withCategoryOf($id){
        $blogs= Articles::where("is_published",'on')->where("deleted_status",0)->with('tags','categories','user','pictures')->where('categorie_id',$id)->orderBy("id","DESC")->paginate(2);
        $category=Categories::where("deleted_status",0)->withCount('posts')->get();
        $tags=Tags::where('deleted_status',0)->get();
        $recents = Articles::where("deleted_status", 0)->with("user","tags","categories","pictures")->orderBy('id', "DESC")->take(3)->get();
        return view('front.blogs.sameCat',['blogs' => $blogs,'categories'=>$category,'recents'=>$recents,'tags'=>$tags]);
    }

    public function withTagOf($id){
        $blogs= Articles::where("is_published",'on')->where("deleted_status",0)->with('tags','categories','user','pictures')->whereHas('tags', function ($query) use ($id) {
            $query->where('tags', $id);
        })->orderBy("id","DESC")->paginate(2);
        $category=Categories::where("deleted_status",0)->withCount('posts')->get();
        $tags=Tags::where('deleted_status',0)->get();
        $recents = Articles::where("deleted_status", 0)->with("user","tags","categories","pictures")->orderBy('id', "DESC")->take(3)->get();
        return view('front.blogs.sameTag',['blogs' => $blogs,'categories'=>$category,'recents'=>$recents,'tags'=>$tags]);
    }

    public function liveStream(){
        $contact=AdressLocation::first();
        $lives= Live::where("is_live",1)->where("deleted_status",0)->first();
            return view('front.blogs.liveStream',['lives' => $lives,'about'=>$contact]);
    }

    public function show($id){
        $contact=AdressLocation::first();
        $previous = Articles::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = Articles::where('id', '>', $id)->orderBy('id', 'asc')->first();
        $blogs= Articles::where('id',$id)->where("is_published",'on')->with('tags','categories','user','pictures')->orderBy("id","DESC")->first();
        $category=Categories::where("deleted_status",0)->withCount('posts')->get();
        $recents = Articles::where("deleted_status", 0)->with("user","tags","categories","pictures")->orderBy('id', "DESC")->take(3)->get();
        $tags=Tags::where('deleted_status',0)->get();
        return view('front.blogs.single',['blog' => $blogs,'categories'=>$category,'recents'=>$recents,'tags'=>$tags,'about'=>$contact,'previous'=>$previous,'next'=>$next]);
    }

    public function productList(Request $request)
    {
        $productCategories = Category::all();
        $query = Product::with('category');

        if ($request->filled('category')) {
            if ($request->category > 0) {
                $query->where('category_id',$request->category);
            }
        }

        if ($request->filled('name')) {
            $query->where('name','LIKE',"%$request->name%");
        }

        $products = $query->orderBy('name','ASC')->get();

        if ($request->ajax()) {
            $newProductList = view('front.product.product-card',compact('products'))->render();

            return response()->json(['newProductList' => $newProductList]);
        }
        session()->put('cart', []);

        return view('front.product.list',['products' =>$products,'categories' => $productCategories]);

    }

    public function cartList()
    {
        $cart = session()->get('cart');
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('front.product.cart', ['cart' => $cart, 'total' => $total]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => 'Product added to cart successfully!','count' => count(session()->get('cart'))]);
    }

    public function checkoutCart(Request $request)
    {
        $cart = session()->get('cart');
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Validate customer info
        // $request->validate([
        //     'customer_name' => 'required|string|max:255',
        //     'customer_email' => 'required|email|max:255',
        //     'customer_phone' => 'nullable|string|max:50',
        //     'customer_address' => 'nullable|string|max:255',
        // ]);

        $orderDetails = [
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'cart_items' => $cart
        ];

        // dd($orderDetails);

        try {
            // Send email
            Mail::to(env('MAIL_FROM_ADDRESS', 'guytresor1811@gmail.com'))
                ->send(new OrderConfirmation($orderDetails));

            session()->put('cart', []); // Clear the cart after checkout
            echo json_encode(['success' => true,'messages' => 'Checkout completed successfully!']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false,'messages' => $e->getMessage()]);
        }
    }

}
