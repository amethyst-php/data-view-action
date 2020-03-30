<?php

namespace Amethyst\Observers;

use Amethyst\DataViewAction\Helper;
use Amethyst\DataViewAction\Manager;
use Amethyst\Models\DataViewAction;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Yaml\Yaml;

class DataViewActionObserver
{
    /**
     * Handle the DataViewAction "created" event.
     *
     * @param \Amethyst\Models\DataViewAction $dataViewAction
     */
    public function created(DataViewAction $dataViewAction)
    {
        $resource = app('amethyst')->get('data-view')->findOrCreateOrFail([
            'name'    => sprintf('~%s~.%s', $dataViewAction->data, $dataViewAction->name),
            'type'    => 'component',
        ]);

        $this->updated($dataViewAction);
    }

    /**
     * Handle the DataViewAction "updated" event.
     *
     * @param \Amethyst\Models\DataViewAction $dataViewAction
     */
    public function updated(DataViewAction $dataViewAction)
    {
        $resource = app('amethyst')->get('data-view')->getRepository()->findOneBy([
            'name'    => sprintf(
                '~%s~.%s', 
                $dataViewAction->getOriginal()['data'] ?? $dataViewAction->data, 
                $dataViewAction->getOriginal()['name'] ?? $dataViewAction->name
            ),
        ]);

        $api = config('amethyst.api.http.data.router.prefix');

        $params = [
            'name'    => sprintf('~%s~.%s', $dataViewAction->data, $dataViewAction->name),
            'type'    => 'component',
            'tag'     => $dataViewAction->data,
            'require' => $dataViewAction->data,
            'config'  => Yaml::dump([
                'label'   => $dataViewAction->name,
                'extends' => "resource-execute",
                'type'    => 'action',
                'scope'   => $dataViewAction->scope,
                'options' => [
                    'http' => [
                        'method' => 'POST',
                        'url' => $api."/workflow/execute",
                        'query' => "id eq {$dataViewAction->workflow_id}",
                        'body' => [
                            'queue' => 1
                        ]
                    ]
                ]
            ], 10),
            'parent_id' => app('amethyst')->get('data-view')->getRepository()->findOneBy(['name' => sprintf('~%s~.data.iterator.table', $dataViewAction->data)])
        ];

        app('amethyst')->get('data-view')->updateOrFail($resource, $params);
    }

    /**
     * Handle the DataViewAction "deleted" event.
     *
     * @param \Amethyst\Models\DataViewAction $dataViewAction
     */
    public function deleted(DataViewAction $dataViewAction)
    {
        app('amethyst')->get('data-view')->getRepository()->findOneBy([
            'name'    => sprintf('~%s~.%s', $dataViewAction->data, $dataViewAction->name)
        ])->delete();
    }
}
