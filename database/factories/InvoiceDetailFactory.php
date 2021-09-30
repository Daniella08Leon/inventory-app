<?php

namespace Database\Factories;

use App\Models\InvoiceDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceDetailFactory extends Factory
{
    protected $model = InvoiceDetail::class;

    public function definition()
    {
        return [
            'invoice_id' => random_int(1,5),
            'product_id' => random_int(1,30),
            'price' => random_int(100,10000),
            'quantity'=> random_int(1,5)
        ];
    }
}
