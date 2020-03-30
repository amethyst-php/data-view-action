<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\DataViewActionFaker;
use Amethyst\Managers\DataViewActionManager;
use Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class DataViewActionTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = DataViewActionManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = DataViewActionFaker::class;
}
