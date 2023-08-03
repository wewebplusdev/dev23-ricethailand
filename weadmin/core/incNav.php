<div class="divRightNav">
<?php if($valClassNav==1){?>
    <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
    <tr>
    <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><?php echo $valNav1?></span></td>
    <td  class="divRightNavTb" align="right"><?php echo DateFormat(date('d-m-Y h:i:s'))?></td>
    </tr>
    </table>
    <?php }else{?>
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $valNav2?></span></td>
                        <td  class="divRightNavTb" align="right">
                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
  <tr>
    <td align="right"><input name="" type="text"  class="inputContantTb"/></td>
    <td align="right"><img src="../img/btn/search.png" align="absmiddle" /></td>
  </tr>
</table>

                        
                        </td>
                        </tr>
                        </table>
    <?php }?>
</div>