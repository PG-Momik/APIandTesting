<?php

namespace App\Http\Resources\V1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ProductResource extends JsonResource
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
            'name'          => $this->name,
            'purchasePrice' => $this->purchase_price,
            'salesPrice'    => $this->sales_price,
            'discount'      => $this->discount,
            'description'   => $this->description,
            'image'         => $this->image,
            'registeredBy'  => $this->registered_by,
            'categoryId'    => $this->category_id,
            'createdAt'     => formatToEasyToReadShort($this->created_at),
        ];
    }
}
