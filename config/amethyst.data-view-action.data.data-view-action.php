<?php

return [
    'table'      => 'amethyst_data_view_actions',
    'comment'    => 'DataViewAction',
    'model'      => Amethyst\Models\DataViewAction::class,
    'schema'     => Amethyst\Schemas\DataViewActionSchema::class,
    'repository' => Amethyst\Repositories\DataViewActionRepository::class,
    'serializer' => Amethyst\Serializers\DataViewActionSerializer::class,
    'validator'  => Amethyst\Validators\DataViewActionValidator::class,
    'authorizer' => Amethyst\Authorizers\DataViewActionAuthorizer::class,
    'faker'      => Amethyst\Fakers\DataViewActionFaker::class,
    'manager'    => Amethyst\Managers\DataViewActionManager::class,
];
