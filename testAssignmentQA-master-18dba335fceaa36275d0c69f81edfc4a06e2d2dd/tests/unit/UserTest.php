<?php

namespace tests;

use app\models;

/**
 * UserTest contains test casess for user model
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class UserTest extends \Codeception\Test\Unit
{
    /**
     * Test case for adding repo models to user model
     * 
     * IMPORTANT NOTE:
     * Should cover succeeded and failed suites
     *
     * @return void
     */
    private $identifier;
    private $name;
    private $platform;
    private $repositories;

    private $project;
    private $totalRaiting;
    private $totalRaitingwrong;

    private $reponame;
    private $forkcount;
    private $startcount;
    private $watchercount;
    private $raiting;

    private $namefalse;
    private $wrongplatform;

    private $repo;

    public function _before()
    {
        $this->identifier = "kfr";
        $this->name = "kfr";
        $this->platform = "github";
        $this->totalRaiting = 0.0;

        $this->repositories = [];

        $this->project = new models\User($this -> identifier, $this ->name, $this ->platform, $this->repositories);
    }

    public function testProjectClassIsFound()
    {

        $this->assertInstanceOf(models\User::class, $this->project);
    }

    public function testAddingRepos()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this -> expectException(\LogicException::class, $this ->project);

        $this -> assertEquals( $this ->repositories, $this ->project->addRepos([$this ->reponame = "new",
            $this ->forkcount = 0,
            $this ->startcount = 0,
            $this ->watchercount =0,
            $this ->raiting =0]));


    }

    /**
     * Test case for counting total user rating
     *
     * @return void
     */
    public function testTotalRatingCount()
    {
        /**
         * @todo IMPLEMENT THIS
         *
         */
        $this -> assertEquals( $this ->totalRaiting, $this ->project->getTotalRating());
        $this -> totalRaitingwrong = 1.7;
        $this -> assertNotEquals($this -> totalRaitingwrong, $this ->project ->getTotalRating());
    }

    /**
     * Test case for user model data serialization
     *
     * @return void
     */
    public function testData()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this ->assertEquals(
            [
                'name' => $this->name,
                'platform' => $this->platform,
                'total-rating' => $this->totalRaiting,
                'repos' => $this ->repositories
            ],
            $this ->project ->getData());

        $this ->assertNotEquals(
            [
                'name' => $this->name = "kkkk",
                'platform' => $this->platform = "kddkd",
                'total-rating' => $this->totalRaiting = 1.1,
                'repos' => $this ->repositories = []
            ],
            $this ->project ->getData());

    }

    /**
     * Test case for user model __toString verification
     *
     * @return void
     */
    public function testStringify()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this -> assertEquals("kfr (github)                                                                                  0 🏆
==================================================================================================\n",
            $this ->project ->__toString());
    }

    public function testgetIdentidier(){
        $this -> assertEquals($this->identifier, $this->project->getIdentifier());
    }
    /**
     * Test case for user model getName() verification
     *
     * @return void
     */
    public function testgetName(){

        $this -> assertEquals($this->name, $this->project->getName());
        $this -> namefalse = "false";
        $this ->assertNotEquals($this ->namefalse, $this->project->getName());
    }
    /**
     * Test case for user model getPlatform() verification
     *
     * @return void
     */
    public function testgetPlatform(){

        $this -> assertEquals($this->platform, $this->project->getPlatform());
        $this -> wrongplatform = "someplatform";
        $this ->assertNotEquals($this ->wrongplatform, $this->project->getPlatform());


    }
    /**
     * Test case for user model getPlatform() verification
     *
     * @return void
     */
    public function getFullName(){

        $this -> assertEquals("{$this->name} ({$this->platform})", $this->project->getFullName());
        $this ->wrongplatform = "someplatform2";
        $this -> namefalse = "noname";
        $this -> assertNotEquals("{$this->namefalse} ({$this->wrongplatform})", $this->project->getFullName());

    }
}