<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 09/08/15
 * Time: 19:18
 * To change this template use File | Settings | File Templates.
 */
class Conf{
    static $debug=1;/*
static $databases=array(
    'default'=> array(
        'host' => 'localhost',
        'database' => 'cpicoaching',
        'login' => 'cpicoaching',
        'password' => 'k4#0Yo1r'
    )
);*/

    static $databases=array(
        'default'=> array(
            'host' => 'localhost',
            'database' => 'ancialf',
            'login' => 'root',
            'password' => ''
        )
    );

}

Router::prefix('fioufiouadmin','admin');
Router::connect('offreancias/:slug-:id','offreancias/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
//Router::connect('offrelfs/:slug-:id','offrelfs/view/id:([0-9]+)/slug:([a-z0-9\-]+)');

