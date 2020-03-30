<?php

namespace Amethyst\Fakers;

use Faker\Factory;
use Railken\Bag;
use Railken\Lem\Faker;

class DataViewActionFaker extends Faker
{
    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name);
        $bag->set('description', $faker->text);
        $bag->set('workflow', WorkflowFaker::make()->parameters()->toArray());
        $bag->set('data', 'data-view');
        $bag->set('scope', 'global');

        return $bag;
    }
}
