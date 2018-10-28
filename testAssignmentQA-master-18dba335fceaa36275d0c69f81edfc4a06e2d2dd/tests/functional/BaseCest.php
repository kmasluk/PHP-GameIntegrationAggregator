<?php

/**
 * Base contains test cases for tesing api endpoint 
 * 
 * @see https://codeception.com/docs/modules/Yii2
 * 
 * IMPORTANT NOTE:
 * All test cases down below must be implemented
 * You can add new test cases on your own
 * If they could be helpful in any form
 */
class BaseCest
{
    /**
     * Example test case
     *
     * @return void
     */
    public function cestExamle(\FunctionalTester $I)
    {
        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr',
            ],
            'platforms' => [
                'github',
            ]
        ]);
        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            }
        ]');
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); //200
    }

    /**
     * Test case for api with bad request params
     *
     * @return void
     */
    public function cestBadParams(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $I->amOnPage([
            'base/api',
            'users' => [ ],
            'platforms' => [ ]
        ]);

        $I->seeResponseCodeIs(400);

    }

    /**
     * Test case for api with empty user list
     *
     * @return void
     */
    public function cestEmptyUsers(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $I->amOnPage([
            'base/api',
            'users' => [
            ],
            'platforms' => [
                'gitlab',
            ]
        ]);
        $expected = "<pre>Bad Request: Missing required parameters: users</pre>";
        $I ->assertEquals($expected, $I ->grabPageSource());
        $I->seeResponseCodeIs(400);
    }

    /**
     * Test case for api with empty platform list
     *
     * @return void
     */
    public function cestEmptyPlatforms(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr'
            ],
            'platforms' => [
            ]
        ]);
        $expected = "<pre>Bad Request: Missing required parameters: platforms</pre>";
        $I ->assertEquals($expected, $I ->grabPageSource());
        $I->seeResponseCodeIs(400);
    }

    /**
     * Test case for api with non empty platform list
     *
     * @return void
     */
    public function cestSeveralPlatforms(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         */
        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr'
            ],
            'platforms' => [
                'gitlab',
                'github'
            ]
        ]);
        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            }
        ]');
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
        $I->seeResponseCodeIs(200);

    }

    /**
     * Test case for api with non empty user list
     *
     * @return void
     */
    public function cestSeveralUsers(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $I->amOnPage([
            'base/api',
            'users' => [
                'marinakostenko',
                'kfr'
            ],
            'platforms' => [
                'github'
            ]
        ]);
        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            },
            {
                "name": "marinakostenko",
                "platform": "github",
                "total-rating": 0,
                "repos": [],
                "repo": [
                    {
                        "name": "amis",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "GradleProject",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "HomeWorkQA2",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "Kiev.Impressions",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "MoodTest",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "Oracle-Database-and-Java-Project",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "PHP-GameIntegrationAggregator",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "text",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    }
                
                
                
                ]
            }
        ]'); //add second array
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
        $I->seeResponseCodeIs(200);

    }

    /**
     * Test case for api with unknown platform in list
     *
     * @return void
     */
    public function cestUnknownPlatforms(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $I ->expectException(LogicException::class, function () use ($I){

        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr'
            ],
            'platforms' => [
                'jjjjj',
            ]
        ]);
        });



    }

    /**
     * Test case for api with unknown user in list
     *
     * @return void
     */
    public function cestUnknowUsers(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         *
         */


        $I->amOnPage([
            'base/api',
            'users' => [
                '+ěščšěčšěčšě'
            ],
            'platforms' => [
                'github',
            ]
        ]);

        $I->seeResponseCodeIs(200);

    }

    /**
     * Test case for api with mixed (unknown, real) users and non empty platform list
     *
     * @return void
     */
    public function cestMixedUsers(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         *
         */

        $I->amOnPage([
            'base/api',
            'users' => [
                'hhhhh',
                'kfr'
            ],
            'platforms' => [
                'github',
            ]
        ]);

        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            }
        ]');
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
        $I->seeResponseCodeIs(200);


    }

    /**
     * Test case for api with mixed (github, gitlab, bitbucket) platforms and non empty user list
     *
     * @return void
     */
    public function cestMixedPlatforms(\FunctionalTester $I)
    {
        /**
         * @todo IMPLEMENT THIS
         */

        $I->amOnPage([
            'base/api',
            'users' => [
                'kfr'
            ],
            'platforms' => [
                'github',
                'gitlab',
                'bitbucket'
            ]
        ]);

        $I->amOnPage([
            'base/api',
            'users' => [
                'hhhhh',
                'kfr'
            ],
            'platforms' => [
                'github',
            ]
        ]);

        $expected = json_decode('[
            {
                "name": "kfr",
                "platform": "github",
                "total-rating": 1.5,
                "repos": [],
                "repo": [
                    {
                        "name": "kf-cli",
                        "fork-count": 0,
                        "start-count": 2,
                        "watcher-count": 2,
                        "rating": 1
                    },
                    {
                        "name": "cards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "UdaciCards",
                        "fork-count": 0,
                        "start-count": 0,
                        "watcher-count": 0,
                        "rating": 0
                    },
                    {
                        "name": "unikgen",
                        "fork-count": 0,
                        "start-count": 1,
                        "watcher-count": 1,
                        "rating": 0.5
                    }
                ]
            }
        ]');
        $I->assertEquals($expected, json_decode($I->grabPageSource()));
        $I->seeResponseCodeIs(200);

    }
}