<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6180dbdd575fd6b74cc00dfc3bb3c86
{
    public static $classMap = array (
        'App\\Controllers\\Home' => __DIR__ . '/../..' . '/App/Controllers/Home.php',
        'App\\Controllers\\Panel' => __DIR__ . '/../..' . '/App/Controllers/Admin/Panel.php',
        'App\\Lib\\Authentication' => __DIR__ . '/../..' . '/App/Lib/Authentication.php',
        'App\\Lib\\Registration' => __DIR__ . '/../..' . '/App/Lib/Registration.php',
        'App\\Model\\Home' => __DIR__ . '/../..' . '/App/Models/Home.php',
        'App\\Model\\User' => __DIR__ . '/../..' . '/App/Models/User.php',
        'App\\Provider\\UsersProvider' => __DIR__ . '/../..' . '/App/Providers/UsersProvider.php',
        'ComposerAutoloaderInite6180dbdd575fd6b74cc00dfc3bb3c86' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInite6180dbdd575fd6b74cc00dfc3bb3c86' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Core\\AbstractAction' => __DIR__ . '/../..' . '/Core/AbstractAction.php',
        'Core\\Config' => __DIR__ . '/../..' . '/Core/Config.php',
        'Core\\Controller\\AdminController' => __DIR__ . '/../..' . '/Core/Controller/AdminController.php',
        'Core\\Controller\\Controller' => __DIR__ . '/../..' . '/Core/Controller/Controller.php',
        'Core\\Database\\Connection' => __DIR__ . '/../..' . '/Core/Database/Connection.php',
        'Core\\Helpers\\Encrypter' => __DIR__ . '/../..' . '/Core/Helpers/Encrypter.php',
        'Core\\Model\\AbstractModel' => __DIR__ . '/../..' . '/Core/Model/AbstractModel.php',
        'Core\\Model\\ModelInterface' => __DIR__ . '/../..' . '/Core/Model/ModelInterface.php',
        'Core\\Provider\\AbstractProvider' => __DIR__ . '/../..' . '/Core/Providers/AbstractProvider.php',
        'Core\\Request\\Get' => __DIR__ . '/../..' . '/Core/Request/Get.php',
        'Core\\Request\\JsonDecoder' => __DIR__ . '/../..' . '/Core/Request/JsonDecoder.php',
        'Core\\Request\\JsonEncoder' => __DIR__ . '/../..' . '/Core/Request/JsonEncoder.php',
        'Core\\Request\\Post' => __DIR__ . '/../..' . '/Core/Request/Post.php',
        'Core\\Request\\Request' => __DIR__ . '/../..' . '/Core/Request/Request.php',
        'Core\\Request\\Validator\\Post' => __DIR__ . '/../..' . '/Core/Request/Validator/Post.php',
        'Core\\Request\\Validator\\Validator' => __DIR__ . '/../..' . '/Core/Request/Validator/Validator.php',
        'Core\\Router' => __DIR__ . '/../..' . '/Core/Router.php',
        'Core\\Session\\Session' => __DIR__ . '/../..' . '/Core/Session/Session.php',
        'Core\\View\\View' => __DIR__ . '/../..' . '/Core/View/View.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite6180dbdd575fd6b74cc00dfc3bb3c86::$classMap;

        }, null, ClassLoader::class);
    }
}
