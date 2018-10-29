<?php

namespace tests;

use app\components\platforms\Gitlab;
use app\models;


/**
 * GithubRepoTest contains test casess for github repo model
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class GithubRepoTest extends \Codeception\Test\Unit
{
    private $name;
    private $forkCount;
    private $startCount;
    private $watcherCount;

    private $project;
    private $raiting;




    public function _before()
    {
        $this->name = "kf-cli";
        $this->forkCount = 0;
        $this->startCount = 2;
        $this->watcherCount = 2;
        $this->raiting = 1;
        $this->stringy = "kf-cli                                                                         0 ⇅    2 ★    2 👁️";

        $this->project = new models\GithubRepo($this->name, $this->forkCount, $this->startCount, $this->watcherCount);
    }

    public function testProjectClassIsFound()
    {
        $this->assertInstanceOf(models\GithubRepo::class, $this->project);
        $this->assertNotInstanceOf(Gitlab::class, $this->project);
    }

    /**
     * Test case for counting repo rating
     *
     * @return void
     */
    // +
    public function testRatingCount()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this->assertEquals($this->raiting, $this->project->getRating());
    }

    /**
     * Test case for repo model data serialization
     *
     * @return void
     */
    // +
    public function testData()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this->assertEquals(
            [
                'name' => $this->name,
                'fork-count' => $this->forkCount,
                'start-count' => $this->startCount,
                'watcher-count' => $this->watcherCount,
                'rating' => $this->raiting,
            ],
            $this->project->getData()
        );

    }

    /**
     * Test case for repo model __toString verification
     *
     * @return void
     */
    // +
    public function testStringify()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $this->assertEquals($this->stringy, $this->project->__toString());
    }

    // -+
    public function testgetName()
    {
        // it's okay
        $this->assertEquals($this->name, $this->project->getName());
        // why do this?
        // if getName already equals name
        // this is redundant
        $name1 = null;
        $this->assertNull($name1, $this->project->getName());
    }

    /**
     * Test case for repo model getForkCount() verification
     *
     * @return void
     */
    // +
    public function testgetForkCount()
    {
        $this->assertEquals($this->forkCount, $this->project->getForkCount());
    }

    /**
     * Test case for repo model getWatcherCount() verification
     *
     * @return void
     */
    // +
    public function testgetWatcherCount()
    {
        $this->assertEquals($this->watcherCount, $this->project->getWatcherCount());
    }

    /**
     * Test case for repo model getStarCount() verification
     *
     * @return void
     */
    // +
    public function testgetStarCount()
    {
        $this->assertEquals($this->startCount, $this->project->getStarCount());
    }
}

// result +6