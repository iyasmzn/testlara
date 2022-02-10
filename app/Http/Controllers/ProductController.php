<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
        $this->model = new Product();
    }
    public function index()
    {
        $datas =  $this->model->all();

        foreach ($datas as $i => $item) {
            $datas[$i]['category'] = $this->getCategoryData($item['id_category']);
            $datas[$i]['product_detail'] = $this->getProductDetailData($item['id_product_detail']);
        }
        return $datas;
    }
    public function sort()
    {
        return $this->model->orderBy('sku_product')->get();
    }
    public function groupBy()
    {
        $datas = $this->model->all();
        $collect = collect($datas);
        $group = $collect->groupBy('id_category');
        return $group->all();
    }
    private function getCategoryData($id_category)
    {
        return Category::find($id_category);        
    }
    private function getProductDetailData($id_product)
    {
        return ProductDetail::find($id_product);        
    }
}
