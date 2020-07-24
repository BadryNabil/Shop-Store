<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Client;
use Str;

class MainControllers extends Controller
{
   
    public function register(Request $request)
    {
      $validator=validator()->make($request->all(),
      [
        'name'               =>'required',
        'password'           =>'required|confirmed',
        'email'              =>'required|unique:clients',
        'phone'              =>'required',

      ]);
      if ($validator->fails())
      {
        return responseJson(0,$validator->errors()->first(),$validator->errors());
      }
      $request->merge(['password'=>bcrypt($request->password)]);
      $clients=Client::create($request->all());
      $clients->api_token=Str::random(60);
      $clients->save();
      return responseJson(1,'تم الاضافه بنجاح',
      [
         'api_token'=>$clients->api_token,
         'Client'=>$clients,
      ]);

    }

/**************************LOGIN****************************/
    public function login(Request $request)
    {
      $validator=validator()->make($request->all(),
      [
        'phone'              =>'required',
        'password'           =>'required',

      ]);

      if ($validator->fails())
      {
        return responseJson(0,$validator->errors()->first(),$validator->errors());
      }

      $client=Client::where('phone',$request->phone)->first();
      if($client)
      {
        if (Hash::check($request->password,$client->password))
         {
              return responseJson(1,'تم تسجيل الدخول',
            [
              'api_token'=>$client->api_token,
              'Client'   =>$client
            ]);
        }
        else {
            return responseJson(0,'بياناتك غير صحيحه');
        }
      }
      else {
          return responseJson(0,'بياناتك غير صحيحه');
      }

    }
   public function categories()
   {
     $categories =Category::all();
     return responseJson(1,'success',$categories);
   }
   /*************************************************/
   public function products(Request $request )
    {
      $products =Product::where(function($query) use ($request)
      {
        if($request->has('category_id'))
        {
          $query->where('category_id',$request->category_id);
        }
      })->get();
      return responseJson(1,'success',$products);
    }
/********************************************************/
     public function FavouritesProduct(Request $request)
   {
     $validator=validator()->make($request->all(),[
       'product_id' => 'required|exists:products,id',
     ]);
     if ($validator->fails())
     {
        return responseJson(0, $validator->errors()->first(), $validator->errors());
      }
        $toggle =$request->user()->products()->toggle($request->product_id);
        dd(toggle);
         return responseJson(1,'success',$toggle);
   }
    /****************************************/
   public function myFavouritesProduct(Request $request)
   {
    $products =$request->user()->products()->with('category')->get()->all();
     return responseJson(1,'success',$products);
   }
     
}
