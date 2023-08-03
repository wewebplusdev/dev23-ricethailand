<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<!-- <link href="../css/font-awesome.min.css" rel="stylesheet"/>

<div class="headBackOffice">
   <div class="imgLogo"><a href="../core/index.php"><img src="<?php echo  $core_pathname_crupload ?>/<?php echo  $valPicSystem ?>" height="38" /></a></div>
   <div class="txtLogoLogin">
      <h1 class="titleInner"><?php echo  $valNameSystem ?></h1>
      <h3 class="subtitleInner"><?php echo  $valTitleSystem ?></h3>
   </div>
   <div class="divLogin" >
      <div class="divLogin-img">
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
         <a href="<?php echo  $valLinkViewUser ?>">
            <div style="width:30px; height:30px;  background:url(<?php echo  $valPicProfileTop ?>) center no-repeat; background-size: cover;background-repeat: no-repeat;   "></div>
         </a>
      </div>
      <div class="divLogin-name">
         <a href="<?php echo  $valLinkViewUser ?>"><?php echo  $_SESSION[$valSiteManage . "core_session_name"] ?></a>
      </div>
      <div class="divLogin-btn">
         <a href="javascript:void(0)"onclick="clickInSubMenuTop()" id="showSubMenuTop" title="<?php echo  $langTxt["menu:topmenu"] ?>">
            <span class="fa fa-bars"></span>
         </a>
      </div>
   </div>
</div>

<div class="menuSub" id="divSubMenuTop">
   <div class="menuSubManage" >
      <ul>
         <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
            <li><a href="../core/userManage.php" title="<?php echo  $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?php echo  $langTxt["nav:userManage2"] ?></a></li>
            <li><a href="../core/permisManage.php"  title="<?php echo  $langTxt["nav:perManage2"] ?>"><span class="fa fa-cog"></span><?php echo  $langTxt["nav:perManage2"] ?></a></li><?php } ?>
         <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
            <li><a href="../core/menuManage.php" title="<?php echo  $langTxt["nav:menuManage2"] ?>"><span class="fa fa-list"></span><?php echo  $langTxt["nav:menuManage2"] ?></a></li>
            <li><a href="../core/setting.php" title="<?php echo  $langTxt["nav:setting"] ?>"><span class="fa fa-cogs"></span><?php echo  $langTxt["nav:setting"] ?></a></li><?php } ?>
         <li><a href="javascript:void(0)"onclick="checkLogoutUser();" title="<?php echo  $langTxt["menu:logout"] ?>"><span class="fa fa-sign-out"></span><?php echo  $langTxt["menu:logout"] ?></a></li>
      </ul>
   </div>
</div>

<input id="pathTojs" type="hidden" value="<?php echo  $core_pathname_folderlocal; ?>"> -->
