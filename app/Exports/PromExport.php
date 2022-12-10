<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpParser\ErrorHandler\Collecting;

class PromExport implements WithColumnFormatting, WithHeadings, WithMapping, WithTitle, FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'invoices.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/xls',
    ];

    public function title(): string
    {
        return 'Export Products Sheet';
    }

    public function headings(): array
    {
        return [
            'Код_товара',
            'Название_позиции',
            'Поисковые_запросы',
            'Описание',
            'Тип_товара',
            'Цена',
            'Цена от',
            'Ярлык',
            'HTML_заголовок',
            'HTML_описание',
            'HTML_ключевые_слова',
            'Валюта',
            'Скидка',
            'Cрок действия скидки от',
            'Cрок действия скидки до',
            'Единица_измерения',
            'Минимальный_объем_заказа',
            'Оптовая_цена',
            'Минимальный_заказ_опт',
            'Ссылка_изображения',
            'Наличие',
            'Количество',
            'Производитель',
            'Страна_производитель',
            'Номер_группы',
            'Адрес_подраздела',
            'Возможность_поставки',
            'Срок_поставки',
            'Способ_упаковки',
            'Личные_заметки',
            'Продукт_на_сайте',
            'Идентификатор_товара',
            'Уникальный_идентификатор',
            'Идентификатор_подраздела',
            'Идентификатор_группы',
            'Подарки',
            'Сопутствующие',
            'ID_группы_разновидностей',
            'Название_Характеристики',
            'Измерение_Характеристики',
            'Значение_Характеристики',
            'Название_Характеристики',
            'Измерение_Характеристики',
            'Значение_Характеристики'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_NUMBER_00,

        ];
    }

    public function map($invoice): array
    {
        //dd($invoice);

        return [
            $invoice['product_code'],
            $invoice['product_name_ru'],
            $invoice['search_query_ru'],
            $invoice['description_ru'],
            $invoice['product_type'],
            $invoice['retail_price'],
            '',
            '',
            '',
            '',
            '',
            $invoice['currency'],
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            $invoice['images'],
            $invoice['available'],
            $invoice['balance'],
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            $invoice['product_code'],

        ];
    }

    public function collection()
    {
        return Product::all();
    }
}
