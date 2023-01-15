<?php

namespace App\Repositories;

interface PaymentRepository
{
    /**
     * Create a charge
     * @param array $data
     * @return array
     */
    public function createCharge($data);

    /**
     * Retrieve a charge
     * @param  array $data
     * @return array
     */
    public function retrieveCharge($data);
}
