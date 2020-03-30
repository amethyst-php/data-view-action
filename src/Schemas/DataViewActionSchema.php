<?php

namespace Amethyst\Schemas;

use Railken\Lem\Attributes;
use Railken\Lem\Schema;
use Amethyst\Managers\WorkflowManager;

class DataViewActionSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\LongTextAttribute::make('description'),
            \Amethyst\Core\Attributes\DataNameAttribute::make('data')
                ->setRequired(true),
            Attributes\BelongsToAttribute::make('workflow_id')
                ->setRelationName('workflow')
                ->setRelationManager(WorkflowManager::class)
                ->setRequired(true),
            Attributes\EnumAttribute::make('scope', ['global', 'resource'])
                ->setRequired(true),
            Attributes\YamlAttribute::make('body'),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make()
        ];
    }
}
