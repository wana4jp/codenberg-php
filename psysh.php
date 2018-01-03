#!/usr/bin/env php
<?php
namespace Kanekoelastic\PhpCodenberg;

// Composerのオートローダーを読み込む
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__.'/');
$dotenv->load();

echo __NAMESPACE__ . " shell\n";

$sh = new \Psy\Shell();
$sh->addCode(sprintf("namespace %s;", __NAMESPACE__));
$sh->run();

// 終了時に表示するメッセージ
echo "Bye.\n";
