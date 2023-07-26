// JavaScript Document
// ####################################### Start Setting ################################################# //

function Paging_CheckAll(objCheckHeader, txtCheckBoxFirstName, intTotalItems) {
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            document.getElementById(txtCheckBoxFirstName + i).checked = objCheckHeader.checked;
    return true;
}



function Paging_CheckAllHandle(objCheckHeader, txtCheckBoxFirstName, intTotalItems) {
    var isCheckedAll = true;
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            if (!document.getElementById(txtCheckBoxFirstName + i).checked)
                isCheckedAll = false;
    objCheckHeader.checked = isCheckedAll;
    return true;
}

function Paging_CountChecked(txtCheckBoxFirstName, intTotalItems) {
    var intChecked = 0;
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            if (document.getElementById(txtCheckBoxFirstName + i).checked)
                intChecked++;
    return intChecked;
}

function Paging_CheckedThisItem(objCheckHeader, indexing, txtCheckBoxFirstName, intTotalItems) {
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            if (i == indexing) {
                document.getElementById(txtCheckBoxFirstName + i).checked = true;
            } else {
                document.getElementById(txtCheckBoxFirstName + i).checked = false;
            }
    objCheckHeader.checked = false;
    return true;
}



function popup(pname, purl, w, h, s) {
    LeftPosition = (screen.width) ? (screen.width - w - 8) / 2 : 0;
    TopPosition = (screen.height) ? (screen.height - h - 50) / 2 : 0;
    myWinName = window.open(purl, pname, "width=" + w + ",height=" + h + ",top=" + TopPosition + ",left=" + LeftPosition + ",resizable=yes,scrollbars=" + s);
    if (parseInt(navigator.appVersion) >= 4) {
        myWinName.window.focus();
    }
    return myWinName;
}

function setImageSelected(myPath) {
    window.opener.document.LibraryIconSample.src = myPath;
    window.opener.document.myForm.inputIconName.value = myPath;
    window.close();
}

function isBlank(myObj) {
    if (myObj.value == '') {
        return true;
    }
    return false;
}

function isNumber(myObj) {
    return !isNaN(myObj.value * 1)
}

// ####################################### End Setting ################################################# //
// ####################################### Start Login ################################################# //

// function checkLoginUser() {

//     jQuery.blockUI({
//         message: jQuery('#tallContent'),
//         css: {
//             border: 'none',
//             padding: '35px',
//             backgroundColor: '#000',
//             '-webkit-border-radius': '10px',
//             '-moz-border-radius': '10px',
//             opacity: .9,
//             color: '#fff'
//         }
//     });

//     var TYPE = "POST";
//     var URL = "core/login.php";

//     var dataSet = jQuery("#myFormLogin").serialize();
//     jQuery.ajax({
//         type: TYPE,
//         url: URL,
//         data: dataSet,
//         success: function(html) {
//             jQuery("#loadCheckComplete").show();
//             jQuery("#loadCheckComplete").html(html);
//             setTimeout(jQuery.unblockUI, 200);
//         }
//     });
// }

function checkLogoutUser() {
    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
        
    });

    var TYPE = "POST";
    var URL = "../core/logout.php";
    var dataSet = {};
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}


// ####################################### End Login ################################################# //
// ####################################### Start Top Menu ################################################# //
function clickInSubMenuTop() {
    var divSubMenu = jQuery("#divSubMenuTop");
    divSubMenu.show();
    divSubMenu.animate({ height: '40px' }, 400);
    jQuery('#showSubMenuTop').attr('onclick', 'clickOutSubMenuTop()');

}

function clickOutSubMenuTop() {
    var divSubMenu = jQuery("#divSubMenuTop");
    divSubMenu.animate({ height: '0px' }, 400);
    divSubMenu.hide(0);
    jQuery('#showSubMenuTop').attr('onclick', 'clickInSubMenuTop()');

}
// ####################################### End Top Menu ################################################# //
// ####################################### Start Left Menu ################################################# //
function clickInSubMenuLeft(boxMenu, boxMenuLeft, valHeight) {
    var divSubMenuL = jQuery("#" + boxMenuLeft);
    divSubMenuL.show();
    divSubMenuL.animate({ height: valHeight + 'px' }, 500);
    jQuery("#" + boxMenu).attr("onclick", "clickOutSubMenuLeft('" + boxMenu + "','" + boxMenuLeft + "','" + valHeight + "')");

}

function clickOutSubMenuLeft(boxMenu, boxMenuLeft, valHeight) {
    var divSubMenuL = jQuery("#" + boxMenuLeft);
    divSubMenuL.animate({ height: '0px' }, 500);
    divSubMenuL.hide(0);
    jQuery("#" + boxMenu).attr("onclick", "clickInSubMenuLeft('" + boxMenu + "','" + boxMenuLeft + "','" + valHeight + "')");


}
// ####################################### End Left Menu ################################################# //
// ####################################### Start Home ################################################# //

