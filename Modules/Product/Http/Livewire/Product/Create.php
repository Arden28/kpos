<?php

namespace Modules\Product\Http\Livewire\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\People\Entities\Supplier;
use Modules\People\Interfaces\SupplierInterface;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Unit;
use Modules\Product\Interfaces\CategoryInterface;
use Illuminate\Support\Str;
use Modules\Upload\Entities\Upload;

class Create extends Component
{
    use WithFileUploads;

    // Product properties
    public $product_name;
    public $can_be_sold = true;
    public $can_be_purchased = true;
    public $can_be_rented = false;
    public $product_type='storable';
    public $product_code;
    public $product_barcode_symbology;
    public $unit_id;
    public $product_quantity;
    public $product_cost;
    public $product_price;
    public $product_stock_alert;
    public $product_order_tax;
    public $product_tax_type;
    public $product_note;
    public $category_id;

    public $document = [];


    // Validation rules with meaningful validation messages
    protected $rules = [
        'product_name' => 'required|string|max:255',
        'can_be_sold' => 'nullable|boolean',
        'can_be_purchased' => 'nullable|boolean',
        'can_be_rented' => 'nullable|boolean',
        'product_type' => 'required|in:storable,consumable,service',
        'product_code' => 'nullable|required_if:product_type,storable|string|max:255',
        'product_barcode_symbology' => 'nullable|required_if:product_type,storable|string|max:255',
        'unit_id' => 'required|integer',
        'product_quantity' => 'nullable|required_if:product_type,storable|integer|min:1',
        'product_cost' => 'nullable|required_if:can_be_purchased,true|numeric|max:2147483647',
        'product_price' => 'nullable|required_if:can_be_sold,true|numeric|max:2147483647',
        'product_stock_alert' => 'nullable|required_if:product_type,storable|integer|min:0',
        'product_order_tax' => 'nullable|integer|min:0|max:100',
        'product_tax_type' => 'nullable|integer',
        'product_note' => 'nullable|string|max:1000',
        'category_id' => 'required|integer'
    ];


    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function saveProduct(){

        $validatedData = $this->validate();

        // Set default values for properties if they are empty
        if (empty($validatedData['product_code'])) {
            $validatedData['product_code'] = Str::slug($validatedData['product_name']) . '23';
        }

        if (empty($validatedData['product_quantity'])) {
            $validatedData['product_quantity'] = 1;
        }

        if (empty($validatedData['product_stock_alert'])) {
            $validatedData['product_stock_alert'] = 1;
        }

        // Save the product using mass-assignment
        $company = Auth::user()->currentCompany;

        $productData = array_merge($validatedData, ['company_id' => $company->id]);

        $product = Product::create($productData);
        $product->save();

        // dd($this->document);
        if ($this->document) {
            foreach ($this->document as $file) {
                $filename = now()->timestamp . '.' . $file->getClientOriginalExtension();

                $image = Image::make($file)->encode($file->getClientOriginalExtension());

                $folder = 'products/' . $product->id; // Set the folder path based on your needs
                Storage::disk('public')->put($folder . '/' . $filename, $image);

                // Associate the media with the product
                $product->addMedia(storage_path('app/public/' . $folder . '/' . $filename))
                    ->toMediaCollection('images');
            }

            // Reset the document property
            $this->document = [];

            // Emit an event if needed
            $this->emit('filesUploaded');
        }
        // Redirect to the desired route after product creation
        return redirect()->route('products.index');



    }


    public function updatedSelectedImages()
    {
        foreach ($this->document as $image) {
            $this->storeMedia($image);
        }

        $this->document = []; // Clear selected images
    }

    public function render()
    {
        abort_if(Gate::denies('create_products'), 403);

        $company = Auth::user()->currentCompany->id;
        $categories = Category::isCompany($company)->get();
        $suppliers = Supplier::isCompany($company)->get();
        $units = Unit::Company($company)->get();

        return view('product::livewire.product.create', compact('categories', 'suppliers', 'units'));
    }


    public function openFileInput()
    {
        // Trigger the hidden input element
        $this->dispatchBrowserEvent('clickFileInput');
    }

}
