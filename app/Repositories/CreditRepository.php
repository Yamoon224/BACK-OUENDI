<?php

namespace App\Repositories;

use App\Models\Credit;
use App\Repositories\Contracts\CreditRepositoryInterface;

class CreditRepository extends BaseRepository implements CreditRepositoryInterface
{
    public function __construct(Credit $model)
    {
        parent::__construct($model);
    }

    /**
     * Trouver des crédits en fonction de paramètres spécifiques.
     *
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByParams(array $params)
    {
        $query = $this->model;

        if (isset($params['user_id'])) {
            $query = $query->where('user_id', $params['user_id']);
        }

        if (isset($params['status'])) {
            $query = $query->where('status', $params['status']);
        }

        if (isset($params['min_amount'])) {
            $query = $query->where('amount', '>=', $params['min_amount']);
        }

        if (isset($params['max_amount'])) {
            $query = $query->where('amount', '<=', $params['max_amount']);
        }

        if (isset($params['request_at'])) {
            $query = $query->whereDate('request_at', $params['request_at']);
        }

        return $query->get();
    }
}