function boxContantLoad(fileAc) {
    jQuery("#boxWaittingContant").show();

    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myFormHome").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoad").show();
            jQuery("#boxContantLoad").html(html);
            jQuery("#boxWaittingContant").hide();
        }
    });
}


function addContactNew(fileAc) {
    document.myFormHome.action = fileAc;
    document.myFormHome.submit();
}

function editContactNew(fileAc, id) {
    document.myFormHome.action = fileAc;
    document.myFormHome.submit();
}

function sortContactNew(fileAc) {
    document.myFormHome.action = fileAc;
    document.myFormHome.submit();
}


function insertContactNew(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}



function loadDownloadSelectMl(gID, masterkey, tID) {
    //alert('test');
    jQuery("#loadWaitingCategory").show();

    var TYPE = "POST";
    var URL = "../mod_downloadml/load_selectType.php";
    var dataSet = {
        gID: gID,
        masterkey: masterkey,
        tID: tID
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadLevelTypeID").show();
            jQuery("#loadLevelTypeID").html(html)
            jQuery("#loadWaitingCategory").hide();
        }
    });
}


function loadDownloadSelectGroup(gID, masterkey, tID) {
    // alert('test');
    jQuery("#loadWaitingCategory").show();

    var TYPE = "POST";
    var URL = "../mod_cmsgml/load_selectGroup.php";
    var dataSet = {
        gID: gID,
        masterkey: masterkey,
        tID: tID
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadLevelGroupID").show();
            jQuery("#loadLevelGroupID").html(html)
            jQuery("#loadWaitingCategory").hide();
        }
    });
}




function updateContactNew(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function syncContactNew(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}



function delContactNew(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function viewContactNew(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myFormHome").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxContantLoad").show();
            jQuery("#boxContantLoad").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function changeStatus(loaddder, tablename, statusname, statusid, loadderstatus, fileAc) {

    jQuery("#" + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html);
            jQuery("#" + loaddder + "").hide();
        }
    });
}

function changeStatusClass(loaddder, tablename, statusname, statusid, loadderstatus, fileAc) {

    jQuery("." + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("." + loadderstatus + "").show();
            jQuery("." + loadderstatus + "").html(html);
            jQuery("." + loaddder + "").hide();
        }
    });
}


function changeStatusOne(loaddder, tablename, statusname, statusid, loadderstatus, fileAc) {

    jQuery("#" + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html);
            jQuery("#" + loaddder + "").hide();
            location.reload();
        }
    });
}

function changeStatus2(loaddder, tablename, statusname, statusid, loadderstatus, fileAc, mid) {

    jQuery("#" + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc,
        ValueMid: mid
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html);
            jQuery("#" + loaddder + "").hide();
        }
    });
}

function changeStatusHome(loaddder, tablename, statusname, statusid, loadderstatus, fileAc, MasterkeyVal) {

    jQuery("#" + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc,
        ValMasterkey: MasterkeyVal
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html);
            jQuery("#" + loaddder + "").hide();
        }
    });
}

// function changeRibbon(tablename, statusname, statusid, fileAc) {

//     jQuery("#" + loaddder + "").show();

//     var TYPE = "POST";
//     var URL = fileAc;
//     var dataSet = {
//         Valuetablename: tablename,
//         Valuestatusname: statusname,
//         Valuestatusid: statusid,
//         Valuefilestatus: fileAc
//     };


//     jQuery.ajax({type: TYPE, url: URL, data: dataSet,
//         success: function (html) {

//             jQuery("#" + loadderstatus + "").show();
//             jQuery("#" + loadderstatus + "").html(html)
//             jQuery("#" + loaddder + "").hide();
//         }
//     });
// }

function sortingContactNew(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = jQuery("#myForm").serialize();
    //alert(dataSet);
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });

}

function btnBackPage(fileAc) {
    document.myFormHome.action = fileAc;
    document.myFormHome.submit();
}

function btnBackPage_gsub(fileAc) {
	document.myFormHome.inputSearch.value = "";	
	document.myFormHome.module_pageshow.value = "";	
	document.myFormHome.module_pagesize.value = "";	
	document.myFormHome.module_orderby.value = "";	
	document.myFormHome.valEditID.value = "";	
	document.myFormHome.inputLt.value = "";	
	document.myFormHome.inputTh.value = "";	
	
	document.myFormHome.inputAreaResHome.value = "";	
	document.myFormHome.inputResHome.value = "";	
	
    document.myFormHome.action = fileAc;
    document.myFormHome.submit();
}

function btnBackPageRes(fileAc) {
	document.myFormHome.inputSearch.value = "";	
	document.myFormHome.module_pageshow.value = "";	
	document.myFormHome.module_pagesize.value = "";	
	document.myFormHome.module_orderby.value = "";	
	document.myFormHome.inputTypeArea.value = "";	
	document.myFormHome.valEditID.value = "";	
	document.myFormHome.inputLt.value = "";	
	document.myFormHome.inputTh.value = "";	
	document.myFormHome.inputResHome.value = "";	
	document.myFormHome.inputAreaResHome.value = "";	
	document.myFormHome.action = fileAc;
	document.myFormHome.submit();
}

