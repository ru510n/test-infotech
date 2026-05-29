<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return CMap::mergeArray(
    [
        "aliases" => [
            "vendor" => "application.vendor",
        ],
        "basePath" => dirname(__FILE__) . DIRECTORY_SEPARATOR . "..",
        "name" => "Console",
        "import" => [
            "application.models.*",
            "application.components.*",
            "ext.yii-mail.*",
            "ext.*",
            "vendor.assisrafael.giix.components.*",
        ],
        // application components
        "components" => [
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
            "mail" => [
                "class" => "ext.yii-mail.YiiMail",
                "transportType" => "php",
                "viewPath" => "application.views.mail",
                "logging" => true,
                "dryRun" => false,
            ],
        ],
        "params" => require dirname(__FILE__) .
            DIRECTORY_SEPARATOR .
            "params.php",
    ],
    require dirname(__FILE__) . DIRECTORY_SEPARATOR . "custom.php",
);
