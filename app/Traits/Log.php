<?php

namespace App\Traits;

use App\Helpers\Constants\Queue;
use App\Jobs\CreateLog;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Log
{
    /**
         * Handle model event
         */
    public static function bootLog()
    {
        /**
         * Data creating and updating event
         */
        static::saved(function ($model) {
            // create or update?
            if ($model->wasRecentlyCreated) {
                static::storeLog($model, static::class, 'CREATED');
            } else {
                if (!$model->getChanges()) {
                    return;
                }
                static::storeLog($model, static::class, 'UPDATED');
            }
        });

        /**
         * Data deleting event
         */
        static::deleted(function ($model) {
            static::storeLog($model, static::class, 'DELETED');
        });
    }

    /**
     * Generate the model name
     * @param  Model  $model
     * @return string
     */
    public static function getTagName($model)
    {
        return !empty($model->tagName) ? $model->tagName : Str::title(Str::snake(class_basename($model), ' '));
    }

    /**
     * Store model logs
     * @param $model
     * @param $modelPath
     * @param $action
     */
    public static function storeLog($model, $modelPath, $action)
    {
        $data = $model->setAppends([])->toArray();

        foreach (Arr::only($model->attributes, $model->getFillable()) as $key => $value) {
            if (isset($model->original[$key]) && $model->original[$key] != $value) {
                $data[$key] = [
                    'from' => (json_decode($model->original[$key]) ? json_decode($model->original[$key]) : $model->original[$key]),
                    'to'   => (json_decode($value) ? json_decode($value) : $value),
                ];
            }
        }

        $log = [
            'type' => $action,
            'method' => request()->method() ?? 'SYSTEM',
            'path' => request()->path() ?? null,
            'ip_address' => request()->ip(),
            'table' => $model->getTable(),
            'table_keyname' => $model->getKeyName(),
            'table_key' => $model->getKey(),
            'data' => json_encode($data),
            'user_id' => auth()->user()->user_id ?? null,
        ];

        CreateLog::dispatch($log)->onQueue(Queue::CREATE_LOG);
    }
}