function btnBackPageSea(fileAc) {
	document.myFormHome.inputSearch.value = "";	
	document.myFormHome.module_pageshow.value = "";	
	document.myFormHome.module_pagesize.value = "";	
	document.myFormHome.module_orderby.value = "";	
	document.myFormHome.valEditID.value = "";	
	document.myFormHome.inputLt.value = "";	
	document.myFormHome.inputTh.value = "";	
	document.myFormHome.inputSCID.value = "";	
	document.myFormHome.action = fileAc;
	document.myFormHome.submit();
}


function btnBackPageResUnit(fileAc) {
	document.myFormHome.inputDID.value = "";	
	document.myFormHome.inputSDID.value = "";	
	document.myFormHome.inputAreaHome.value = "";	
	document.myFormHome.inputSearch.value = "";	
	document.myFormHome.module_pageshow.value = "";	
	document.myFormHome.module_pagesize.value = "";	
	document.myFormHome.module_orderby.value = "";	
	document.myFormHome.action = fileAc;
	document.myFormHome.submit();
}

function btnBackPageDmcrUnit(fileAc) {
	document.myFormHome.inputDID.value = "";	
	document.myFormHome.inputSDID.value = "";	
	document.myFormHome.inputAreaHome.value = "";	
	document.myFormHome.inputSearch.value = "";	
	document.myFormHome.module_pageshow.value = "";	
	document.myFormHome.module_pagesize.value = "";	
	document.myFormHome.module_orderby.value = "";	
	document.myFormHome.action = fileAc;
	document.myFormHome.submit();
}

function btnBackPageProvUnit(fileAc) {
	document.myFormHome.inputAreaHome.value = "";	
	document.myFormHome.inputDID.value = "";	
	document.myFormHome.inputSDID.value = "";	
	document.myFormHome.inputTypeArea.value = "";	
	document.myFormHome.inputSearch.value = "";	
	document.myFormHome.module_pageshow.value = "";	
	document.myFormHome.module_pagesize.value = "";	
	document.myFormHome.module_orderby.value = "";	
	document.myFormHome.action = fileAc;
	document.myFormHome.submit();
}



function checkUsermember(username) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../core/checkUser.php";
    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}


function checkUsermemberOA(username) {

    // jQuery.blockUI({
    //     message: jQuery('#tallContent'),
    //     css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
    //     }
    // });

    var TYPE = "POST";
    var URL = "../lib/ActiveDirectory/checkUser.php";
    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({type: TYPE, url: URL, data: dataSet, dataType: "json",
        success: function (result) {
                jQuery("#loadCheckComplete").show();
                if (result.status == true) {
                    jQuery("#inputUserName").removeClass("formInputContantTbAlertY");
                }else{
                    jQuery("#inputUserName").addClass("formInputContantTbAlertY");
                    document.myForm.inputUserName.value = ''
                    document.myForm.inputUserName.focus();
                }
            // jQuery("#loadCheckComplete").show();
            // jQuery("#loadCheckComplete").html(html);
            // setTimeout(jQuery.unblockUI, 200);
        }
    });
}

function checkUsermemberEdit(userid, username) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../core/checkUserEdit.php";
    var dataSet = {
        Valueuserid: userid,
        Valueusername: username
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}

function sortingContactHome(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = jQuery("#myFormSort").serialize();
    //alert(dataSet);
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });

}

function loadContantHome(fileAc, divAc, masterkey, menukeyid) {

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = { masterkey: masterkey, menukeyid: menukeyid };
    //alert(dataSet);
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#" + divAc).show();
            jQuery("#" + divAc).html(html);
        }
    });

}


function delContactHome(fileAc, delID, divAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = { delID: delID };
    //alert(dataSet);
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            jQuery("#" + divAc).remove();
            setTimeout(jQuery.unblockUI, 200);
        }
    });

}


function addContactBox(fileAc, delID, divHide, divShow) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = { delID: delID, divShow: divShow };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            jQuery("#" + divHide).hide();
            jQuery("#" + divShow).show();
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}




function delContactBox(fileAc, delID, divHide, divShow) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = { delID: delID };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            jQuery("#" + divHide).hide();
            jQuery("#" + divShow).show();
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function loadContantLogHome(fileAc) {

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {};
    //alert(dataSet);
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadContantLogHome").show();
            jQuery("#loadContantLogHome").html(html);
        }
    });

}

