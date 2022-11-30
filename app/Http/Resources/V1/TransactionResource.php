<?php

namespace App\Http\Resources\V1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'type'          => $this->type,
            'productId'     => $this->product_id,
            'userId'        => $this->user_id,
            'purchasePrice' => $this->purchase_price,
            'salesPrice'    => $this->sales_price,
            'quantity'      => $this->quantity,
            'discount'      => $this->discount,
            'createdAt'     => $this->created_at,
        ];
    }
}
