<?php

class About
{
    public function index($name = 'Arief', $job = 'Software Engineer')
    {
        echo "Hello, my name is $name. I'm a $job";
    }

    public function page()
    {
        echo 'about/page';
    }
}