function delFileUpload(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxFileNew").show();
            jQuery("#boxFileNew").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function delFileUploadUp(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxFileNewUp").show();
            jQuery("#boxFileNewUp").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delFileUploadAlone(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxFileNewAlone").show();
            jQuery("#boxFileNewAlone").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delFileUploadB(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxFileNewBook").show();
            jQuery("#boxFileNewBook").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}



function delFileUploadD(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxFileNew").show();
            jQuery("#boxFileNew").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function delPicUpload(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNew").show();
            jQuery("#boxPicNew").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUpload2(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNew2").show();
            jQuery("#boxPicNew2").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function delIconUpload(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxIconNew").show();
            jQuery("#boxIconNew").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadlogo(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNew2").show();
            jQuery("#boxPicNew2").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


/* function modDeleteFileUpdateEnews(downloadNewID,menuid,contantNewid) {
 
 jQuery("#load_contantfile").show();
 
 var TYPE="POST";
 var URL="../mod_enews/deletefileupdate.php";
 var dataSet={ 
 downloadNewID : downloadNewID,
 menuid : menuid,
 contantNewid : contantNewid
 
 };
 jQuery.ajax({type:TYPE,url:URL,data:dataSet,
 success:function(html){
 
 jQuery("#load_filenew").show();
 jQuery("#load_filenew").html(html)
 jQuery("#load_contantfile").hide();
 }
 }); 
 }*/

function modDeleteFileUpdateEnews(downloadNewID, menuid, contantNewid) {

    /*jQuery.blockUI({
     message: jQuery('#tallContent'),
     css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
     }
     });*/

    // alert(downloadNewID+' : '+ menuid +' '+contantNewid);

    // jQuery("#load_contantfile").show();

    var TYPE = "POST";
    var URL = "../mod_enews/deletefileupdate.php";
    var dataSet = {
        downloadNewID: downloadNewID,
        menuid: menuid,
        contantNewid: contantNewid

    };
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxFileNew").show();
            jQuery("#boxFileNew").html(html)
                //jQuery("#load_contantfile").hide();
        }
    });
}



function delPicUploadVote1(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxVotePicNew1").show();
            jQuery("#boxVotePicNew1").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadVote2(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxVotePicNew2").show();
            jQuery("#boxVotePicNew2").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadVote3(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxVotePicNew3").show();
            jQuery("#boxVotePicNew3").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadVote4(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxVotePicNew4").show();
            jQuery("#boxVotePicNew4").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadIcon(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicIcon").show();
            jQuery("#boxPicIcon").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadSite(fileAc, box) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + box).show();
            jQuery("#" + box).html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadTicket(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNewTicket").show();
            jQuery("#boxPicNewTicket").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function delPicUploadT(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNewT").show();
            jQuery("#boxPicNewT").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}



function delPicUploadMap(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNewMap").show();
            jQuery("#boxPicNewMap").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadC(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNewPic").show();
            jQuery("#boxPicNewPic").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delPicUploadHead(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNewHead").show();
            jQuery("#boxPicNewHead").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delAlbumUpload(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxAlbumNew").show();
            jQuery("#boxAlbumNew").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function delVideoUpload(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxVideoNew").show();
            jQuery("#boxVideoNew").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}




function delColUpload(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxLoadColorShow").show();
            jQuery("#boxLoadColorShow").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}



function delAlbumUploadIn(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxAlbumNewIn").show();
            jQuery("#boxAlbumNewIn").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

function delAlbumUploadOut(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxAlbumNewOut").show();
            jQuery("#boxAlbumNewOut").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


var pathck = '/fileman/index.php';

// ####################################### End Home ################################################# //
// ####################################### Start FCK ################################################# //
function onLoadFCK() {
    
    if (!CKEDITOR.env.ie || CKEDITOR.env.version > 7)
        CKEDITOR.env.isCompatible = true;
    // var roxyFileman = '/fileman/index.html';
    var roxyFileman = pathck;
    CKEDITOR.replace('editDetail', {
        //filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserBrowseUrl: roxyFileman,
        filebrowserImageBrowseUrl: roxyFileman + '?type=image',
        extraPlugins: 'tableresize,tabletools,quicktable',
        removeDialogTabs: 'link:upload;image:upload',
        toolbar: [
            { name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', '-', '-', '-', '-', '-', '-'] },
            { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 'RemoveFormat'] },
            { name: 'editing', groups: ['find', 'selection', 'spellchecker'], items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
            { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
            '/',
            { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', '-'] },
            { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
            '/',
            { name: 'styles', items: ['Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize', '-'] },
            { name: 'others', items: ['-'] },
            { name: 'about', items: ['-'] }
        ]
    });
}

function onLoadFCKSpec() {
    
    if (!CKEDITOR.env.ie || CKEDITOR.env.version > 7)
        CKEDITOR.env.isCompatible = true;
    // var roxyFileman = '/fileman/index.html';
    var roxyFileman = pathck;
    CKEDITOR.replace('editDetailspec', {
        //filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserBrowseUrl: roxyFileman,
        filebrowserImageBrowseUrl: roxyFileman + '?type=image',
        extraPlugins: 'tableresize,tabletools,quicktable',
        removeDialogTabs: 'link:upload;image:upload',
        toolbar: [
            { name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', '-', '-', '-', '-', '-', '-'] },
            { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 'RemoveFormat'] },
            { name: 'editing', groups: ['find', 'selection', 'spellchecker'], items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
            { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
            '/',
            { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', '-'] },
            { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
            '/',
            { name: 'styles', items: ['Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize', '-'] },
            { name: 'others', items: ['-'] },
            { name: 'about', items: ['-'] }
        ]
    });
}

function onLoadFCKStore() {
    
    if (!CKEDITOR.env.ie || CKEDITOR.env.version > 7)
        CKEDITOR.env.isCompatible = true;
    // var roxyFileman = '/fileman/index.html';
    var roxyFileman = pathck;
    CKEDITOR.replace('editDetailstore', {
        //filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserBrowseUrl: roxyFileman,
        filebrowserImageBrowseUrl: roxyFileman + '?type=image',
        extraPlugins: 'tableresize,tabletools,quicktable',
        removeDialogTabs: 'link:upload;image:upload',
        toolbar: [
            { name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', '-', '-', '-', '-', '-', '-'] },
            { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 'RemoveFormat'] },
            { name: 'editing', groups: ['find', 'selection', 'spellchecker'], items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
            { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
            '/',
            { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', '-'] },
            { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', '-', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
            '/',
            { name: 'styles', items: ['Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize', '-'] },
            { name: 'others', items: ['-'] },
            { name: 'about', items: ['-'] }
        ]
    });
}




// ####################################### End FCK ################################################# //


// ####################################### Start FCK ################################################# //
function onLoadFCKMini() {
    if (!CKEDITOR.env.ie || CKEDITOR.env.version > 7)
        CKEDITOR.env.isCompatible = true;
    var roxyFileman = pathck;
    // var roxyFileman = '/fileman/index.html';
    CKEDITOR.replace('editDetail', {
        //filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserUploadUrl: "../../ckeditor/ckupload.php",
        filebrowserBrowseUrl: roxyFileman,
        filebrowserImageBrowseUrl: roxyFileman + '?type=image',
        extraPlugins: 'tableresize,tabletools,quicktable',
        removeDialogTabs: 'link:upload;image:upload',
        toolbar: [
            { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', '-', '-', '-', '-', '-'] },
            { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', '-', '-', '-', '-', '-', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', '-', '-', '-'] },
            { name: 'insert', items: ['-', '-', '-', '-', 'Smiley', '-', '-', '-'] },
            { name: 'styles', items: ['-', 'FontSize'] },
            { name: 'tools', items: ['-', '-'] },
            { name: 'others', items: ['-'] },
            { name: 'about', items: ['-'] }
        ],
        height: '150px'
    });
}

function submitResetFck() {
    CKEDITOR.instances.editDetail.setData("");
}

// ####################################### End FCK ################################################# //


function changeStatusSlae(cID, valueID, filestatus) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../" + filestatus + "";

    var dataSet = {
        cID: cID,
        valueID: valueID

    };
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function loadShowPhotoUpdate(fileAc, boxLoad) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();
    // alert(dataSet);
    // alert(URL);
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            // alert(html);
            jQuery("#" + boxLoad).show();
            jQuery("#" + boxLoad).html(html);

            setTimeout(jQuery.unblockUI, 200);

        }
    });
}



function delFileImportUpload(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxAlbumNew").show();
            jQuery("#boxAlbumNew").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function getValueFileShow(valFileInPic, boxInputPics) {
    jQuery("#" + boxInputPics).html(valFileInPic);
}


function cancelWebservicesBooking(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../" + fileAc + "";

    var dataSet = jQuery("#myForm").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}


function changeStatusApprove(fileAc, loadderstatus) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../" + fileAc + "";
    //alert(URL);
    var dataSet = jQuery("#myFormHome").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}

function showPartManre() {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "loadSelectPart.php";

    var dataSet = jQuery("#myForm").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxPart").show();
            jQuery("#boxPart").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}


// ####################################### Start Price ################################################# //
function getPriceCountry(id, fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });
    var TYPE = "POST";
    var URL = "../" + fileAc + "";

    var dataSet = { id: id };
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            if (html) {
                jQuery("#loadPriceNew").html(html);
            } else {
                jQuery("#loadPriceNew").html(" - ");
            }
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}

// ####################################### End Price ################################################# //

function number_format(number, decimals, dec_point, thousands_sep) {
    var exponent = "";
    var numberstr = number.toString();
    var eindex = numberstr.indexOf("e");
    if (eindex > -1) {
        exponent = numberstr.substring(eindex);
        number = parseFloat(numberstr.substring(0, eindex));
    }
    if (decimals != null) {
        var temp = Math.pow(10, decimals);
        number = Math.round(number * temp) / temp;
    }
    var sign = number < 0 ? "-" : "";
    var integer = (number > 0 ? Math.floor(number) : Math.abs(Math.ceil(number))).toString();
    var fractional = number.toString().substring(integer.length + sign.length);
    dec_point = dec_point != null ? dec_point : ".";
    fractional = decimals != null && decimals > 0 || fractional.length > 1 ? (dec_point + fractional.substring(1)) : "";
    if (decimals != null && decimals > 0) {
        for (i = fractional.length - 1, z = decimals; i < z; ++i) {
            fractional += "0";
        }
    }
    thousands_sep = (thousands_sep != dec_point || fractional.length == 0) ? thousands_sep : null;
    if (thousands_sep != null && thousands_sep != "") {
        for (i = integer.length - 3; i > 0; i -= 3) {
            integer = integer.substring(0, i) + thousands_sep + integer.substring(i);
        }
    }
    return sign + integer + fractional + exponent;
}

function addonname(typeticket, idticket, type, num = 1) {
    if (type == "new") {

        var html = '<div class="tickets-list ticketId-' + idticket + '">';
        html += '<div class="tickets-list-title">';
        html += 'Name in Ticket - ' + typeticket;
        html += '</div>';
        html += '<hr>';

        html += '<div class="row listPeople-' + idticket + '">';

        html += '<div class="col-md-12 listpeopleadd">';
        html += '<div class="input-group">';
        html += '<input value="" class="form-control" name="ticket[' + idticket + '][nameaddon][]" id="" placeholder="Name" type="text">';
        html += '<div class="input-group-addon">';
        html += '    <i class="fa fa-user faaddon" aria-hidden="true"></i>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        if (num > 1) {
            html += addonname(typeticket, idticket, "add", num - 1);
        }

        html += ' </div>';
        html += ' </div>';
        html += ' </div>';

    } else {
        var html = "";

        for (var i = 0; i < num; i++) {
            html += '<div class="col-md-12 listpeopleadd">';
            html += '<div class="input-group">';
            html += '<input value="" class="form-control" name="ticket[' + idticket + '][nameaddon][]" id="" placeholder="Name" type="text">';
            html += '<div class="input-group-addon">';
            html += '    <i class="fa fa-user faaddon" aria-hidden="true"></i>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        }

    }
    return html;
}



function boxContantLoadPlan(fileAc) {
    jQuery("#boxWaittingContant").show();

    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoadPlan").show();
            jQuery("#boxContantLoadPlan").html(html);
            jQuery("#boxWaittingContant").hide();
        }
    });
}


function boxContantLoadBanner(fileAc) {
    jQuery("#boxWaittingContant").show();

    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoadBanner").show();
            jQuery("#boxContantLoadBanner").html(html);
            jQuery("#boxWaittingContant").hide();
        }
    });
}

function boxContantLoadContact(fileAc) {
    jQuery("#boxWaittingContant").show();

    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoadContact").show();
            jQuery("#boxContantLoadContact").html(html);
            jQuery("#boxWaittingContant").hide();
        }
    });
}

//boxContantLoadinfo

function boxContantLoadInfo(fileAc) {
    jQuery("#boxWaittingContant").show();

    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoadinfo").show();
            jQuery("#boxContantLoadinfo").html(html);
            jQuery("#boxWaittingContant").hide();
        }
    });
}


function changeStatusShow(loaddder, tablename, statusname, statusid, loadderstatus, fileAc) {

    jQuery("#" + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html)
            jQuery("#" + loaddder + "").hide();
        }
    });
}

function changeStatusBooking(contactid, waitid, groupid) {

    jQuery("#" + waitid + "").show();

    var TYPE = "POST";

    var URL = "../mod_calendar/load_changeGroup.php";
    var dataSet = {
        contactid: contactid,
        groupid: groupid
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#errorID").show();
            jQuery("#errorID").html(html);
            jQuery("#" + waitid + "").hide();
        }
    });
}


function loadGroupSelect(gID, masterkey, tID) {
    // alert("cccc");

    jQuery("#loadWaitingCategory").show();

    var TYPE = "POST";
    var URL = "../mod_name/openSelectSub.php";
    var dataSet = {
        gID: gID,
        masterkey: masterkey,
        tID: tID
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadLevelTypeID").show();
            jQuery("#loadLevelTypeID").html(html)
            jQuery("#loadWaitingCategory").hide();
        }
    });
}



function randomString() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var string_length = 8;
    var randomstring = '';
    for (var i = 0; i < string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum, rnum + 1);
    }
    return randomstring;
}


function insertCommentBlog() {

    jQuery("#loadWaitComment").show();

    var TYPE = "POST";
    var URL = "../mod_blog/blogComment.php";

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxMailContact").show();
            jQuery("#boxMailContact").html(html);
            jQuery("#loadWaitComment").hide();

        }
    });
}

