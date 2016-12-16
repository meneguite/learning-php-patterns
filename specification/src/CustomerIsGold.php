<?php
namespace App;


class CustomerIsGold
{
    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->type == 'gold';
    }
}