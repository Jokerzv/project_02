<?php
//$id = $_GET["id"];
 function routes($id){
     //$id = $_GET["id"];
    return [

        '' => [
            'controller' => 'main',
            'action' => 'index',
        ],

        'slider-settings' => [
            'controller' => 'settings',
            'action' => 'slider',
        ],

        'news-settings' => [
            'controller' => 'settings',
            'action' => 'news',
        ],
        'news-settings/' . $id => [
            'controller' => 'settings',
            'action' => 'news',
            'id' => $id,
        ],
        'slider-settings/editt/' . $id => [
            'controller' => 'settings',
            'action' => 'editt',
            'id' => $id,
        ],
        'news-settings/edit/' . $id => [
            'controller' => 'settings',
            'action' => 'edit',
            'id' => $id,
        ],
        'news/' . $id => [
            'controller' => 'main',
            'action' => 'index',
            'id' => $id,
        ],
        'news' => [
            'controller' => 'main',
            'action' => 'index',
        ],

        'news/id/' . $id => [
            'controller' => 'main',
            'action' => 'show',
            'id' => $id,
        ],


        'account/register' => [
            'controller' => 'settings',
            'action' => 'register',
        ],

    ];
}