<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
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
            'createdAt'     => formatToEasyToReadShort($this->created_at),
        ];
    }
}
