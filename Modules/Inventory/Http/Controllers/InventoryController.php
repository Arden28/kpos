<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Inventory\Interfaces\CategoryInterface;
use Modules\Inventory\Interfaces\ProductInterface;
use Modules\People\DataTables\SuppliersDataTable;

class InventoryController extends Controller
{
    protected $productRepository;

    protected $categoryRepository;


    public function __construct(CategoryInterface $categoryRepository, ProductInterface $productRepository){

        $this->productRepository = $productRepository;

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = $this->productRepository->getProducts(Auth::user()->currentCompany->id);

        $categories = $this->categoryRepository->getCategories(Auth::user()->currentCompany->id);

        return view('inventory::index', compact('products', 'categories'));
    }

    // Supplier Inventory
    public function supplier(SuppliersDataTable $dataTable) {

        return $dataTable->render('inventory::suppliers.index');
    }

}
