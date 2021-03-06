<?php

namespace tests;

use app\components;

/**
 * FactoryTest contains test casess for factory component
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class FactoryTest extends \Codeception\Test\Unit
{
    /**
     * Test case for creating platform component
     * 
     * IMPORTANT NOTE:
     * Should cover succeeded and failed suites
     *
     * @return void
     */
    private $name;


    protected function _inject(components\Factory $name)
    {
        $this ->name = $name;
    }

    public function testCreateEmptyObj()
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $obj = (object)[];
        $this -> expectException(\LogicException::class);
        $this ->assertEquals($obj, $this ->name ->create(" ") );

    }
    public function testCreate()
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $obj = new components\platforms\Gitlab([]);
        $this ->assertEquals($obj, $this ->name->create('gitlab'));

    }
    public function testCreateWrongModel()
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $obj = new components\platforms\Gitlab([]);
        $this ->assertNotEquals($obj, $this ->name->create('github'));
    }

    public function testCreateNotExistModel()
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $obj = new components\platforms\Github([]);
        $this -> expectException(\LogicException::class);
        $this ->assertEquals($obj, $this ->name->create('githubhub'));
    }

}