<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (int)$this->id,
            'category_name' => $this->category->name,
            'amount' => config('app.currency_symbol').' '.number_format($this->amount/100,2),
            'transaction_date' => $this->transaction_date->format('d, M Y'),
            'description' => $this->description,
            'created_at' => $this->created_at->format('d, M Y h:iA'),
        ];
    }
}
