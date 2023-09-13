<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        return new Product([
           'name'     => $row[0],
           'article'    => $row[1],
           'price' => $row[2],
           'old_price' => $row[3],
           'brand' => $row[6],
           'category_id' => $row[7],
           'product_photo' => $row[8],
           'description' => $row[9],
           'seller_id' => $row[10],
        ]);
    }
}