//boxMailContact

function loadBoxCommentAll(cID, masterkey) {
    jQuery("#loadWaitComment").show();

    var TYPE = "POST";
    var URL = "../mod_blog/loadComment.php";

    var dataSet = {
        cID: cID,
        masterkey: masterkey
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxMailContact").show();
            jQuery("#boxMailContact").html(html);
            jQuery("#loadWaitComment").hide();
        }
    });
}


function modDeleteComment(commentid, filehide, qid) {

    jQuery("#loadWaitComment").show();

    var TYPE = "POST";
    var URL = "../mod_blog/deleteComment.php";
    var dataSet = {
        commentid: commentid,
        qid: qid
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#" + filehide).hide();
            jQuery("#boxMailContact").show();
            jQuery("#boxMailContact").html(html);
            jQuery("#loadWaitComment").hide();
        }
    });

}



function modDeleteComment1(commentid, filehide, qid) {

    jQuery("#loadWaitComment").show();

    var TYPE = "POST";
    var URL = "../mod_vdoGroup/deleteComment.php";
    var dataSet = {
        commentid: commentid,
        qid: qid
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#" + filehide).hide();
            jQuery("#boxMailContact").show();
            jQuery("#boxMailContact").html(html);
            jQuery("#loadWaitComment").hide();
        }
    });

}

