<section class="site-container">
        <div class="navbars-active" data-id="{$NavbarsActive}"></div>
        {* {$callNewsDetailData|print_pre} *}
        {if $callNewsDetailData->fields.picg neq ''}
            <div class="default-header" style="background-image:url({$callNewsDetailData->fields.picg|fileinclude:"pictures":{$callNewsDetailData->fields.masterkey}:"link"}{$setVersionTemp})">
        {else}
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-news.jpg)">
        {/if}
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">{$callNewsDetailData->fields.subjectg}</h1>
                            <p class="desc">{$settingpage.subjecten}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-block">
                <div class="container">
                    <div class="row row-0">
                        <div class="col">
                            <ol class="breadcrumb" data-aos="fade-up">
                                <li><a class="link" href="{$ul}/home"><span class="fa fa-home"></span> หน้าแรก</a></li>
                                <li><a class="link" href="{$ul}/{$menuActive}/{$callNewsDetailData->fields.idg}{$search}">{$callNewsDetailData->fields.subjectg}</a></li>
                                <li class="active">{$callNewsDetailData->fields.subject}</li>
                            </ol>
                        </div>
                        <div class="col-auto">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-head -search-filter">
                <div class="container">
                    <div class="box-content" data-aos="fade-up">
                        <div class="inner">
                            <div class="ojb-box-clip">
                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                            </div>
                            <form action="{$ul}/news/{$callNewsDetailData->fields.idg}" name="myForm" id="myForm" class="form-default">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">รายปีงบประมาณ</label>
                                        <input class="form-control" name="searchYear" type="text" value="{if $searchYear neq ''}{$searchYear}{/if}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">รายหน่วยงาน</label>
                                        <input class="form-control" name="searchAgency" type="text" value="{if $searchAgency neq ''}{$searchAgency}{/if}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">วันที่เริ่มต้น</label>
                                        <input class="form-control datepicker" name="searchSdate" type="text" value="{if $searchSdate neq ''}{$searchSdate}{/if}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">วันที่สิ้นสุด</label>
                                        <input class="form-control datepicker" name="searchEdate" type="text" value="{if $searchEdate neq ''}{$searchEdate}{/if}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">คำค้น</label>
                                        <input class="form-control" name="searchKeyword" type="text" value="{if $searchKeyword neq ''}{$searchKeyword}{/if}">
                                    </div>
                                </div>
                                <div class="action">
                                    <button class="btn btn-primary" onclick="document.getElementById('myForm').submit()">
                                        <span class="feather icon-search"></span>
                                        ค้นหา
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {if $callNewsDetailData->fields.typeplan eq 2 && $callDwnData->_numOfRows > 0}
                <div class="know-plan">
                    <div class="ojb -ojbI" data-aos="fade-up">
                        <img src="{$template}/assets/img/static/ojb-know-plan1.png" alt="" class="lazy">
                    </div>
                    <div class="ojb -ojbII" data-aos="fade-up">
                        <img src="{$template}/assets/img/static/ojb-know-plan2.png" alt="" class="lazy">
                    </div>
                    <div class="container">
                        <div class="whead t-cen" data-aos="fade-down">
                            <h4 class="title">แผนการจัดการความรู้</h4>
                        </div>
                        <div class="km-plan-list">
                        <ul class="item-list">
                         {foreach $callDwnData as $keycallDwnData => $valuecallDwnData}
                        {$fileinfo = $valuecallDwnData['file']|fileinclude:'file':{$valuecallDwnData.masterkey}|get_Icon}
                        <li class="item" data-aos="fade-up">
	                    <div class="box-content">
	                        <div class="inner">
	                            <div class="ojb-box-clip"><img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy"></div>
	                            <div class="thumb">
	                                <div class="icon">
	                                    <img src="{$template}/assets/img/icon/km-doc.svg" alt="" class="lazy">
	                                    <div class="txt">{$valuecallDwnData.subjectyear}</div>
	                                </div>
	                            </div>
	                            <div class="date">{$valuecallDwnData.credate|DateThai:1:"th":"shot"}<span>|</span> ประจำปีงบประมาณ {$valuecallDwnData.subjectyear}</div>
	                            <div class="title">
	                                <div class="txt">
	                                    {$valuecallDwnData.subject}
	                                </div>
	                                <div class="desc">
	                                	หน่วยงาน : {$valuecallDwnData.agencyid|getNameinTable:$table_cmg}
	                                </div>
	                            </div>
	                            <div class="info-box">
		                            <div class="data-list">
										{if $valuecallDwnData.type == 'file'}
		                                <ul class="item-list">
		                                    <li>
		                                        <div class="icon">
		                                            <img src="{$template}/assets/img/icon/load-i1.svg" alt="" class="lazy">
		                                        </div>
		                                        <div class="txt">ประเภทไฟล์ <span>{$fileinfo.type}</span></div>
		                                    </li>
		                                    <li>
		                                        <div class="icon">
		                                            <img src="{$template}/assets/img/icon/load-i2.svg" alt="" class="lazy">
		                                        </div>
		                                        <div class="txt">ขนาดไฟล์ <span>{$valuecallDwnData.file|fileinclude:'file':{$valuecallDwnData.masterkey}|get_IconSize}</span></div>
		                                    </li>
		                                    <li>
		                                        <div class="icon">
		                                            <img src="{$template}/assets/img/icon/load-i3.svg" alt="" class="lazy">
		                                        </div>
		                                        <div class="txt">ดาวน์โหลด <span>{$valuecallDwnData.download}</span></div>
		                                    </li>
		                                </ul>
										{/if}
		                            </div>
		                            <div class="action">
										{if $valuecallDwnData.type == 'file'}
		                                <a href="{$ul}/download/{$valuecallDwnData.file|fileinclude:'file':{$valuecallDwnData.masterkey}:'download'}&n={$valuecallDwnData.filename}&t={'md_dwn'|encodeStr}" class="btn">
		                                    <div class="icon">
		                                        <img src="{$template}/assets/img/icon/kp-i1.svg" alt="" class="lazy">
		                                    </div>
		                                    ดาวน์โหลด
		                                </a>
										{else}
		                                <a href="{$valuecallDwnData.url}" class="btn" target="_blank">
		                                    <div class="icon">
		                                        <img src="{$template}/assets/img/icon/kp-i2.svg" alt="" class="lazy">
		                                    </div>
		                                    ดูออนไลน์
		                                </a>
										{/if}
		                            </div>
	                            </div>
	                        </div>
	                    </div>
	                </li>
                    {/foreach}
                        </ul>
                        </div>
                        

                        <div class="btn-box" data-aos="fade-up">
                            <a href="{$ul}/kmplan/{$callNewsDetailData->fields.idg}" class="btn btn-primary">DMSC KM Plan</a>
                        </div>
                    </div>
                </div>
            {/if}

            <div class="page-detail">
                <div class="container">
                    <div class="head-detail">
                        <div class="h-title" data-aos="fade-down">{$callNewsDetailData->fields.subject}</div>
                        <div class="row align-items-center">
                            <div class="col-md-auto col-12">
                                <div class="info" data-aos="fade-right">
                                    <div class="box-info">
                                        <div class="icon">
                                            <img src="{$template}/assets/img/icon/info-i1.svg" alt="" class="lazy">
                                        </div>
                                        <div class="txt">{$callNewsDetailData->fields.credate|DateThai:1:"th":"shot"}</div>
                                    </div>
                                    <div class="box-info">
                                        <div class="icon">
                                            <img src="{$template}/assets/img/icon/info-i2.svg" alt="" class="lazy">
                                        </div>
                                        <div class="txt">{$callNewsDetailData->fields.view}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md col-12">
                                <div class="social-list" data-aos="fade-left">
                                    <ul class="item-list">
                                        {* <li>
                                            <a href="javascript:void(0);" class="link"  onclink="copyToClipboard('#shearch-link')">
                                                <img src="{$template}/assets/img/icon/sc-i-share.svg" alt="" class="lazy">
                                            </a>
                                        </li> *}
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={$fullurl}" class="link" target="_blank">
                                                <img src="{$template}/assets/img/icon/sc-i-facebook.svg" alt="" class="lazy">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?url={$fullurl}" class="link" target="_blank">
                                                <img src="{$template}/assets/img/icon/sc-i-twitter.svg" alt="" class="lazy">
                                            </a>
                                        </li>
                                        {* <li>
                                            <a href="mailto:{$SettingMainSite.social.Email.link}" class="link" target="_blank">
                                                <img src="{$template}/assets/img/icon/sc-i-mail.svg" alt="" class="lazy">
                                            </a>
                                        </li> *}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="cover-detail">
                        <div class="ojb -ojbI" data-aos="fade-left">
                            <img src="{$template}/assets/img/static/ojb-detail1.png" alt="" class="lazy">
                        </div>
                        <div class="ojb -ojbII" data-aos="fade-up">
                            <img src="{$template}/assets/img/static/ojb-detail2.png" alt="" class="lazy">
                        </div>
                        <!-- picture cover -->
                        {if $callNewsDetailData->fields.picshow eq 2}
                        <figure class="cover" data-aos="fade-up">
                            <img src="{$callNewsDetailData->fields.pic|fileinclude:"pictures":{$callNewsDetailData->fields.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                        </figure
                        {/if}
                        <!-- picture cover -->
                    </div>
                    <article class="editor-content" data-aos="fade-up">
                        <div class="ojb -ojbI" data-aos="fade-right">
                            <img src="{$template}/assets/img/static/ojb-detail3.png" alt="" class="lazy">
                        </div>
                        <div class="ojb -ojbII" data-aos="fade-up">
                            <img src="{$template}/assets/img/static/ojb-detail4.png" alt="" class="lazy">
                        </div>
                        <!-- text editor -->
                         {strip}
                            {$callNewsDetailData->fields.htmlfilename|fileinclude:"html":$callNewsDetailData->fields.masterkey|callHtml}
                        {/strip}
                        <!-- text editor -->
                    </article>
                    {if ($callNewsDetailData->fields['url'] neq '' && $callNewsDetailData->fields['url'] neq '#') || $callNewsDetailData->fields.filevdo != ''}
                        {$explodeYoutube = explode("v=",$callNewsDetailData->fields['url'])}
                        {$urlYoutube = $explodeYoutube[1]}
                        <div class="video-box" data-aos="fade-up">
                            <div class="ojb -ojbI" data-aos="fade-left">
                                <img src="{$template}/assets/img/static/ojb-detail5.png" alt="" class="lazy">
                            </div>
                            <div class="ojb -ojbII" data-aos="fade-left">
                                <img src="{$template}/assets/img/static/ojb-detail6.png" alt="" class="lazy">
                            </div>
                            <!-- video content -->
                            {if $callNewsDetailData->fields['type'] == 'url'}
                                <div class="iframe-container">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{$urlYoutube}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            {else}
                            <div class="video-container">
                                <video width="100%" controls>
                                    <source src="{$callNewsDetailData->fields.filevdo|fileinclude:"vdo":{$callNewsDetailData->fields.masterkey}:"link"}" type="video/mp4">
                                    {* <source src="{$template}/assets/img/upload/slide-clock.ogg" type="video/ogg"> *}
                                </video>
                            </div>
                            {/if}
                            <!-- video content -->
                        </div>
                    {/if}
                    {if $Call_DataDetaiAlbum->_numOfRows gt 0}
                    <div class="gallery-box">
                        <div class="whead" data-aos="fade-down">
                            <h4 class="s-title">รูปภาพ</h4>  
                        </div>
                        <div class="gallery-slide" data-aos="fade-up">
                            {foreach $Call_DataDetaiAlbum as $keyCall_DataDetaiAlbum => $valueCall_DataDetaiAlbum}
                                <div class="item">
                                    <a href="{$valueCall_DataDetaiAlbum.filename|fileinclude:"album":{$callNewsDetailData->fields.masterkey}:"link"}{$setVersionTemp}" data-fancybox="gallery" class="link">
                                        <div class="thumb">
                                            <figure class="cover">
                                                <img src="{$valueCall_DataDetaiAlbum.filename|fileinclude:"album":{$callNewsDetailData->fields.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                                            </figure>
                                        </div>
                                    </a>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                    {/if}
                    <div class="download-box">
                        <div class="ojb -ojbI" data-aos="fade-right">
                            <img src="{$template}/assets/img/static/ojb-detail7.png" alt="" class="lazy">
                        </div>
                        {if $Call_DataDetailFile->_numOfRows gte 1}
                        <div class="whead" data-aos="fade-down">
                            <h4 class="s-title">เอกสารดาวน์โหลด</h4>
                        </div>
                        <div class="download-slide" data-aos="fade-up">
                            {foreach $Call_DataDetailFile as $keyCall_DataDetailFile => $valueCall_DataDetailFile}
                            {$fileinfo = $valueCall_DataDetailFile['filename']|fileinclude:'file':{$callNewsDetailData->fields.masterkey}|get_Icon}
                                <div class="item">
                                    <div class="box-content">
                                        <div class="inner">
                                            <div class="ojb-box-clip">
                                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                            </div>
                                            <div class="title">
                                                <div class="txt">
                                                    {$valueCall_DataDetailFile.name}
                                                </div>
                                                <div class="type">.pdf</div>
                                            </div>
                                            <div class="data-list">
                                                <ul class="item-list">
                                                    <li>
                                                        <div class="icon">
                                                            <img src="{$template}/assets/img/icon/load-i1.svg" alt="" class="lazy">
                                                        </div>
                                                        <div class="txt">ประเภทไฟล์ {$fileinfo.type}</div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <img src="{$template}/assets/img/icon/load-i2.svg" alt="" class="lazy">
                                                        </div>
                                                        <div class="txt">ขนาดไฟล์ {$valueCall_DataDetailFile['filename']|fileinclude:'file':{$callNewsDetailData->fields.masterkey}|get_IconSize}</div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <img src="{$template}/assets/img/icon/load-i3.svg" alt="" class="lazy">
                                                        </div>
                                                        <div class="txt">ดาวน์โหลด {$valueCall_DataDetailFile.download}</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="action">
                                                <a href="{$ul}/download/{$valueCall_DataDetailFile['filename']|fileinclude:'file':{$callNewsDetailData->fields.masterkey}:'download'}&n={$valueCall_DataDetailFile['name']}&t={'md_cmf'|encodeStr}" class="btn">
                                                    <div class="icon">
                                                        <img src="{$template}/assets/img/icon/load-i4.svg" alt="" class="lazy">
                                                    </div>
                                                    ดาวน์โหลด
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                        {/if}
                    </div>
                    <div class="end-box" data-aos="fade-up">
                        <a href="{$ul}/{$menuActive}/{$callNewsDetailData->fields.idg}/{$menuDetail}/{$previousid}{$search}" class="btn btn-outline-primary -left {$previouspage}">
                            <span class='feather icon-arrow-left'></span>
                            กลับ
                        </a>
                        <a href="{$ul}/{$menuActive}/{$callNewsDetailData->fields.idg}/{$menuDetail}/{$nextid}{$search}" class="btn btn-outline-primary -right {$nextpage}">
                            ถัดไป
                            <span class='feather icon-arrow-right'></span>
                        </a>
                    </div>
                </div>
            </div>
            
            {if $callNewsDetailDataFooter->_numOfRows gte 1}
                <div class="detail-other wg-book">
                    <div class="ojb -ojbI" data-aos="fade-left">
                        <img src="{$template}/assets/img/static/ojb-d-other.png" alt="" class="lazy">
                    </div>
                    <div class="container">
                        <div class="whead" data-aos="fade-down">
                            <h4 class="s-title">{$callNewsDetailData->fields.subjectg}อื่นๆ</h4>
                        </div>
                        <div class="wg-book-slide" data-aos="fade-up">
                            {foreach $callNewsDetailDataFooter as $keycallNewsDetailDataFooter => $valuecallNewsDetailDataFooter}
                                <div class="item">
                                    <a href="{$ul}/{$menuActive}/{$callNewsDetailData->fields.idg}/{$menuDetail}/{$valuecallNewsDetailDataFooter.id}" class="link wrapper">
                                        <div class="title">
                                            {$valuecallNewsDetailDataFooter.subject}
                                        </div>
                                        <div class="desc">{$valuecallNewsDetailDataFooter.credate|DateThai:1:"th":"shot"}</div>
                                        <div class="thumb thumb-act">
                                            <figure class="cover">
                                                <img src="{$valuecallNewsDetailDataFooter.pic|fileinclude:"pictures":{$valuecallNewsDetailDataFooter.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                                            </figure>
                                        </div>
                                    </a>
                                </div>
                            {/foreach}
                        </div>
                        <div class="book-base" data-aos="fade-in"></div>
                    </div>
                </div>
            {/if}
</section>