<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit837d03153adf09cfda31fcf3fb5a6b4e
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'teste\\' => 6,
        ),
        's' => 
        array (
            'src\\' => 4,
        ),
        'c' => 
        array (
            'config\\' => 7,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'U' => 
        array (
            'Uteis\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'teste\\' => 
        array (
            0 => __DIR__ . '/../..' . '/teste',
        ),
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Uteis\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Uteis',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Uteis\\InserirSort' => __DIR__ . '/../..' . '/Uteis/InserirSort.php',
        'app\\Configuracao' => __DIR__ . '/../..' . '/app/Configuracao.php',
        'app\\Controller\\ControllerNumerosJogador' => __DIR__ . '/../..' . '/app/Controller/ControllerNumerosJogador.php',
        'app\\Controller\\ControllerNumerosJogoLotoFacil' => __DIR__ . '/../..' . '/app/Controller/ControllerNumerosJogoLotoFacil.php',
        'config\\ConfiguracaoInterface' => __DIR__ . '/../..' . '/config/ConfiguracaoInterface.php',
        'src\\Model\\LotoFacil' => __DIR__ . '/../..' . '/src/Model/LotoFacil.php',
        'teste\\Exec' => __DIR__ . '/../..' . '/teste/Exec.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit837d03153adf09cfda31fcf3fb5a6b4e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit837d03153adf09cfda31fcf3fb5a6b4e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit837d03153adf09cfda31fcf3fb5a6b4e::$classMap;

        }, null, ClassLoader::class);
    }
}
