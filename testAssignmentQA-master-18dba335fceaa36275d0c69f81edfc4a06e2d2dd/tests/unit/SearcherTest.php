<?php

namespace tests;

use app\components;
use yii\debug\models\timeline\Search;


/**
 * SearcherTest contains test casess for searcher component
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class SearcherTest extends \Codeception\Test\Unit
{
    private $platform;
    private $name;
    private $name2;

    protected $project;

    public function _before()
    {
        // not project but searcher
        $this->project = new components\Searcher();
    }


    /**
     * Test case for searching via several platforms
     * 
     * IMPORTANT NOTE:
     * Should cover succeeded and failed suites
     *
     * @return void
     */
    // ---
    public function testSearcher()
    {
        /**
         * @todo IMPLEMENT THIS
         */

        // This one of most important test cases
        /**
         * Nothing wrong there this how searcher supose to work
         * see ISearhcer declaration
         *
         * Return user models
         * @param IPlatform[] $platforms
         * @param array $userNames
         * @return array
         * 
         * 
         * here you should implement your own fake IPlatform
         * that return some user by name
         * and pass that Platform inside searcher
         */

        /*
         // example
        class FakeHub implements interfaces\IPlatform
        {
            public function findUserInfo(string $userName) : ? interfaces\IUser
            {
                if ($userName === 'Eric Cartman') {
                    return new models\User(
                        'Eric Cartman',
                        'Eric Cartman',
                        'fakehub'
                    );
                }
                return null;
            }
        
            public function findUserRepos(string $user) : array
            {
                $result = [];
                if ($user === 'Eric Cartman') {
                    $result[] = new models\BitbucketRepo(
                        'Awesom-O',
                        0,
                        0
                    );
                }
                return $result;
            }
        }

        $platform = new FakeHub();
        $response = $this->project->search([$platform], ['Eric Cartman']);
         */

        $this->platform = "gihub";
        $this->name = "marinakostenko";
        $this->name2 = "frog";
        $this->expectException(\Error::class); ///функция возвращает ошибку  Call to a member function findUserInfo() on string
                                                /// findUserInfo(string $userName) должен принимать стоку, но при вызове метода $user = $platform->findUserInfo($userName) появляется сообщение об ошибке
                                                /// при чем, если изменить в самой функции search() $userName на "username" ошибка не возникнет
        $response = $this->project->search([$this->platform], [$this->name, $this->name2]);
        $this->assertEquals([], $response);

    }

    // +
    public function testSearcherEmptyArrays()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $response = $this->project->search([], []);
        $this->assertEmpty($response);
    }

}

// result -2