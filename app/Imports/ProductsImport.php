<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Product;

//use Mavinoo\Batch\Batch;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        $product = new Product;
        $this->data = [];
        $collection->each(function ($item, $key) {
            $this->data[] = [
                'product_code' => $item['kod'],
                'price' => $item['cena'],
                'balance' => is_numeric(mb_substr($item['ost'], 0, 1)) ? (int)$item['ost'] : (int)substr($item['ost'], 1),
                'available' => is_numeric(mb_substr($item['ost'], 0, 1)) ? ((int)$item['ost'] > 3 ? '+' : '-') : ((int)substr($item['ost'], 1) > 3 ? '+' : '-'),
                'unit' => $item['ed']
            ];
        });
        \Batch::update($product, $this->data, 'product_code');
            $koef = 1.3;
        Product::where('auto_price', '=', true )->update(['retail_price'=>\DB::raw('round((price *'.$koef.')::numeric, 2)')]);
        return redirect('/');
    }
}
