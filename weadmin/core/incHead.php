<?php include("../core/incLoderBox.php"); ?>
<link href="../css/font-awesome.min.css" rel="stylesheet" />

<div class="headBackOffice">
    <div class="imgLogo"><a href="../core/index.php"><img src="<?php echo $core_pathname_crupload ?>/<?php echo $valPicSystem ?>" height="38" /></a></div>
    <div class="txtLogoLogin">
        <h1 class="titleInner"><?php echo $valNameSystem ?></h1>
        <h3 class="subtitleInner"><?php echo $valTitleSystem ?></h3>
    </div>
    <div class="divLogin">


        <!-- j10 -->
        <div class="divLogin-img">
            <?php
            if (!empty($_SESSION[$valSiteManage . "core_session_picture"])) {
                $valPicProfileTop = $_SESSION[$valSiteManage . "core_session_picture"];
            } else {
                $valPicProfileTop = load_picmemberBack($_SESSION[$valSiteManage . "core_session_id"]);
                if (is_file($valPicProfileTop)) {
                    $valPicProfileTop = $valPicProfileTop;
                } else {
                    $valPicProfileTop = "../img/btn/nouser.jpg";
                }
            }

            if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                $valLinkViewUser = "#";
            } else {
                $valLinkViewUser = "../core/userView.php";
            }
            ?>
            <a href="<?php echo  $valLinkViewUser ?>">
                <div style="width:30px; height:30px;  background:url(<?php echo  $valPicProfileTop ?>) center no-repeat; background-size: cover;background-repeat: no-repeat;   "></div>
            </a>
        </div>
        <div class="divLogin-name">
            <a href="<?php echo  $valLinkViewUser ?>"><?php echo  $_SESSION[$valSiteManage . "core_session_name"] ?></a>
        </div>
        <div class="divLogin-btn">
            <a href="javascript:void(0)" onclick="clickInSubMenuTop()" id="showSubMenuTop" title="<?php echo  $langTxt["menu:topmenu"] ?>">
                <span class="fa fa-bars"></span>
            </a>
        </div>
        <!-- j10 -->

        <!-- <table  border="0" cellspacing="0" cellpadding="0" align="right">
            <tr>
                <td style="padding-right:10px;" >
                    <?php
                    $valPicProfileTop = load_picmemberBack($_SESSION[$valSiteManage . "core_session_id"]);
                    if (is_file($valPicProfileTop)) {
                        $valPicProfileTop = $valPicProfileTop;
                    } else {
                        $valPicProfileTop = "../img/btn/nouser.jpg";
                    }

                    if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                        $valLinkViewUser = "#";
                    } else {
                        $valLinkViewUser = "../core/userView.php";
                    }
                    ?>
                    <div style="width:29px; height:29px;  background:url(<?php echo  $valPicProfileTop ?>) center no-repeat; border:#ffffff solid 1px;  background-size: cover;background-repeat: no-repeat;   "><a href="<?php echo  $valLinkViewUser ?>"><img src="../img/btn/boxprofile.png" /></a></div></td>
                <td style="padding-right:10px;" ><a href="<?php echo  $valLinkViewUser ?>"><?php echo  $_SESSION[$valSiteManage . "core_session_name"] ?></a></td>
                <td><a href="javascript:void(0)"onclick="clickInSubMenuTop()" id="showSubMenuTop" title="<?php echo  $langTxt["menu:topmenu"] ?>"><img src="../img/btn/submenu.png" /></a></td>
            </tr>
        </table> -->

    </div>
</div>
<div class="clearAll"></div>
<div class="menuSub" id="divSubMenuTop">
    <div class="menuSubManage">
        <ul>
            <?php if ($_SESSION[$valSiteManage . "core_session_groupid"] == "11" && $_SESSION[$valSiteManage . "core_session_typeusermini"] == 0) { ?>
                <li><a href="../core/userMiniManage.php" title="<?php echo  $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?php echo  $langTxt["nav:userManage2"] ?></a></li>
            <?php   } else { ?>
                <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
                    <li><a href="../core/userManage.php" title="<?php echo  $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?php echo  $langTxt["nav:userManage2"] ?></a></li>
                    <li><a href="../core/permisManage.php" title="<?php echo  $langTxt["nav:perManage2"] ?>"><span class="fa fa-cog"></span><?php echo  $langTxt["nav:perManage2"] ?></a></li><?php   } ?>
                <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
                    <li><a href="../core/menuManage.php" title="<?php echo  $langTxt["nav:menuManage2"] ?>"><span class="fa fa-list"></span><?php echo  $langTxt["nav:menuManage2"] ?></a></li>
                    <li><a href="../core/setting.php" title="<?php echo  $langTxt["nav:setting"] ?>"><span class="fa fa-cogs"></span><?php echo  $langTxt["nav:setting"] ?></a></li>
                    <li><a href="../system_minisite/index.php" title="<?php echo  $langTxt["nav:setting:minisite"] ?>"><span class="fa fa-desktop"></span><?php echo  $langTxt["nav:setting:minisite"] ?></a></li><?php   } ?>
            <?php   } ?>
            <li><a href="javascript:void(0)" onclick="checkLogoutUser();" title="<?php echo  $langTxt["menu:logout"] ?>"><span class="fa fa-sign-out"></span><?php echo  $langTxt["menu:logout"] ?></a></li>
        </ul>
    </div>
</div>
<div class="clearAll"></div>

<input id="pathTojs" type="hidden" value="<?php echo $core_pathname_folderlocal; ?>">