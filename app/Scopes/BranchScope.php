<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class BranchScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {

        // Check if model has branch method which comes from HasBranch Trait.
        // If that has method then it has branch otherwise it do not have branch id
        // and we can simply return from here
        if (!method_exists($model, 'branch')) {
            return $builder;
        }

        // When user is logged in
        // auth()->user() do not work in apply so we have use auth()->hasUser()
        if (auth()->hasUser()) {

            $branch = branch();

            // We are not checking if table has branch_id or not to avoid extra queries.
            // We need to be extra careful with migrations we have created. For all the migration when doing something with update
            // we need to add withoutGlobalScope(BranchScope::class)
            // Otherwise we will get the error of branch_id not found when application is updating or modules are installing

            if ($branch) {
                $builder->where($model->getTable() . '.branch_id', '=', $branch->id);
            }
        }
    }
}
