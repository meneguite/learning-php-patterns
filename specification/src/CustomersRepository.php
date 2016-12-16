<?php
namespace App;


class CustomersRepository
{
    protected $customers;

    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }

    public function matchesSpecification(CustomerIsGold $spec)
    {
        $matches = [];
        foreach ($this->customers as $customer) {
            if ($spec->isSatisfiedBy($customer)) {
                $matches[] = $customer;
            }
        }
        return $matches;
    }

    public function all()
    {
        return $this->customers;
    }
}