function loadBoxCommentAll1(cID, masterkey) {
    jQuery("#loadWaitComment").show();

    var TYPE = "POST";
    var URL = "../mod_vdoGroup/loadComment.php";

    var dataSet = {
        cID: cID,
        masterkey: masterkey
    };

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxMailContact").show();
            jQuery("#boxMailContact").html(html);
            jQuery("#loadWaitComment").hide();
        }
    });
}

function insertCommentBlog1() {

    jQuery("#loadWaitComment").show();

    var TYPE = "POST";
    var URL = "../mod_vdoGroup/blogComment.php";

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxMailContact").show();
            jQuery("#boxMailContact").html(html);
            jQuery("#loadWaitComment").hide();

        }
    });
}



function changeStatusPage(loaddder, tablename, statusname, statusid, loadderstatus, fileAc, idpage) {

    jQuery("#" + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc,
        ValuePageset: idpage,
    };


    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#" + loadderstatus + "").show();
            jQuery("#" + loadderstatus + "").html(html)
            jQuery("#" + loaddder + "").hide();
        }
    });
}



// pin
function changeDefaultType(loaddder, statusid, tablename, statusname, masterkey, loadderstatus, fileAc, valdiv) {
    jQuery("." + loaddder + "").show();

    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {
        Valueloaddder: loaddder,
        Valuetablename: tablename,
        Valuestatusname: statusname,
        Valuestatusid: statusid,
        Valueloadderstatus: loadderstatus,
        Valuefilestatus: fileAc,
        Valuemasterkey: masterkey,
        Valuediv: valdiv
    };

    // console.log(dataSet);

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        dataType: "json",
        success: function(result) {
            // console.log('test');
            $.each(result, function(i, field) {
                //   list = field.toString().replace(/\\/g, "/");
                // console.log(valdiv + ' ' + i);
                // console.log(field);


                jQuery("#" + valdiv + i + "").show();
                jQuery("#" + valdiv + i + "").html(field);
                //  jQuery("#" + valdiv + i + "").html("test");

                jQuery("." + loaddder + "").hide();
            });


        }
    });
}

