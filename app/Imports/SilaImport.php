<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SilaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $this->data = [];
        $collection->each(function ($item, $key) {

            dd($item);
        });
        Product::upsert($this->data, ['product_code']);
    }

}
