        <section class="site-container">
            <div class="active-nav" data-id="{$callNewsDetail->fields['id']}"></div>
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-about.jpg)">
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">เกี่ยวกับหน่วยงาน</h1>
                            <p class="desc">{$settingpage.subjecten}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-block">
                <div class="container">
                    <ol class="breadcrumb" data-aos="fade-up">
                        <li><a class="link" href="{$ul}/home"><span class="fa fa-home"></span> หน้าแรก</a></li>
                        <li class="active">{$callNewsDetail->fields['subject']}</li>
                    </ol>
                </div>
            </div>

            <div class="about-menu">
                <div class="container"  data-aos="fade-up">
                    <a href="javascript:void(0)" class="btn-about">เกี่ยวกับหน่วยงาน</a>
                    <div class="about-menu-slide">
                        {foreach $callNewsDetailMenu as $keycallNewsDetailMenu => $valuecallNewsDetailMenu}
                        <div class="item nav-item{$valuecallNewsDetailMenu.id}">
                            <a href="about/{$valuecallNewsDetailMenu.id}" class="link">
                                <div class="txt">{$valuecallNewsDetailMenu.subject}</div>
                            </a>
                        </div>
                        {/foreach}
                        {* <div class="item nav-itemII">
                            <a href="about/" class="link">
                                <div class="txt">โครงสร้างห้องสมุด</div>
                            </a>
                        </div>
                        <div class="item nav-itemIII">
                            <a href="about/" class="link">
                                <div class="txt">วิสัยทัศน์ พันธกิจ</div>
                            </a>
                        </div>
                        <div class="item nav-itemIV">
                            <a href="about/" class="link">
                                <div class="txt">ภารกิจและหน้าที่รับผิดชอบ</div>
                            </a>
                        </div>
                    </div> *}
                </div>
            </div>

            <div class="page-detail -page-about">
                <div class="container">
                    <div class="head-detail">
                        <div class="row align-items-center">
                            <div class="col-md col-12">
                                <div class="h-title" data-aos="fade-right">{$callNewsDetail->fields['subject']}</div>
                            </div>
                            <div class="col-md-auto col-12">
                                <div class="info" data-aos="fade-left">
                                    <div class="box-info">
                                        <div class="icon">
                                            <img src="{$template}/assets/img/icon/info-i1.svg" alt="" class="lazy">
                                        </div>
                                        <div class="txt">{$callNewsDetail->fields['credate']|DateThai:1:"th":"shot"}</div>
                                    </div>
                                    <div class="box-info">
                                        <div class="icon">
                                            <img src="{$template}/assets/img/icon/info-i2.svg" alt="" class="lazy">
                                        </div>
                                        <div class="txt">{$callNewsDetail->fields['view']}</div>
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
                        <div class="box-cover" data-aos="fade-up">
                            <div class="txt">
                                {$callNewsDetail->fields['subject']}
                                <small>{$callNewsDetail->fields['title']}</small>
                            </div>
                            <figure class="cover">
                                <img src="{$callNewsDetail->fields.pic|fileinclude:"pictures":{$callNewsDetail->fields.masterkey}:"link"}{$setVersionTemp}" alt="" class="lazy">
                            </figure>
                        </div>
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
                            {$callNewsDetail->fields.htmlfilename|fileinclude:"html":$callNewsDetail->fields.masterkey|callHtml}
                        {/strip}
                        <!-- text editor -->
                    </article>
                    <div class="video-box" data-aos="fade-up" style="display:none">>
                        <div class="ojb -ojbI" data-aos="fade-left">
                            <img src="{$template}/assets/img/static/ojb-detail5.png" alt="" class="lazy">
                        </div>
                        <div class="ojb -ojbII" data-aos="fade-left">
                            <img src="{$template}/assets/img/static/ojb-detail6.png" alt="" class="lazy">
                        </div>
                        <!-- video content -->
                        <div class="iframe-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/5ovIo8fX_vs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <!-- <div class="video-container">
                            <video width="100%" controls>
                                <source src="{$template}/assets/img/upload/slide-clock.mp4" type="video/mp4">
                                <source src="{$template}/assets/img/upload/slide-clock.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div> -->
                        <!-- video content -->
                    </div>
                    <div class="gallery-box" style="display:none">>
                        <div class="whead" data-aos="fade-down">
                            <h4 class="s-title">รูปภาพ</h4>
                        </div>
                        <div class="gallery-slide" data-aos="fade-up">
                            <div class="item">
                                <a href="assets/img/upload/service-detail.jpg" data-fancybox="gallery" class="link">
                                    <div class="thumb">
                                        <figure class="cover">
                                            <img src="{$template}/assets/img/upload/service-detail.jpg" alt="" class="lazy">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="assets/img/upload/service-detail.jpg" data-fancybox="gallery" class="link">
                                    <div class="thumb">
                                        <figure class="cover">
                                            <img src="{$template}/assets/img/upload/service-detail.jpg" alt="" class="lazy">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="assets/img/upload/service-detail.jpg" data-fancybox="gallery" class="link">
                                    <div class="thumb">
                                        <figure class="cover">
                                            <img src="{$template}/assets/img/upload/service-detail.jpg" alt="" class="lazy">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="assets/img/upload/service-detail.jpg" data-fancybox="gallery" class="link">
                                    <div class="thumb">
                                        <figure class="cover">
                                            <img src="{$template}/assets/img/upload/service-detail.jpg" alt="" class="lazy">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="assets/img/upload/service-detail.jpg" data-fancybox="gallery" class="link">
                                    <div class="thumb">
                                        <figure class="cover">
                                            <img src="{$template}/assets/img/upload/service-detail.jpg" alt="" class="lazy">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="assets/img/upload/service-detail.jpg" data-fancybox="gallery" class="link">
                                    <div class="thumb">
                                        <figure class="cover">
                                            <img src="{$template}/assets/img/upload/service-detail.jpg" alt="" class="lazy">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {if $DataFile->_numOfRows gte 1}
                    <div class="download-box" >
                        <div class="ojb -ojbI" data-aos="fade-right">
                            <img src="{$template}/assets/img/static/ojb-detail7.png" alt="" class="lazy">
                        </div>
                        <div class="whead" data-aos="fade-down">
                            <h4 class="s-title">เอกสารดาวน์โหลด</h4>
                        </div>
                        <div class="download-slide" data-aos="fade-up">
                        {foreach $DataFile as $keyDataFile => $valueDataFile}
                        {$fileinfo = $valueDataFile['filename']|fileinclude:'file':{$callNewsDetail->fields['masterkey']}|get_Icon}
                        {* {$fileinfo|print_pre} *}
                                <div class="item">
                                    <div class="box-content">
                                        <div class="inner">
                                            <div class="ojb-box-clip">
                                                <img src="{$template}/assets/img/static/ojb-box-clip.png" alt="" class="lazy">
                                            </div>
                                            <div class="title">
                                                <div class="txt">
                                                    {$valueDataFile.name}
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
                                                        <div class="txt">ขนาดไฟล์ {$valueDataFile['filename']|fileinclude:'file':{$callNewsDetail->fields['masterkey']}|get_IconSize}</div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <img src="{$template}/assets/img/icon/load-i3.svg" alt="" class="lazy">
                                                        </div>
                                                        <div class="txt">ดาวน์โหลด {$valueDataFile.download}</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="action">
                                                <a href="{$ul}/download/{$valueDataFile['filename']|fileinclude:'file':{$callNewsDetail->fields['masterkey']}:'download'}&n={$valueDataFile['name']}&t={'md_alf'|encodeStr}" class="btn">
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
                    </div>
                    {/if}
                </div>
            </div>

        </section>