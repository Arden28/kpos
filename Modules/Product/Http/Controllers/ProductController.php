<?php

namespace Modules\Product\Http\Controllers;

use App\Traits\CompanySession;
use Modules\Product\DataTables\ProductDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Modules\People\Interfaces\SupplierInterface;
use Modules\Product\Interfaces\CategoryInterface;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Unit;
use Modules\Product\Http\Requests\StoreProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Upload\Entities\Upload;

class ProductController extends Controller
{
    // use CompanySession;

    protected $categoryRepository;
    protected $supplierRepository;


    public function __construct(CategoryInterface $categoryRepository, SupplierInterface $supplierRepository){

        $this->categoryRepository = $categoryRepository;
        $this->supplierRepository = $supplierRepository;
    }

    public function index(ProductDataTable $dataTable) {
        abort_if(Gate::denies('access_products'), 403);

        return $dataTable->render('product::products.index');
    }


    public function create() {
        abort_if(Gate::denies('create_products'), 403);

        $company = Auth::user()->currentCompany->id;
        $categories = $this->categoryRepository->getCategories($company);
        $suppliers = $this->supplierRepository->getSuppliers($company);
        $units = Unit::Company($company)->get();

        return view('product::products.create', compact('categories', 'suppliers', 'units'));
    }


    public function store(StoreProductRequest $request) {
        $product = Product::create($request->except('document'));

        if ($request->has('document')) {
            foreach ($request->input('document', []) as $file) {
                $product->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('images');
            }
        }

        toast('Le produit a été ajouté !', 'success');

        return redirect()->route('products.index');
    }


    public function show(Product $product) {
        abort_if(Gate::denies('show_products'), 403);

        return view('product::products.show', compact('product'));
    }


    public function edit(Product $product) {
        abort_if(Gate::denies('edit_products'), 403);

        $company = Auth::user()->currentCompany->id;
        $categories = $this->categoryRepository->getCategories($company);
        $units = Unit::Company($company)->get();
        return view('product::products.edit', compact('product', 'categories', 'units'));
    }


    public function update(UpdateProductRequest $request, Product $product) {
        $product->update($request->except('document'));

        if ($request->has('document')) {
            if (count($product->getMedia('images')) > 0) {
                foreach ($product->getMedia('images') as $media) {
                    if (!in_array($media->file_name, $request->input('document', []))) {
                        $media->delete();
                    }
                }
            }

            $media = $product->getMedia('images')->pluck('file_name')->toArray();

            foreach ($request->input('document', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $product->addMedia(Storage::path('temp/dropzone/' . $file))->toMediaCollection('images');
                }
            }
        }

        toast('Le produit a été modifié !', 'info');

        return redirect()->route('products.index');
    }


    public function destroy(Product $product) {
        abort_if(Gate::denies('delete_products'), 403);

        $product->delete();

        toast('Le produit a été supprimé !', 'warning');

        return redirect()->route('products.index');
    }
}