function loadpageover(fileAc) {
    document.myFormHome.action = fileAc;
    document.myFormHome.submit();
}

// function directTo(fileAc){
//     $().redirect('fileAc', );
// }
function delPicUpload2(fileAc) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });


    var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#boxPicNew2").show();
            jQuery("#boxPicNew2").html(html);
            setTimeout(jQuery.unblockUI, 200);

        }
    });
}

// function navBarGoto(params='',value=''){
    
//     if($('form#myForm #inputNavBar').length == 0){
//         $('form#myForm').append('<input type="hidden" id="inputNavBar" />')
//     }
//     console.log(params);
//     console.log(value);
//     $('#inputNavBar').val(value).removeAttr('name').attr('name',params);
//     $('form#myForm').submit();
// }

function navBarGoto(params='',value='') {
    document.myFormHome.inputEqual.value = value;
    document.myFormHome.submit();
}

function btnBackPageSubPage(fileAc) {
	document.myFormHome.module_pageshow.value = "";	
	document.myFormHome.module_pagesize.value = "";	
	document.myFormHome.module_orderby.value = "";	
	document.myFormHome.action = fileAc;
	document.myFormHome.submit();
}

// START REGISTER DMSC KIS
function submitregister(){
    // var base_url = window.location.origin;
    // var pathArray = window.location.pathname.split( '/' );
    // // console.log(base_url+'/'+pathArray[1]+'/register.php');
    // window.location.href = base_url+'/'+pathArray[1]+'/register.php';
    window.location.href = './user_action/register.php';
}

function goBack() {
    window.history.back();
}

function CheckPassword(inputtxt){ 
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
	if(inputtxt.value.match(passw)) { 
		return true;
	}else{ 
		return false;
	}
}

