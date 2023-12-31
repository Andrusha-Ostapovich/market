<?php

namespace App\Models\Traits;

trait HasStaticLists
{
    protected static function staticListBuild(
        array $records = [],
        string $columnKey = null,
        string $indexKey = null,
        array $options = [],
    ): array {

        if ($only = $options['only'] ?? []) {
            $records = array_filter($records, function ($record) use ($indexKey, $only) {
                return in_array($record[$indexKey], $only);
            });
        }

        if ($indexKey && $columnKey) {
            if ($columnKey === '*' || $columnKey === ['*']) {
                return array_combine(array_column($records, $indexKey), $records);
            }

            return array_column($records, $columnKey, $indexKey);
        }

        elseif ($columnKey) {
            return array_column($records, $columnKey);
        }

        return $records;
    }
}
