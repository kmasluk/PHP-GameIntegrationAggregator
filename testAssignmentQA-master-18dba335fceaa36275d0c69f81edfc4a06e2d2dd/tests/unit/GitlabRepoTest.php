<?php

namespace tests;

use app\models;

/**
 * GitlabRepoTest contains test casess for gitlab repo model
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class GitlabRepoTest extends \Codeception\Test\Unit
{
    /**
     * Test case for counting repo rating
     *
     * @return void
     */

    private $name;
    private $forkCount;
    private $startCount;

    private $project;
    private $raiting;
    private $stringify;
    private $watcherCount;


    public function _before()
    {
        $this->name = "kf-cli";
        $this->forkCount = 0;
        $this->startCount = 2;
        $this->raiting = 0.5;
        $this->stringify = "kf-cli                                                                         0 ⇅    2 ★";

        $this->project = new models\GitlabRepo($this -> name, $this ->forkCount, $this ->startCount);
    }

    public function testProjectClassIsFound()
    {
        $this->assertInstanceOf(models\GitlabRepo::class, $this->project);
    }

    public function testRatingCount()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this -> assertEquals( $this ->raiting , $this ->project->getRating());

    }

    /**
     * Test case for repo model data serialization
     *
     * @return void
     */
    public function testData()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this ->assertEquals(
            [   'name' => $this->name,
                'fork-count' => $this->forkCount,
                'start-count' => $this->startCount,
                'rating' => $this->raiting], $this ->project ->getData());
    }

    /**
     * Test case for repo model __toString verification
     *
     * @return void
     */
    public function testStringify()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this -> assertEquals($this->stringify, $this ->project ->__toString());
    }
    public function testgetName()
    {
        $this -> assertEquals( $this-> name, $this ->project->getName());
        $name1 = null;
        $this ->assertNull($name1, $this ->project ->getName());
    }
    /**
     * Test case for repo model getForkCount() verification
     *
     * @return void
     */

    public function testgetForkCount()
    {
        $this -> assertEquals($this-> forkCount, $this ->project->getForkCount());
    }

    /**
     * Test case for repo model getStarCount() verification
     *
     * @return void
     */

    public function testgetStarCount()
    {
        $this -> assertEquals( $this-> startCount, $this ->project->getStarCount());
    }

    /**
     * Test case for repo model getForkCount() verification
     *
     * @return void
     */

    public function testgetWatcherCount()
    {
        $this -> assertEquals( $this-> watcherCount, $this ->project->getWatcherCount());
    }


}