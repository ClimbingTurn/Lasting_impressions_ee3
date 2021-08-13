<?php

namespace CT_lasting_impressions\Tests;

require_once 'constants.php';
require_once PATH_MOD ."channel/mod.channel.php";
require_once(PATH_ADDONS . 'lasting_impressions/mod.lasting_impressions.php');
// use ExpressionEngine\Addons\Channel;
use PHPUnit\Framework\TestCase;

//use CT_Lasting_impressions\Lasting_impressions;

/*
 * n.b. make sure to prepend the parent class with a slash!
 */
class Lasting_impressionsTest extends TestCase {

    protected $li_mock;

    public function setUp() : void {
        $li_mock = \Mockery::mock(\ClimbingTurn\LastingImpressions::class);
        $li_mock->makePartial();
        $li_mock->shouldReceive('form');
        // $li_mock->shouldReceive()

        $this->li_mock = $li_mock;

        // $this->li_mock = $this->getMockBuilder('Lasting_impressions')
        //         ->disableOriginalConstructor()
        //         ->setMethods(array(
        //             'get_cookie',
        //             'is_enabled',
        //             'get_entry_id',
        //             'setExpires',
        //             'set_cookie',
        //             'get_template_params',
        //             'return_no_results',
        //             'return_error'
        //         ))
        //         ->getMock();
        // $this->li_mock->expects($this->any())
        //         ->method('get_cookie')
        //         ->will($this->returnValue('345|567|784|123'));
    }

    public function testForm() 
    {
        $this->assertIsArray( $this->li_mock->form() );
    }

    // public function testImpressionCountGreaterThanZero() {
    //     $num = $this->li_mock->count();
    //     $this->assertGreaterThan(0, $num);
    // }

    // public function testRemoveItemFromCookie() {
    //     $this->li_mock->expects($this->once())
    //             ->method('get_entry_id')
    //             ->will($this->returnValue('567'));

    //     $cookie = $this->li_mock->remove_item_from_cookie();
    //     $cookie_array = explode('|', $cookie);
    //     $this->assertEquals(3, count($cookie_array));
    // }

    // public function testEntriesHasNoException() {
    //     $this->setExpectations();
    //     $obj = $this->li_mock->entries();
    // }

    // private function setExpectations() {
    //     $this->li_mock->expects($this->any())
    //             ->method('is_enabled')
    //             ->will($this->returnValue('y'));

    //     $this->li_mock->expects($this->any())
    //             ->method('get_template_params')
    //             ->will($this->returnValueMap(
    //                             array(
    //                                 'channel' => 'shop_products',
    //                                 'status' => 'open'
    //                             )
    //     ));
    // }

}
