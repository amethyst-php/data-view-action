<?php

namespace Amethyst\Models;

use Amethyst\Core\ConfigurableModel;
use Illuminate\Database\Eloquent\Model;
use Railken\Lem\Contracts\EntityContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataViewAction extends Model implements EntityContract
{
    use ConfigurableModel;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->ini('amethyst.data-view-action.data.data-view-action');
        parent::__construct($attributes);
    }
    
    public function workflow(): BelongsTo
    {
        return $this->belongsTo(config('amethyst.action.data.workflow.model'));
    }
}
