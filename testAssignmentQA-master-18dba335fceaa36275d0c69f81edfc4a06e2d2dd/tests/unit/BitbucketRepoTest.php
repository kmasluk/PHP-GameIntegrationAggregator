<?php

namespace tests;

use app\components\platforms\Bitbucket;
use app\models;

/**
 * BitbucketRepoTest contains test casess for bitbucket repo model
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class BitbucketRepoTest extends \Codeception\Test\Unit
{
    private $name;
    private $forkCount;
    private $watcherCount;

    private $project;
    private $raiting;
    private $starCount;
    private $stringify;




    public function _before()
    {
        $this->name = "kf-cli";
        $this->forkCount = 0;
        $this->watcherCount = 2;
        $this->raiting = 1;
        $this->starCount = 0;
        $this->stringify = "kf-cli                                                                         0 ⇅           2 👁️";

        $this->project = new models\BitbucketRepo($this->name, $this->forkCount, $this->watcherCount);
    }

    public function testProjectClassIsFound()
    {
        $this->assertInstanceOf(models\BitbucketRepo::class, $this->project);
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
        $this->assertEquals($this->stringify, $this->project->__toString());
    }

    // +-
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
     * Test case for repo model getStarCount() verification
     *
     * @return void
     */
    // +
    public function testgetStarCount()
    {
        $this->assertEquals($this->starCount, $this->project->getStarCount());
    }

    /**
     * Test case for repo model getForkCount() verification
     *
     * @return void
     */
    // +
    public function testgetWatcherCount()
    {
        $this->assertEquals($this->watcherCount, $this->project->getWatcherCount());
    }

}

// result +6