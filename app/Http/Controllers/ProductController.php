<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
// request validation

use Auth ;
use App\Models\Product;
use App\Models\User;

use SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;





class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);
            //  return $products ;
        return view('products.index' , compact('products'));
    } // index


    public function create()
    {
        return view('products.create') ;
    }  //  create


    public function store(StoreProductRequest $request)
    {
       // image
       //    $path = $request->image->store('public/images/products') ;


    //    $path =  Image::make(($image))->resize(300, 200)->save('public/images/products'.$image)  ;
    //    $image = store('image'.$path) ;


        $product_image = $request->file('image') ;
        $image_gen = hexdec(uniqid()) ;
        $image_extention = strtolower($product_image->getClientOriginalExtension()) ;
        $image_name = $image_gen.'.'.$image_extention ;
        $image_location = 'public/images/products/' ;
        // $product_image->move($image_location , $image_name) ;
         Image::make(($product_image))->resize(300, 200)->save($image_location.$image_name )  ;
        $image = $image_location.$image_name ;


        // store
        Product::create([
                'name' => $request->name ,
                'user_id' => Auth::user()->id ,
                // 'image' => $path ,
                'image' => $image ,
                'price' => $request->price ,
                'category' => $request->category ,
                'type' => $request->type ,
                'sale_price' => $request->sale_price ,
                'description' => $request->description ,
                'quantity' => $request->quantity ,

                ]) ;

            // redirect
            return redirect()->route('products.index')->with('success' , 'Product Inserted Successfully');
    }// store


    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show' ,compact('product'));
    }  // show


    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    } // edit



    public function update(UpdateProductRequest $request , $id)
    {
        $product = Product::find($id);
        //  $path = $request->image->store('public/images/products');

        $old_image = $product->image ;
        $product_image = $request->file('image');

        // if not have request image
        if ($request->file('image')) {


        $product_image = $request->file('image') ;
        $image_gen = hexdec(uniqid()) ;
        $image_extention = strtolower($product_image->getClientOriginalExtension()) ;
        $image_name = $image_gen.'.'.$image_extention ;
        $image_location = 'public/images/products/' ;
        // $product_image->move($image_location , $image_name) ;
         Image::make(($product_image))->resize(300, 200)->save($image_location.$image_name )  ;
        $image = $image_location.$image_name ;



            Product::find($id)->update([

                'name' => $request->name ,
                'user_id' => Auth::user()->id ,
                // 'image' => $old_image ,
                'image' => $image ,
                'price' => $request->price ,
                'category' => $request->category ,
                'type' => $request->type ,
                'sale_price' => $request->sale_price ,
                'description' => $request->description ,
                'quantity' => $request->quantity ,
                ]);

        Unlink(($old_image));

        // return
        return redirect()->route('products.index')->with('success', 'Product updated Successfully');




        // if  have request image
        } else {

              Product::find($id)->update([

            'name' => $request->name ,
            'user_id' => Auth::user()->id ,
            // 'image' => $path ,
            'image' => $product->image ,
            'price' => $request->price ,

            'category' => $request->category ,
            'type' => $request->type ,
            'sale_price' => $request->sale_price ,
            'description' => $request->description ,
            'quantity' => $request->quantity ,
            ]);

        //return
        return redirect()->route('products.index')->with('success', 'Product Inserted Successfully');


 } // update








    //     //  if have image
    //     if ($request->has('image'))
    //     {
    //             $path = $request->image->store('public/images/products');
    //                     // unlink(($old_image)); // i use delete insteade of unlink because im storing img by Storage
    //                     if (Storage::exists($old_image)) :  // delete the image from project to save more space
    //                         Storage::delete(($old_image));
    //                     endif ;
    //     } else {
    //         $path = $product->image ;
    //     }

    //     // updating data
    //         Product::find($id)->update([
    //                 'name' => $request->name ,
    //                 'user_id' => Auth::user()->id ,
    //                 'image' => $path ,
    //                 // 'image' => $image ,
    //                 'price' => $request->price ,
    //                 'category' => $request->category ,
    //                 'type' => $request->type ,
    //                 'sale_price' => $request->sale_price ,
    //                 'description' => $request->description ,
    //                 'quantity' => $request->quantity ,
    //         ]) ;


    //         // return
    //         return redirect()->route('products.index')->with('success' , 'Product updated Successfully');
    } // update





// soft Delete Style

    public function soft_delete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')->with('success' , 'Product Deleted Successfully');

    }// soft_delete



    public function products_trash()
    {
        $products = Product::onlyTrashed()->paginate(5);
        return view('products.products_trash' , compact('products'));

    }// products_trash


    public function products_restore($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return redirect()->route('products.index')->with('success' , 'Product Restored Successfully');

    }// products_restore


    public function destroy($id)
    {
        $product = Product::withTrashed()->find($id);
        $old_image = $product->image ;
        unlink($old_image);

        $product->forceDelete();
        return redirect()->back()->with('success' , 'Product Deleted Successfully');

        // if (Storage::exists($old_image)) : // delete the image from project to save more space
        //     Storage::delete(($old_image));
        // endif ;
    }// destroy
}
