<section class="site-container">
    <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-service.jpg)">
        <div class="container">
            <div class="row align-items-center height" data-aos="fade-down">
                <div class="col">
                    <h1 class="title">การบริการ</h1>
                    <p class="desc">Knowledge and Information Systems</p>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumb-block">
        <div class="container">
            <ol class="breadcrumb" data-aos="fade-up">
                <li><a class="link" href="{$ul}"><span class="fa fa-home"></span> หน้าแรก</a></li>
                <li><a class="link" href="{$ul}/{$menuActive}">การบริการ</a></li>
                <li class="active">{$callNewsDetailMenu->fields['subject']}</li>
            </ol>
        </div>
    </div>

    <div class="page-detail">
        <div class="container">
            <div class="head-detail">
                <div class="row align-items-center">
                    <div class="col-md col-12">
                        <div class="h-title" data-aos="fade-right">{$callNewsDetailMenu->fields['subject']}</div>
                    </div>
                    <div class="col-md-auto col-12">
                        <div class="info" data-aos="fade-left">
                            <div class="box-info">
                                <div class="icon">
                                    <img src="{$template}/assets/img/icon/info-i1.svg" alt="" class="lazy">
                                </div>
                                <div class="txt">{$callNewsDetailMenu->fields['credate']|DateThai:1:"th":"shot"}</div>
                            </div>
                            <div class="box-info">
                                <div class="icon">
                                    <img src="{$template}/assets/img/icon/info-i2.svg" alt="" class="lazy">
                                </div>
                                <div class="txt">{$callNewsDetailMenu->fields['view']}</div>
                            </div>
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
                {if $callNewsDetailMenu->fields.picshow eq 2}
                    <figure class="cover" data-aos="fade-up">
                        <img src="{$callNewsDetailMenu->fields.pic|fileinclude:"pictures":{$callNewsDetailMenu->fields.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                    </figure>
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
                    {$callNewsDetailMenu->fields.htmlfilename|fileinclude:"html":$callNewsDetailMenu->fields.masterkey|callHtml}
                {/strip}
                <!-- text editor -->
            </article>
            {if ($callNewsDetailMenu->fields['url'] neq '' && $callNewsDetailMenu->fields['url'] neq '#') || $callNewsDetailMenu->fields.filevdo != ''}
                {$explodeYoutube = explode("v=",$callNewsDetailMenu->fields['url'])}
                {$urlYoutube = $explodeYoutube[1]}
                <div class="video-box" data-aos="fade-up">
                    <div class="ojb -ojbI" data-aos="fade-left">
                        <img src="{$template}/assets/img/static/ojb-detail5.png" alt="" class="lazy">
                    </div>
                    <div class="ojb -ojbII" data-aos="fade-left">
                        <img src="{$template}/assets/img/static/ojb-detail6.png" alt="" class="lazy">
                    </div>
                    <!-- video content -->
                    {if $callNewsDetailMenu->fields['type'] == 'url'}
                        <div class="iframe-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{$urlYoutube}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    {else}
                        <div class="video-container">
                            <video width="100%" controls>
                                <source src="{$callNewsDetailMenu->fields.filevdo|fileinclude:"vdo":{$callNewsDetailMenu->fields.masterkey}:"link"}" type="video/mp4">
                            </video>
                        </div> 
                    {/if}
                    <!-- video content -->
                </div>
            {/if}
            {if $DataFile->_numOfRows gt 0}
            <div class="gallery-box">
                <div class="whead" data-aos="fade-down">
                    <h4 class="s-title">รูปภาพ</h4>
                </div>
                <div class="gallery-slide" data-aos="fade-up">
                {foreach $DataFile as $keyDataFile => $valueDataFile}
                        <div class="item">
                            <a href="{$valueDataFile.filename|fileinclude:'album':{$callNewsDetailMenu->fields.masterkey}:'link'}" data-fancybox="gallery" class="link">
                                <div class="thumb">
                                    <figure class="cover">
                                        <img src="{$valueDataFile.filename|fileinclude:'album':{$callNewsDetailMenu->fields.masterkey}:'link'}" alt="" class="lazy">
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
                {* {$Call_DataDetailFile|print_pre} *}
                {if $Call_DataDetailFile->_numOfRows gte 1}
                {$fileinfo = $Call_DataDetailFile->fields['filename']|fileinclude:'file':{$callNewsDetailMenu->fields.masterkey}|get_Icon}
                    <div class="whead" data-aos="fade-down">
                        <h4 class="s-title">เอกสารดาวน์โหลด</h4>
                    </div>
                    <div class="download-slide" data-aos="fade-up">
                    {foreach $Call_DataDetailFile as $keyCall_DataDetailFile => $valueCall_DataDetailFile}
                            <div class="item">
                                <div class="box-content">
                                    <div class="inner">
                                        <div class="ojb-box-clip">
                                            <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                        </div>
                                        <div class="title">
                                            <div class="txt">
                                                {$valueCall_DataDetailFile['name']}
                                            </div>
                                            <div class="type">{$fileinfo.type}</div>
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
                                                    <div class="txt">ขนาดไฟล์ {$valueCall_DataDetailFile['filename']|fileinclude:'file':{$callNewsDetailMenu->fields.masterkey}|get_IconSize}</div>
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
                                            <a href="{$ul}/download/{$valueCall_DataDetailFile['filename']|fileinclude:'file':{$callNewsDetailMenu->fields.masterkey}:'download'}&n={$valueCall_DataDetailFile['name']}&t={'md_cmf'|encodeStr}" class="btn">
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
        </div>
    </div>

</section>