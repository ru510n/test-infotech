<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    [
        "aliases" => [
            "vendor" => "application.vendor",
            "giix" => "vendor.assisrafael.giix",
        ],
        "basePath" => dirname(__FILE__) . DIRECTORY_SEPARATOR . "..",
        "controllerNamespace" => "Controllers",
        "name" => "Yii Application",
        "sourceLanguage" => "en_us",
        "language" => "en",
        // preloading 'log' component
        "preload" => ["log"],
        // autoloading model and component classes
        "import" => [
            "application.models.*",
            "application.models.forms.*",
            "application.components.*",
            "vendor.assisrafael.giix.components.*",
            "ext.yii-mail.*",
            "ext.*",
        ],
        "modules" => [
            "gii" => [
                "class" => "system.gii.GiiModule",
                "password" => "asdasd",
                "generatorPaths" => [
                    "vendor.assisrafael.giix.generators", // giix generators
                ],
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                "ipFilters" => ["127.0.0.1", "::1"],
            ],
        ],
        // application components
        "components" => [
            "db" => [
                "connectionString" => sprintf(
                    "mysql:host=%s;port=%s;dbname=%s",
                    getenv("DB_HOST"),
                    getenv("DB_PORT"),
                    getenv("DB_NAME"),
                ),
                "emulatePrepare" => true,
                "username" => getenv("DB_USER"),
                "password" => getenv("DB_PASS"),
                "charset" => "utf8mb4",
            ],
            "coreMessages" => [
                "basePath" =>
                    dirname(__FILE__) . DIRECTORY_SEPARATOR . "messages",
            ],
            "session" => [
                "timeout" => 60 * 60 * 24,
            ],
            "user" => [
                "class" => "Components\\MyWebUser",
                // enable cookie-based authentication
                "allowAutoLogin" => false,
            ],
            // uncomment the following to enable URLs in path-format
            "mail" => [
                "class" => "ext.yii-mail.YiiMail",
                "transportType" => "php",
                "viewPath" => "application.views.mail",
                "logging" => true,
                "dryRun" => false,
            ],
            "authManager" => [
                "class" => "CDbAuthManager",
                "connectionID" => "db",
                "itemTable" => "authitem",
                "itemChildTable" => "authitemchild",
                "assignmentTable" => "authassignment",
                "defaultRoles" => ["authenticated", "guest"],
            ],
            "urlManager" => [
                "urlFormat" => "path",
                "showScriptName" => false,
                "rules" => require dirname(__FILE__) .
                    DIRECTORY_SEPARATOR .
                    "url_rules.php",
            ],
            "errorHandler" => [
                // use 'site/error' action to display errors
                "errorAction" => "site/error",
            ],
        ],
        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        "params" => require dirname(__FILE__) .
            DIRECTORY_SEPARATOR .
            "params.php",
    ],
    require dirname(__FILE__) . DIRECTORY_SEPARATOR . "custom.php",
);
