<?php


namespace App\Builders\Product\Providers\AliExpress;


class MetaTag
{
    const KEY = 'keywords';
    private $keywords;
    private $list;

    public function __construct(array $data)
    {
        $this->keywords = data_get($data, self::KEY);
        $this->list = collect(explode(',', data_get($data, self::KEY)));
    }

    public function get()
    {
        return collect(
            [
                'keywords' => $this->getKeywords(),
                'list' => $this->getList(),
            ]
        );
    }

    public function set()
    {

    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords)
    {
        $this->keywords = $keywords;
    }

    public function getList()
    {
        return $this->list;
    }

    public function setList(array $list)
    {
        $this->list = collect($list);
    }
}
