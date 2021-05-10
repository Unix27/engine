<?php
namespace App\Builders\Product\Providers\Joom;

use Illuminate\Support\Collection;

/**
 * Class BaseObject
 *
 * @package Buratino\Sdk\Objects
 */
abstract class BaseObject extends Collection
{
    protected $raw = [];

    protected $visible = [];

    /**
     * Builds collection entity.
     *
     * @param array|mixed $data
     */
    public function __construct($data)
    {
        parent::__construct($this->init($data));
        $this->mapRelatives();
    }

    protected function init($data)
    {
        $attributes = [];
        $this->raw = $this->getRawResult($data);

        if (empty($this->visible)) return $this->raw;

        foreach ($this->visible as $key) {
            $functionName = camel_case('map_' . $key);
            if (method_exists($this, $functionName)) {
                $this->$key = $this->$functionName();
            } else {
                $this->$key = isset($data[$key]) ? $data[$key] : null;
            }
            $attributes[$key] = $this->$key;
        }
        return $attributes;
    }

    /**
     * Property relations.
     *
     * @return array
     */
    abstract public function relations();

    /**
     * Get an item from the collection by key.
     *
     * @param mixed $key
     * @param mixed $default
     *
     * @return mixed|static
     */
    public function get($key, $default = null)
    {
        if ($this->offsetExists($key)) {
            return is_array($this->items[$key]) ? new static($this->items[$key]) : $this->items[$key];
        }
        return value($default);
    }


    public function getRaw($key, $default = null)
    {
        if (array_key_exists($key, $this->raw)) {
            return is_array($this->raw[$key]) ? new static($this->raw[$key]) : $this->raw[$key];
        }
        return value($default);
    }

    public function set($key, $value)
    {
        $this->items[$key] = $value;
    }

    public function setRaw($key, $value)
    {
        $this->raw[$key] = $value;
    }

    /**
     * Map property relatives to appropriate objects.
     *
     * @return array|void
     */
    public function mapRelatives()
    {
        $relations = collect($this->relations());
        if ($relations->isEmpty()) {
            return false;
        }
        return $this->items = collect($this->all())
            ->map(function ($value, $key) use ($relations) {
                if ($relations->has($key."[]")) {   //array support
                    $key = $key . "[]";
                    $className = $relations->get($key);
                    $classObjs = collect([]);
                    foreach ($value as $val) {
                        $classObjs->push(new $className($val));
                    }
                    return $classObjs;
                }
                if (!$relations->has($key)) {
                    return $value;
                }
                $className = $relations->get($key);
                $classObj = new $className($value);
                return $classObj;
            })
            ->all();
    }

    /**
     * Returns raw response.
     *
     * @return array|mixed
     */
    public function getRawResponse()
    {
        return $this->items;
    }

    /**
     * Returns raw result.
     *
     * @param $data
     *
     * @return mixed
     */
    public function getRawResult($data)
    {
        if (isset($data['result'])) {
            unset($data['result']);
        }
        return $data;
    }

    /**
     * Get Status of request.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return array_get($this->items, 'status', array_get($this->items, 'ok', false));
    }

    /**
     * Magic method to get properties dynamically.
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $action = substr($name, 0, 3);
        if ($action !== 'get') {
            return false;
        }
        $property = camel_case(substr($name, 3));
        $response = $this->get($property);
        // Map relative property to an object
        $relations = $this->relations();
        if (null != $response && isset($relations[$property])) {
            return new $relations[$property]($response);
        }
        return $response;
    }
}
