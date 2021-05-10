<?php


namespace App\Builders\Product\Providers\AliExpress;


class Category
{
    const KEY = 'breadCrumbPathList';

    private $name;
    private $id;
    private $url;
    private $tree;

    public function __construct(array $data)
    {
        $category = last(data_get($data, self::KEY, []));
        $this->id = data_get($category, 'cateId');
        $this->name = data_get($category, 'name');
        $this->url = data_get($category, 'url');
        $this->tree = collect(data_get($data, self::KEY))->mapKeysToCamelCase();
    }

    public function get()
    {
        return collect([
            'id' => $this->getId(),
            'name' => $this->getName(),
            'url' => $this->getUrl(),
            'tree' => $this->getTree()
        ]);
    }

    public function set(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->url = $data['url'];
    }

    public function getId()
    {
       return $this->id;
    }

    public function setId(string $id)
    {
       $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function getTree()
    {
        return $this->tree;
    }

    public function setTree(array $data)
    {
        $this->tree = $data;
    }
}