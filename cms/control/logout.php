<?php
if (!defined('JO_ROOT')) define("JO_ROOT", realpath(__DIR__."/../../"));
require_once(JO_ROOT.'/cms/core/inc/db.php');
require_once(JO_ROOT.'/cms/core/inc/security.php');
require_once(JO_ROOT.'/cms/core/inc/settings.php');
cms_taskkiller();

jo_session_lite();
jo_session_close();
?>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $JO_LANG['BYE_TITL']; ?>Logged Out | Darkcraft Digital CMS v.1.1b | Registered to: Bales Technology LLC.</title>
    <link href="/cms/core/style/css/stylesheet.css" rel="stylesheet" type="text/css"/>
    <link href="/cms/control/css/backend_style.css" rel="stylesheet" type="text/css"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/cms/core/style/icons/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/cms/core/style/icons/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/cms/core/style/icons/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/cms/core/style/icons/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/cms/core/style/icons/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/cms/core/style/icons/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/cms/core/style/icons/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/cms/core/style/icons/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/cms/core/style/icons/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/cms/core/style/icons/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/cms/core/style/icons/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/cms/core/style/icons/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/cms/core/style/icons/favicon/favicon-16x16.png">
    <link rel="manifest" href="/cms/core/style/icons/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#494949">
    <meta name="msapplication-TileImage" content="/cms/core/style/icons/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#494949">

</head>
<body >
    <div id="navigation">
    <div id="nav_container">
            <div id="sidebar">
                <div>
                </div>
            </div>
    </div>
    </div>
	<div id="menu">
	<div>
    <h1><?php echo $JO_LANG['BYE']; ?></h1>
        <p><?php echo $JO_LANG['BYE_TXT']; ?> <a href="/cms" class="jo_btn"><?php echo $JO_LANG['BYE_BACK']; ?></a></p>
	</div>
	</div>

</body>

</html>
