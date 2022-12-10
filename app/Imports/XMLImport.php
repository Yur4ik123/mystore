<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class XMLImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        dd($collection);
    }

    public function import($file_path)
    {

        $xml = simplexml_load_string(file_get_contents($file_path), "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        $products = $array['shop']['offers']['offer'];
        $this->data = [];
        foreach ($products as $item) {
            try{
                $this->data[] = [
                    'product_code' =>trim(explode(':', explode(';', $item['description'])[0])[1])  ,
                    'images' => $item['picture']
                ];
            }catch (\Throwable $t){
               continue;
            }
        }
        $product = new Product;
        \Batch::update($product, $this->data, 'product_code');


    }
}
