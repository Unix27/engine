<?php

\Illuminate\Support\Collection::macro(
    'mapKeysWith',
    function ($callable) {
        /* @var $this \Illuminate\Support\Collection */
        return $this->mapWithKeys(function ($item, $key) use ($callable) {
            if (is_array($item)) {
                $item = collect($item)
                    ->mapKeysWith($callable)
                    ->toArray();
            }
            return [$callable($key) => $item];
        });
    }
);

\Illuminate\Support\Collection::macro(
    'mapKeysToCamelCase',
    function () {
        /* @var $this \Illuminate\Support\Collection */
        return $this->mapKeysWith('camel_case');
    }
);


\Illuminate\Support\Collection::macro(
    'mapKeysToSnakeCase',
    function () {
        /* @var $this \Illuminate\Support\Collection */
        return $this->mapKeysWith('snake_case');
    }
);