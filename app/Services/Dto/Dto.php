<?php

namespace App\Services\Dto;

/**
 * Class DTO
 * @package App\DTO
 */
class Dto
{
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        } else {
            return null;
        }
    }

    /**
     * @return array
     */
    public function __getAll()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    /**
     * @param $array
     */
    public function __setAll($array)
    {
        if (is_array($array) && $array && count($array)) {
            foreach ($array as $key => $item) {
                $this->__set($key, $item);
            }
        }
    }

    /**
     *
     */
    public function __unsetAll()
    {
        $vars = $this->__getAll();
        if (is_array($vars) && $vars && count($vars)) {
            foreach ($vars as $name => $value) {
                $this->__set($name, null);
            }
        }
    }
}
