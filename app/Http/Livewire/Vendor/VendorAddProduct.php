<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\Shop;
use App\Models\SubCategory;
use App\Models\Taxes;
use App\Rules\GalleryDimensionsRule;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Rules\ImageDimensionsRule;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;





class VendorAddProduct extends Component
{
    use WithFileUploads;

    public $slug;
    public $name;
    public $product_slug;
    public $normal_price;
    public $sale_price;
    public $tax;
    public $final_price;
    public $commision;
    public $category_id;
    public $subCategory_id;
    public $shop_id;
    public $brand_id;
    public $short_description;
    public $full_description;
    public $product_img;
    public $quantity;
    public $stock_status;
    public $featured;
    public $SKU;
    public $images = [];







    public function mount($slug)
    {
        $this->slug = $slug;
        $shop = Shop::where('slug' , $this->slug)->first();
        $this->shop_id = $shop->id;
        $this->stock_status =  'instock';
        $this->featured = 0;
        $this->SKU = 'PND' . rand(1000, 9999)  ;

    }

    public function generateSlug()
    {
        $this->product_slug = Str::slug($this->name, '-');

    }

    public function calculateFinalPrice()
    {
        $price = $this->sale_price ? $this->sale_price : $this->normal_price;
        if ($price) {
            $tax_amout = $price * (intval($this->tax) / 100);
            $this->final_price = round($price + $tax_amout, 2);
        }
        
    }

    public function calculateCommisionPercent()
    {
        $price = $this->sale_price ? $this->sale_price : $this->normal_price;
        if ($price) {
            if ($this->final_price <= 100) {
                $commissionPercent = 0;
            } else if ($this->final_price <= 500) {
                $maxCommissionPercent = 33;
                $minCommissionPercent = 20;
                $commissionPercent = $maxCommissionPercent - (($maxCommissionPercent - $minCommissionPercent) / 400) * ($this->final_price - 100);
            } else if ($this->final_price <= 1000) {
                $maxCommissionPercent = 20;
                $minCommissionPercent = 10;
                $commissionPercent = $maxCommissionPercent - (($maxCommissionPercent - $minCommissionPercent) / 500) * ($this->final_price - 500);
            } else if ($this->final_price <= 2000) {
                $maxCommissionPercent = 10;
                $minCommissionPercent = 7;
                $commissionPercent = $maxCommissionPercent - (($maxCommissionPercent - $minCommissionPercent) / 1000) * ($this->final_price - 1000);
            } else if ($this->final_price <= 3000) {
                $maxCommissionPercent = 7;
                $minCommissionPercent = 5;
                $commissionPercent = $maxCommissionPercent - (($maxCommissionPercent - $minCommissionPercent) / 1000) * ($this->final_price - 2000);
            } else if ($this->final_price <= 5000) {
                $maxCommissionPercent = 5;
                $minCommissionPercent = 4;
                $commissionPercent = $maxCommissionPercent - (($maxCommissionPercent - $minCommissionPercent) / 2000) * ($this->final_price - 3000);
            } else if ($this->final_price <= 9999.9) {
                $commissionPercent = 3.5;
            } else {
                $commissionPercent = 3;
            }
            return $commissionPercent;
        }
        
    
        
    }

    public function calculateCommision()
    {
        if ($this->final_price) {
            $this->commision = round($this->final_price * ($this->calculateCommisionPercent() / 100),2);
 
        }
    }


    // public function updated($field)
    // {
    //     $this->validateOnly($field, [
    //         'product_img' => ['required', 'image', new ImageDimensionsRule()],
    //         'images.*' => ['required', 'image', new GalleryDimensionsRule()],
    //     ]);
    // }

    // public function updatedImages()
    // {
    //     $validator = Validator::make(['images' => $this->images], [
    //         'images.*' => ['required', 'images', new GalleryDimensionsRule()],
    //     ]);
    
    //     if ($validator->fails()) {
    //         $this->reset('images');
    //         $this->addError('images', $validator->errors()->first('images'));
    //     }
    // }



    public function storeProduct()
    {
        // $this->validate([
        //     'product_img' => ['required', 'image', new \App\Rules\ImageDimensionsRule()],
        // ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->product_slug;
        $product->short_description = $this->short_description;
        $product->description = $this->full_description;
        $product->normal_price = $this->normal_price;
        
        if ($this->sale_price) {
            $product->sale_price = $this->sale_price;

        } else {
            $product->sale_price = NULL;

        }

        $product->tax = $this->tax;
        $product->final_price = $this->final_price;
        $product->commision = $this->commision;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subCategory_id;
        $product->brand_id = $this->brand_id;
        $product->shop_id = $this->shop_id;


        $img = Image::make($this->product_img->getRealPath());
        $img->resize(765, 850);
        $imageName = Carbon::now()->timestamp. '.' . $this->product_img->extension();
        $img->save(public_path('main/images/products/' . $imageName), 90);
        $product->image = $imageName;

        if ($this->images) {
            $imagesname = '';
            foreach ($this->images as $key => $image) {
                $imgs = Image::make($image->getRealPath());
                $imgs->resize(765, 850);
                $imgName = Carbon::now()->timestamp. $key. '.' . $image->extension();
                $imgs->save(public_path('main/images/products/' . $imgName), 90);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;
        }

        $product->save();
        return redirect()->route('vendor.products', ['slug' => $this->slug]);

    }
    
    public function render()
    {
        $slug = $this->slug;
        $shop = Shop::where('slug' , $slug)->first();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands  = Brand::all();
        $taxes = Taxes::all();
        $deliveries = Delivery::all();
        $this->calculateFinalPrice();
    
        $this->calculateCommision();

        return view('livewire.vendor.vendor-add-product', ['shop' => $shop, 'categories' => $categories , 'subCategories' => $subCategories, 'brands' =>$brands, 'taxes' => $taxes, 'deliveries' => $deliveries])->layout('layouts.base');
    }
}