function nextstep() {
    if($('#inputUserName').val() === ""){
        $('#inputUserName').focus();
        return false;
    }
    if ($('#inputPass').val() === "") {
        $('#inputPass').focus();
        return false;
    }
	
	if (!CheckPassword(document.myForm.inputPass)) {
		$('#inputPass').focus();
		$('#notePass').css("color", "red")
		return false;
	}else{
		$('#notePass').css("color", "#8496aa")
	}
	 
    if ($('#inputRePass').val() === "") {
        $('#inputRePass').focus();
        return false;
    }
	
	if (!CheckPassword(document.myForm.inputRePass)) {
		$('#inputRePass').focus();
		$('#noteRePass').css("color", "red")
		return false;
	}else{
		$('#noteRePass').css("color", "#8496aa")
	}

	if ($('#inputRePass').val() != $('#inputPass').val()) {
        $('#inputPass').focus();
        return false;
    }
    const email = $("#inputEmail").val();
    if(!validateEmail(email)){
        $('#inputEmail').focus();
        return false;
    }
    if ($('#inputgroupAgency').val() === "" || $('#inputgroupAgency').val() == 0) {
        $('#inputgroupAgency').focus();
        return false;
    }
    $('.form-sectionOne').hide();
    $('.form-sectionTwo').show();
    $('.float-right').html('2/2');
}
function backstep(){
    $('.form-sectionOne').show();
    $('.form-sectionTwo').hide();
    $('.float-right').html('1/2');
}
function checkUsermemberRegister(username) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../core/checkUser.php";
    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}
function checkUserEmailRegister(username) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../core/checkEmail.php";
    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}
function checkUserEmailEdit(username) {
    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "../core/checkEmail_tmp.php";
    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}
function checkreCapcha(username) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "./registerUser.php";
    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}
function backLogin(){
    // var base_url = window.location.origin;
    // var pathArray = window.location.pathname.split( '/' );
    // // console.log(base_url);
    // // console.log(pathArray);
    // // console.log(base_url+'/'+pathArray[1]+'/'+pathArray[2]);
    // window.location.href = base_url+'/'+pathArray[1]+'/'+pathArray[2];
    window.location.href = '../index.php';
}
function btnBackPageLogin(fileAc) {
    window.location.href = fileAc;
}
function forGetPass(){
    // var base_url = window.location.origin;
    // var pathArray = window.location.pathname.split( '/' );
    // // console.log(base_url+'/'+pathArray[1]+'/core/forgetpass.php');
    // window.location.href = base_url+'/'+pathArray[1]+'/core/forgetpass.php';
    window.location.href = './user_action/forgetpass.php';
}
function forGetPassAjax(username) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "./forgetpassSend.php";
    var dataSet = jQuery("#myForm").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

// recapcha img
var path = $("base").attr("href");
function loadNewCaptchaFit() {
    jQuery("#captcha").load("captcha/captchaShow.php?" + new Date().getTime());
}
function loadNewCaptchaFoeget() {
    jQuery("#captcha").load("../captcha2/captchaShow.php?" + new Date().getTime());
}
// recapcha img
// END REGISTER DMSC KIS


// NEW LOGIN BY BONZ 20/07/2023
function checkLoginUser() {
    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "core/login.php";

    var dataSet = jQuery("#myFormLogin").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(res) {
            $('#loadAlertLogin').hide();
            if (res?.status) {
                if (res?.item.length > 0) {
                    $('.select-site').hide();
                    $('.show-site').show();

                    let strHTML = "";
                    res.item.forEach(value => {
                        strHTML += `
                        <div class="cover click-item2">
                            <a href="javascript:void(0);" class="link click-item" data-id="${value.id}">
                                <img src="${value.pic}" alt="${value.subject}" class="click-item3">
                                <div class="desc">${value.subject}</div>
                            </a>
                        </div>
                        `;
                    });
                    $('.wg-item').html(strHTML);

                    // on load for event click
                    $( ".click-item" ).on( "click", function() {
                        auth_site($(this).data('id'));
                    });
                }else{
                    $('#loadAlertLogin #text-append').text('Something went wrong.');
                    $('#loadAlertLogin').show();
                }
            }else{
                let msg = res?.msg ? res?.msg : 'api error.';
                $('#loadAlertLogin #text-append').text(msg);
                $('#loadAlertLogin').show();
            }
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}

function auth_site(site_id){

    $('#inputSite').val(site_id);

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });

    var TYPE = "POST";
    var URL = "core/login_auth.php";
    var dataSet = jQuery("#myFormLogin").serialize();

    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(res) {

            if (res?.status) {
                if (res?.url) {
                    // console.log(res.url);
                    window.location.href = res.url;
                }else{

                }
            }else{

            }
            setTimeout(jQuery.unblockUI, 200);
        }
    });
}

// $('.click-item').on('click', function() {
//     console.log($(this));
// })

// $('.click-item2').on('click', () => {
//     console.log($(this));
// })