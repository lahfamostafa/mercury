<?php
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=mercury", "root", "");
    echo "MYSQL OK\n";
} catch (Exception $e) {
    echo "MYSQL FAIL: ".$e->getMessage()."\n";
}
