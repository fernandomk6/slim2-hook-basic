<?php

require_once __DIR__."/vendor/autoload.php";

use \Slim\Slim;

$app = new Slim();

$app->get("/", function(){
    echo "rota / get by slim2 ************* <hr>";
});

// Esse gancho é invocado antes que o aplicativo Slim seja executado.
$app->hook("slim.before", function(){
    echo "hook - slim.before<br> Esse gancho é invocado antes que o aplicativo Slim seja executado. <hr>";
});

// Este gancho é invocado depois que o buffer de saída é ativado e antes do roteador ser despachado.
$app->hook("slim.before.router", function(){
    echo "hook - slim.before.router<br> Este gancho é invocado depois que o buffer de saída é ativado e antes do roteador ser despachado. <hr>";
});

// Este gancho é invocado antes que a rota correspondente atual seja despachada.
$app->hook("slim.before.dispatch", function(){
    echo "hook - slim.before.dispatch<br> Este gancho é invocado antes que a rota correspondente atual seja despachada. <hr>";
});

// Este gancho é invocado depois que a rota correspondente atual é despachada.
$app->hook("slim.after.dispatch", function(){
    echo "hook - slim.after.dispatch<br> Este gancho é invocado depois que a rota correspondente atual é despachada. <hr>";
});

// Esse gancho é invocado depois que o roteador é despachado, antes que a resposta seja enviada ao cliente e depois que o buffer de saída é desativado
$app->hook("slim.after.router", function(){
    echo "hook - slim.after.router<br> Esse gancho é invocado depois que o roteador é despachado, antes que a resposta seja enviada ao cliente e depois que o buffer de saída é desativado <hr>";
});

// Esse gancho é chamado depois que o buffer de saída é desativado e depois que a resposta é enviada ao cliente.
$app->hook("slim.after", function(){
    echo "hook - slim.after<br> Esse gancho é chamado depois que o buffer de saída é desativado e depois que a resposta é enviada ao cliente. <hr>";
});

// criando hook custom
$app->hook("slim.custom.hook", function(){
    echo "slim.custom.hook<br> Esse hook foi criado por mim <hr>";
}, 2);

$app->hook("slim.custom.hook", function(){
    echo "slim.custom.hook<br> Outra chamada, mesmo hook <hr>";
}, 1);

// chamando hook custom
$app->applyHook("slim.custom.hook");



$app->run();
