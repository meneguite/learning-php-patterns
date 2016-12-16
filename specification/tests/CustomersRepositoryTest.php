<?php
namespace App;


class CustomersRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CustomersRepository
     */
    protected $customers;

    public function setUp()
    {
        $this->customers = new CustomersRepository([
            new Customer('gold'),
            new Customer('silver'),
            new Customer('bronze'),
            new Customer('gold'),
            new Customer('silver')
        ]);
    }

    /** @test */
    public function it_fetches_all_customer()
    {
        $results = $this->customers->all();
        $this->assertCount(5, $results);
    }

    /** @test */
    public function it_fetches_all_customers_who_match_a_given_specification()
    {
        $results = $this->customers->matchesSpecification(new CustomerIsGold());

        $this->assertCount(2, $results);
    }

}