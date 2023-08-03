<div class="navControl">

   <div class="divLeftMenu-header">
      <div class="logo">
         <a href="../core/index.php"><img src="<?php echo  $core_pathname_crupload ?>/<?php echo  $valPicSystem ?>" height="38" /></a>
      </div>
      <div class="inner">
         <h1 class="title" style="font-size: 11px;"><?php echo  $valNameSystem ?></h1>
         <!-- <h3 class="desc">Website Management System</h3> -->
         <!-- <h1 class="title"><?php echo  $valNameSystem ?></h1> -->
         <!-- <h3 class="desc"><?php echo  $valTitleSystem ?></h3> -->
      </div>
   </div>

   <div  class="divLeftMenu" >
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="divLeftMenuTb">
         <tr>
             <!-- <td width="31"  align="left" valign="top">
                 <img src="../img/iconmenu/1283582620_045.png" width="16" height="16" />
             </td> -->
            <td align="left" valign="top">
               <a href="../core/index.php" title="<?php echo  $langTxt["nav:home2"] ?>">
                  <!-- <span class="fa"><img src="../img/iconmenu/1283582620_045.png" /></span> -->
                  <span class="feather icon-home"></span>
                  <?php echo  $langTxt["nav:home2"] ?>
               </a>
            </td>
         </tr>
      </table>
   </div>

   <?php
   $sql_open = "SELECT  " . $core_tb_menu . "_parentid FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_id='" . $menukeyid . "' AND " . $core_tb_menu . "_status='Enable'  AND ( " . $core_tb_menu . "_hidden!='Disable' or " . $core_tb_menu . "_hidden is null ) ORDER BY " . $core_tb_menu . "_order ASC ";
   $query_open = wewebQueryDB($coreLanguageSQL, $sql_open);
   $Row_open = wewebFetchArrayDB($coreLanguageSQL, $query_open);
   $status_open = $Row_open[0];

   $sql = "SELECT * FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_parentid='0'  AND " . $core_tb_menu . "_status='Enable'  AND ( " . $core_tb_menu . "_hidden!='Disable' or " . $core_tb_menu . "_hidden is null )  ORDER BY " . $core_tb_menu . "_order ASC ";
   //echo $sql;
   $query = wewebQueryDB($coreLanguageSQL, $sql);

   $RecordCount = wewebNumRowsDB($coreLanguageSQL, $query);

   //print_pre($RecordCount);

   if ($RecordCount >= 1) {

      while ($RowMenu = wewebFetchArrayDB($coreLanguageSQL, $query)) {
         // print_pre($RowMenu);
         $masterkeyName = $RowMenu[$core_tb_menu . "_masterkey"];
         $myUserID = $_SESSION[$valSiteManage . "core_session_groupid"];
         $myMenuID = $RowMenu[$core_tb_menu . "_id"];
         $permissionID = getUserPermissionOnMenu($myUserID, $myMenuID);

         if ($RowMenu[$core_tb_menu . "_moduletype"] == "Module") {
            $linkFileTo = $RowMenu[$core_tb_menu . "_linkpath"] . "?masterkey=" . $masterkeyName . "&amp;menukeyid=" . $myMenuID;
            $linkTaget = "_self";
         } else if ($RowMenu[$core_tb_menu . "_moduletype"] == "Link") {
            $linkFileTo = $RowMenu[$core_tb_menu . "_linkpath"];
            $linkTaget = "_blank";
         }

         if ($permissionID != "NA" || $_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
               $txt_menu_lan = $RowMenu[$core_tb_menu . "_namethai"];
            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
               $txt_menu_lan = $RowMenu[$core_tb_menu . "_nameeng"];
            }

            if ($RowMenu[$core_tb_menu . "_moduletype"] == "Group") {
               $ParentID = $RowMenu[$core_tb_menu . "_id"];

               $sql2 = "SELECT * FROM " . $core_tb_menu . " INNER JOIN " . $core_tb_permission . " ON " . $core_tb_menu . "." . $core_tb_menu . "_id =" . $core_tb_permission . "." . $core_tb_permission . "_menuid  WHERE " . $core_tb_menu . "_parentid='" . $ParentID . "'   AND " . $core_tb_menu . "_status='Enable'  AND ( " . $core_tb_menu . "_hidden!='Disable' or " . $core_tb_menu . "_hidden is null )  AND " . $core_tb_permission . "_perid='" . $_SESSION[$valSiteManage . 'core_session_groupid'] . "' AND " . $core_tb_permission . "_permission!='NA' ORDER BY " . $core_tb_menu . "_order ASC ";
               $query2 = wewebQueryDB($coreLanguageSQL, $sql2);

               $RecordCountSub = wewebNumRowsDB($coreLanguageSQL, $query2);
               $valHeightSub = $core_height_leftmenu * $RecordCountSub;
               if ($status_open == $myMenuID) {
                  $valOpenNewMenu = "divLeftMenuOverNew";
                  $valNavImgNew = "../img/btn/navOpen.png";
               } else {
                  $valOpenNewMenu = "divLeftMenu";
                  $valNavImgNew = "../img/btn/nav.png";
               }
               ?>
               <div  class="<?php echo  $valOpenNewMenu ?>" id="boxMenuLeftShow<?php echo  $ParentID ?>" <?php if ($status_open == $ParentID) { ?>onclick="clickOutSubMenuLeft('boxMenuLeftShow<?php echo  $ParentID ?>', 'boxSubMenuLeftShow<?php echo  $ParentID ?> ', ' <?php echo  $valHeightSub ?>')"<?php } else { ?>onclick="clickInSubMenuLeft('boxMenuLeftShow<?php echo  $ParentID ?>', 'boxSubMenuLeftShow<?php echo  $ParentID ?>', '<?php echo  $valHeightSub ?>')"<?php } ?> style="cursor:pointer; width: 100%;">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="divLeftMenuTb">
                     
                     <tr>
                         <!-- <td width="31"  align="left" valign="top">
                        <?php if ($RowMenu[$core_tb_menu . "_icon"]) { ?><img src="<?php echo  $RowMenu[$core_tb_menu . "_icon"] ?>" border="0" align="absmiddle"  /><?php
                        } else {
                           echo " - ";
                        }
                        ?>
                         </td> -->
                        <td align="left" valign="top">
                           <a href="javascript:void(0)"  class="<?php if ($status_open == $myMenuID) { ?>fontContantB<?php } else { ?><?php } ?>">
                              
                              <?php if($RowMenu[$core_tb_menu . "_icontype"] == 1  || $RowMenu[$core_tb_menu . "_icontype"] == ""){ ?>
                                <span class="feather">
                                    <?php if ($RowMenu[$core_tb_menu . "_icon"]) { ?><img src="<?php echo  $RowMenu[$core_tb_menu . "_icon"] ?>" border="0" align="absmiddle"  /><?php
                                    } else {
                                        echo " - ";
                                    }
                                    ?>  
                                </span>
                                <?php }else{ ?>
                                    <span class="feather <?php echo $RowMenu[$core_tb_menu . "_classname"]; ?>"></span>
                                <?php } ?>
                              <?php echo  $txt_menu_lan ?>
                              <span class="feather icon-chevron-down"></span>
                           </a>
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="clearAll"></div>
               <div   <?php if ($status_open == $ParentID) { ?><?php } else { ?>style="height:0px;display:none;"<?php } ?>  id="boxSubMenuLeftShow<?php echo  $ParentID ?>" class="divmenu">
                  <?php
                  if ($RecordCountSub >= 1) {
                     ?>
                     <!--                    <div class="divLeftSubMenuEnd"></div>
                     -->                        <?php
                     while ($RowSub = wewebFetchArrayDB($coreLanguageSQL, $query2)) {

                        $masterkeyName = $RowSub[$core_tb_menu . "_masterkey"];
                        $myUserID = $_SESSION[$valSiteManage . "core_session_groupid"];
                        $myMenuID = $RowSub[$core_tb_menu . "_id"];
                        $permissionID = getUserPermissionOnMenu($myUserID, $myMenuID);

                        if ($RowSub[$core_tb_menu . "_moduletype"] == "Module") {
                           $linkFileTo = $RowSub[$core_tb_menu . "_linkpath"] . "?masterkey=" . $masterkeyName . "&amp;menukeyid=" . $myMenuID;
                           $linkTaget = "_self";
                        } else if ($RowSub[$core_tb_menu . "_moduletype"] == "Link") {
                           $linkFileTo = $RowSub[$core_tb_menu . "_linkpath"];
                           $linkTaget = "_blank";
                        }


                        if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                           $txt_menu_sublan = $RowSub[$core_tb_menu . "_namethai"];
                        } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                           $txt_menu_sublan = $RowSub[$core_tb_menu . "_nameeng"];
                        }

                        if ($permissionID != "NA" || $_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                           ?>
                           <div  class="<?php if ($menukeyid == $myMenuID) { ?>divLeftSubMenuOver<?php } else { ?>divLeftSubMenu<?php } ?>"  >
                              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="divLeftSubMenuTb">
                                 <tr>
                                     <!-- <td width="31"  align="left" valign="top">
                                          <?php if($RowMenu[$core_tb_menu . "_icontype"] == 1 || $RowMenu[$core_tb_menu . "_icontype"] == ""){ ?>
                                          <span class="feather">
                                                <?php if ($RowMenu[$core_tb_menu . "_icon"]) { ?><img src="<?php echo  $RowMenu[$core_tb_menu . "_icon"] ?>" border="0" align="absmiddle"  /><?php
                                                } else {
                                                   echo " - ";
                                                }
                                                ?>  
                                          </span>
                                          <?php }else{ ?>
                                                <span class="feather <?php echo $RowMenu[$core_tb_menu . "_classname"]; ?>"></span>
                                          <?php } ?>
                                     </td>  -->
                                    <td align="left" valign="top">
                                       <a href="<?php echo  $linkFileTo ?>" target="<?php echo  $linkTaget ?>" class="<?php if ($menukeyid == $myMenuID) { ?>fontContantSubMenu<?php } else { ?><?php } ?>" >
                                          <?php echo  $txt_menu_sublan ?>
                                       </a>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                           <div class="clearAll"></div>
                           <?php
                        } // End if permission Sub Group
                     } //End  while  Sub Group
                  }  // End else Sub Group
                  ?>
               </div>
               <div class="clearAll"></div>

            <?php } else { ?>
               <div  class="<?php if ($menukeyid == $myMenuID) { ?>divLeftMenuOver<?php } else { ?>divLeftMenu<?php } ?>">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="<?php if ($menukeyid == $myMenuID) { ?><?php } else { ?>divLeftMenuTb<?php } ?>">
                     <tr>
                         <!-- <td width="31"  align="left" valign="top">
                        <?php if ($RowMenu[$core_tb_menu . "_icon"]) { ?><img src="<?php echo  $RowMenu[$core_tb_menu . "_icon"] ?>" border="0" align="absmiddle"  /><?php
                        } else {
                           echo " - ";
                        }
                        ?>
                         </td> -->
                        <td align="left" valign="top">
                           <a href="<?php echo  $linkFileTo ?>" target="<?php echo  $linkTaget ?>" class="<?php if ($menukeyid == $myMenuID) { ?>fontContantB<?php } else { ?><?php } ?>">
                              
                              <?php if($RowMenu[$core_tb_menu . "_icontype"] == 1  || $RowMenu[$core_tb_menu . "_icontype"] == ""){ ?>
                                <span class="feather">
                                    <?php if ($RowMenu[$core_tb_menu . "_icon"]) { ?><img src="<?php echo  $RowMenu[$core_tb_menu . "_icon"] ?>" border="0" align="absmiddle"  /><?php
                                    } else {
                                        echo " - ";
                                    }
                                    ?>  
                                </span>
                                <?php }else{ ?>
                                    <span class="feather <?php echo $RowMenu[$core_tb_menu . "_classname"]; ?>"></span>
                                <?php } ?>
                              <?php echo  $txt_menu_lan ?>
                           </a>
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="clearAll"></div>
               <?php
            } // End else Group
         } // End if permission
      } // End  while
   } // End if >=1
   ?>
   <!-- <div  class="divLeftMenu">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="divLeftMenuTb">
         <tr>
            <td align="left" valign="top">
               <a href="javascript:void(0)"onclick="checkLogoutUser();" title="<?php echo  $langTxt["menu:logout"] ?>">
                  <span class="fa"><img src="../img/iconmenu/1283582582_150.png" /></span>
                  <?php echo  $langTxt["menu:logout"] ?>
               </a>
            </td>
         </tr>
      </table>
   </div> -->
   <div class="clearAll"></div>
   <div style="height:100px; display: block !important;"></div>


   <div class="divLeftMenu-footer">
      <div class="divLogin dropdown">
         <a href="javascript:void(0)" data-toggle="dropdown" title="<?php echo  $langTxt["menu:topmenu"] ?>">
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
               <div style="width:30px; height:30px;  background:url(<?php echo  $valPicProfileTop ?>) center no-repeat; background-size: cover;background-repeat: no-repeat;   "></div>
            </div>
            <div class="divLogin-name">
               <?php echo  $_SESSION[$valSiteManage . "core_session_name"] ?>
            </div>
            <div class="divLogin-btn">
               <span class="feather icon-more-vertical"></span>
            </div>
         </a>
         <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo  $valLinkViewUser ?>"><span class="fa fa-sign-out"></span>ข้อมูลผู้ใช้งาน</a></li>
            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
               <li><a href="../core/userManage.php" title="<?php echo  $langTxt["nav:userManage2"] ?>"><span class="fa fa-user"></span><?php echo  $langTxt["nav:userManage2"] ?></a></li>
               <li><a href="../core/permisManage.php"  title="<?php echo  $langTxt["nav:perManage2"] ?>"><span class="fa fa-cog"></span><?php echo  $langTxt["nav:perManage2"] ?></a></li><?php } ?>
            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
               <li><a href="../core/menuManage.php" title="<?php echo  $langTxt["nav:menuManage2"] ?>"><span class="fa fa-list"></span><?php echo  $langTxt["nav:menuManage2"] ?></a></li>
               <li><a href="../core/setting.php" title="<?php echo  $langTxt["nav:setting"] ?>"><span class="fa fa-cogs"></span><?php echo  $langTxt["nav:setting"] ?></a></li><?php } ?>
            <li class="logout"><a href="javascript:void(0)"onclick="checkLogoutUser();" title="<?php echo  $langTxt["menu:logout"] ?>"><span class="fa fa-sign-out"></span><?php echo  $langTxt["menu:logout"] ?></a></li>
         </ul>
      </div>
   </div>



</div>