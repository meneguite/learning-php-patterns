<?php
namespace App;


class CustomerIsGoldTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function a_customer_is_gold_if_they_have_the_respective_type()
    {
        $spec = new CustomerIsGold;

        $goldCustomer = new Customer('gold');
        $this->assertTrue( $spec->isSatisfiedBy($goldCustomer) );


        $silverCustomer = new Customer('silver');
        $this->assertFalse( $spec->isSatisfiedBy($silverCustomer) );
    }

}