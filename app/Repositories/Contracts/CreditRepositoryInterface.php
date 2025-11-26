<?php

namespace App\Repositories\Contracts;

interface CreditRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Trouver des crédits en fonction de paramètres spécifiques.
     *
     * @param array $params
     * @return mixed
     */
    public function findByParams(array $params);
}
