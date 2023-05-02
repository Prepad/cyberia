<?php

namespace App\Observers;

use App\Enums\OperationEnum;
use App\Traits\ModelWithLogger;
use Illuminate\Database\Eloquent\Model;

class LogObserver
{
    private function log(Model $model, OperationEnum $operationEnum): void
    {
        if (!in_array(ModelWithLogger::class, class_uses_recursive($model::class))) {
            return;
        };

        if (!in_array($operationEnum, [OperationEnum::CREATED, OperationEnum::UPDATED])) {
            $model->logs()->create([
                'operation' => $operationEnum->value
            ]);
        }

        $dirty = $model->getDirty();
        collect($dirty)->each(
            fn (?string $value, string $field) =>
            $model->logs()->create([
                'field' => $field,
                'old' => $model->getOriginal($field),
                'new' => $value,
                'operation' => $operationEnum->value
            ])
        );
        return;
    }

    public function created(Model $model): void
    {
        $this->log($model, OperationEnum::CREATED);
    }

    public function updated(Model $model): void
    {
        $this->log($model, OperationEnum::UPDATED);
    }

    public function deleted(Model $model): void
    {
        $this->log($model, OperationEnum::DELETED);
    }

    public function restored(Model $model): void
    {
        $this->log($model, OperationEnum::RESTORED);
    }

    public function forceDeleted(Model $model): void
    {
        $this->log($model, OperationEnum::FORCE_DELETED);
    }
}
