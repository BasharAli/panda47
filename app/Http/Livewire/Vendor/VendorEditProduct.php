<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\SubCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Taxes;




class VendorEditProduct extends Component
{
    use WithFileUploads;

    public $slug;
    public $name;
    public $product_slug;
    public $new_product_slug;
    public $normal_price;
    public $sale_price;
    public $category_id;
    public $subcategory_id;
    public $shop_id;
    public $brand_id;
    public $short_description;
    public $full_description;
    public $product_img;
    public $quantity;
    public $stock_status;
    public $featured;
    public $SKU;
    public $newimage;
    public $product_id;
    public $images;
    public $newimages;
    public $pointedproduct;
    public $tax;
    public $final_price;
    public $commision;









    public function mount($slug, $product_slug)
    {
        $this->slug = $slug;
        $this->product_slug = $product_slug;
        $shop = Shop::where('slug' , $this->slug)->first();
        $this->shop_id = $shop->id;
        $product = Product::where('shop_id', $this->shop_id)->where('slug', $this->product_slug)->first();
        $this->new_product_slug = $product->slug; 
        $this->name = $product->name;
        $this->normal_price = $product->normal_price;
        $this->sale_price = $product->sale_price;
        $this->category_id = $product->category_id;
        $this->subcategory_id = $product->subcategory_id;
        $this->shop_id = $product->shop_id;
        $this->brand_id = $product->brand_id;
        $this->short_description = $product->short_description;
        $this->full_description = $product->description;
        $this->product_img = $product->image;
        $this->quantity = $product->quantity;
        $this->product_id = $product->id;
        $this->stock_status =  'instock';
        $this->featured = 0;
        $this->SKU = $product->SKU;
        $this->images = $product->images;
        $this->tax = $product->tax;
        $this->final_price = $product->final_price;
        $this->commision = $product->commision;

    }

    public function generateSlug()
    {
        $this->new_product_slug = Str::slug($this->name, '-');

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


    public function updateProduct()
    {
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->new_product_slug;
        $product->short_description = $this->short_description;
        $product->description = $this->full_description;
        $product->normal_price = $this->normal_price;
        if ($this->sale_price) {
            $product->sale_price = $this->sale_price;
        } else {
            $product->sale_price = Null;
        }
        
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        $product->shop_id = $this->shop_id;
        $product->tax = $this->tax;
        $product->final_price = $this->final_price;
        $product->commision = $this->commision;

        

        if ($this->newimage) {
            $img = Image::make($this->newimage->getRealPath());
            $img->resize(765, 850);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $img->save(public_path('main/images/products/' . $imageName), 90);
            $product->image = $imageName;
        }


        if ($this->newimages) {
            $imagesname = '';
            foreach ($this->newimages as $key => $image) {
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
        $this->calculateFinalPrice();
    
        $this->calculateCommision();
        return view('livewire.vendor.vendor-edit-product', ['shop' => $shop, 'categories' => $categories , 'subCategories' => $subCategories, 'brands' =>$brands, 'taxes'=>$taxes])->layout('layouts.base');
    }
}
