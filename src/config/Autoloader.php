<?php
namespace src\config;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $baseDir = BASE_PATH . '/';
            $file = $baseDir . str_replace('\\', '/', $class) . '.php';
        
            if (file_exists($file)) {
                require_once $file;
            } else {
                error_log("Autoloader : Impossible de charger la classe $class. Fichier $file introuvable.");
                die("Erreur : Classe $class introuvable.");
            }
        });
    }
}
