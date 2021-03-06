<?php

namespace CodeDelivery\Transformers;

use Illuminate\Database\Eloquent\Collection;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['cupom','items','client','deliveryman'];

    /**
     * Transform the \Order entity
     * @param Order $model
     *
     * @return array
     */
    public function transform(Order $model) {
        return [
            'id'            => (int)$model->id,
            'total'         => (float) $model->total,
            'product_names' => $this->getArrayProductNames($model->items),
            'qtd'           => $this->getTotalItems($model->items),
            'status'        => $model->status,
            'hash'          => $model->hash,
            'created_at'    => $model->created_at
        ];
    }

    protected function getArrayProductNames(Collection $items)
    {
        $names = [];
        foreach ($items as $item){
            $names[] = $item->product->name;
        }
        return $names;
    }

    protected function getTotalItems(Collection $items)
    {
        $qtd = 0;
        foreach ($items as $item){
            $qtd += $item->qtd;
        }
        return $qtd;
    }

    public function includeCupom(Order $model)
    {
        if (!$model->cupom){
            return null;
        }
        return $this->item($model->cupom, new CupomTransformer());
    }

    public function includeItems(Order $model)
    {
        return $this->collection($model->items, new OrderItemTransformer());
    }

    public function includeClient(Order $model)
    {
        return $this->item($model->client, new ClientTransformer());
    }

    public function includeDeliveryman(Order $model)
    {
        if (!$model->deliveryman){
            return null;
        }
        return $this->item($model->deliveryman, new DeliverymanTransformer());
    }

}