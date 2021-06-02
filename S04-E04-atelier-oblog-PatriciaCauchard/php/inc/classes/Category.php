<?php

class Category
{
    public $title;

    public function __construct($title = '', $content = '', $author = '', $date = '', $category = '')
    {
        $this->title = $title;
    }
}