<?php
if (!defined('JO_ROOT')) define("JO_ROOT", realpath(__DIR__."/../../../"));
//packages
require_once(JO_ROOT."/cms/core/inc/settings.php");
require_once(JO_ROOT."/cms/core/inc/security.php");
require_once(JO_ROOT."/cms/core/inc/db.php");
require_once(JO_ROOT.'/cms/core/inc/simple_html_dom.php');

jo_session();
if(jo_login_verify() != true){
    header('Location: /cms');
    exit;
}
if($_SESSION['cms_user'] != 'admin'){
  header('Location: /cms');
  exit;
}

if(isset($_POST["saved"])){
    if(isset($_POST["id"]) AND isset($_POST["name"]) AND isset($_POST["code"])){
        $code = $_POST["code"];
        $code = str_replace(array("\r\n", chr(10).chr(13), "\r", "\n", PHP_EOL, chr(10), chr(13)),'--jo:r--', $code);
        $domobject = str_get_html ($code);
        $attr = "data-jo-content";
        $mask = $domobject->find("*", 0);
        $mask->$attr = "noneditable";
        $code = str_replace("--jo:r--", PHP_EOL,  $domobject->save());
        jo_set_mask($_POST["id"], $_POST["name"], "mask", $code);
    }
}
if(isset($_GET["deleted"]) AND isset($_GET["id"])){
    jo_delete_mask($_GET["id"]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $JO_LANG['MSK_TITL']; ?> | Darkcraft Digital CMS v.1.1b | Registered to: Bales Technology LLC.</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/cms/core/js/ui.js"></script>
    <script src="/cms/apps/mask/js/mask.js"></script>

    <script src="/cms/apps/codeeditor/codemirror/lib/codemirror.js"></script>
    <link rel="stylesheet" href="/cms/apps/codeeditor/codemirror/lib/codemirror.css">
    <script src="/cms/apps/codeeditor/codemirror/mode/php/php.js"></script>
    <script src="/cms/apps/codeeditor/codemirror/mode/xml/xml.js"></script>
    <script src="/cms/apps/codeeditor/codemirror/mode/javascript/javascript.js"></script>
    <script src="/cms/apps/codeeditor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="/cms/apps/codeeditor/codemirror/mode/clike/clike.js"></script>

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
                <a id="attribution" href="https://darkcraft.digital/" title="Darkcraft Digital CMS Beta" style="
    display: block;
    position: fixed;
    top: 10px;
    /* margin-left: 40px; */
    height: 40px !important;
    max-height: 40px;
    left: -20px;
    width: 40px;
    max-width: 40px;
"><img src="/cms/core/style/icons/dclogo.png" style="
    height: 40px;
"></a>
                <div>
                    <a href="/cms/control/cms.php"  title="<?php echo $JO_LANG['CMS_FILE']; ?>"><img src="/cms/core/style/icons/home.svg"/></a>
                    <a id="active" href="/cms/apps/mask/mask.php"  title="<?php echo $JO_LANG['MSK_TITL']; ?>"><img src="/cms/core/style/icons/mask.svg"/></a>
                    <?php echo $_SESSION['cms_user'] == 'admin' ? '<a href="/cms/control/users.php" title="'.$JO_LANG['USR'].'"><img src="/cms/core/style/icons/users.svg" /></a>' : ''  ?>
                    <a href="/cms/control/settings.php" title="<?php echo $JO_LANG['SET']; ?>"><img src="/cms/core/style/icons/settings.svg"/></a>
                    <a href="/cms/control/logout.php"  title="<?php echo $JO_LANG['BYE_TITL']; ?>"><img src="/cms/core/style/icons/logout.svg"/></a>
                </div>
            </div>
    </div>
    </div>
	<div id="menu">
	       <div>
               <h1 style="color: #494949;
    text-transform: uppercase;
    text-decoration: overline;
    font-family: fantasy;
    font-size: 24px;
    font-weight: 100;"><style name="rw">.list_active, .mask_list a:hover {
    background-color: rgb(25 24 24 / 78%);
    color: white;
    transition: 2s;
    border-radius: 2px;
}</style><?php echo $JO_LANG['MSK_TITL']; ?></h1>
               <div class="column_container">
                   <div class="settings mask_list">
                       <a class="jo_btn"><img src="/cms/core/style/icons/plus.svg" /> <?php echo $JO_LANG['MSK_NEW'] ?></a>
                       <?php
                            foreach (jo_get_masks("all") as $mask) {
                                echo "<a data-id=".$mask['id'].">".$mask['name']."</a>";
                            }
                        ?>
                   </div>
                   <div class="settings mask_set">
                       <form action="/cms/apps/mask/mask.php" method="post" class="jo_form">
                           <table>
                               <tr>
                                   <td>
                                       <?php echo $JO_LANG['MSK_NME'] ?>
                                   </td>
                                   <td>
                                       <input id="name" type="text" name="name" placeholder="<?php echo $JO_LANG['MSK_NEW_NME'] ?>" value=""/>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo $JO_LANG['MSK_CDE'] ?>
                                   </td>
                                   <td>
                                       <textarea id="textarea" name="code"></textarea>
                                   </td>
                               </tr>
                           </table>
                           <input type="hidden" name="saved" value="true" />
                           <input id="id" type="hidden" name="id" value="0" />
                           <input type="submit" value="<?php echo $JO_LANG['FORM_OK'] ?>" /><a id="delete" class="jo_btn" href=""><?php echo $JO_LANG['FORM_DEL'] ?></a>
                       </form>
                   </div>
               </div>
	   </div>
	</div>
    <script>
      var myCodeMirror = CodeMirror.fromTextArea(document.getElementById("textarea"),{
        lineNumbers: true,
        mode: "php"
      });
    </script>
</body>
</html>
