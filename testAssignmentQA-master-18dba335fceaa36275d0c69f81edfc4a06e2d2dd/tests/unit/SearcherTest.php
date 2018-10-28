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
    /**
     * Test case for searching via several platforms
     * 
     * IMPORTANT NOTE:
     * Should cover succeeded and failed suites
     *
     * @return void
     */

    private $platform;
    private $name;
    private $name2;

    protected $project;

    public function _before()
    {

        $this->project = new components\Searcher();
    }


    public function testSearcher()
    {
        /**
         * @todo IMPLEMENT THIS
         */


        $this->platform = "gihub";
        $this ->name = "marinakostenko";
        $this ->name2 = "frog";
        $this -> expectException(\Error::class); ///функция возвращает ошибку  Call to a member function findUserInfo() on string
                                                /// findUserInfo(string $userName) должен принимать стоку, но при вызове метода $user = $platform->findUserInfo($userName) появляется сообщение об ошибке
                                                /// при чем, если изменить в самой функции search() $userName на "username" ошибка не возникнет
        $response = $this->project->search([$this->platform], [$this ->name, $this->name2]);
        $this -> assertEquals([], $response);

    }

    public function testSearcherEmptyArrays()
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $response = $this->project->search([], []);
        $this -> assertEmpty($response);
    }

}