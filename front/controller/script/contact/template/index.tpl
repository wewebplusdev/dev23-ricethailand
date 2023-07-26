<section class="site-container">
<div class="action" data-id="{$action}"></div>
            <div class="default-header" style="background-image:url({$template}/assets/img/background/bg-h-contact.jpg)">
                <div class="container">
                    <div class="row align-items-center height" data-aos="fade-down">
                        <div class="col">
                            <h1 class="title">ติดต่อเรา</h1>
                            <p class="desc">{$settingpage.subjecten}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-block">
                <div class="container">
                    <ol class="breadcrumb" data-aos="fade-up">
                        <li><a class="link" href="{$ul}/home"><span class="fa fa-home"></span> หน้าแรก</a></li>
                        <li class="active">ติดต่อเรา</li>
                    </ol>
                </div>
            </div>

            <div class="page-contact">
                <div class="ojb -ojbI" data-aos="fade-down">
                    <img src="{$template}/assets/img/static/ojb-Pcontact1.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbII" data-aos="fade-right">
                    <img src="{$template}/assets/img/static/ojb-Pcontact2.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbIII" data-aos="fade-left">
                    <img src="{$template}/assets/img/static/ojb-Pcontact3.png" alt="" class="lazy">
                </div>
                <div class="ojb -ojbIV" data-aos="fade-up">
                    <img src="{$template}/assets/img/static/ojb-Pcontact4.png" alt="" class="lazy">
                </div>
                <div class="container">
                    <div class="whead t-cen" data-aos="fade-down">
                        <h4 class="title">ติดต่อเรา</h4>
                    </div>
                    <div class="contact-box">
                        <div class="inner">
                            <div class="row row-0">
                                <div class="col">
                                    <div class="whead" data-aos="fade-down">
                                        <h4 class="s-title">
                                        {$settingpageHeadsy}
                                            <p class="desc">{$settingpageHeaddep}</p>
                                        </h4>
                                    </div>
                                    <div class="contact-info" data-aos="fade-right">
                                        <div class="address">
                                            <div class="icon">
                                                <img src="{$template}/assets/img/icon/i-pin.svg" alt="" class="lazy">
                                            </div>
                                            {$SettingMainSite['config']['address']}
                                        </div>
                                        <div class="fax">
                                            <div class="icon">
                                                <img src="{$template}/assets/img/icon/i-fax.svg" alt="" class="lazy">
                                            </div>
                                            Fax : {$SettingMainSite['config']['fax']}
                                        </div>
                                        <div class="tel">
                                            <div class="icon">
                                                <img src="{$template}/assets/img/icon/i-phone.svg" alt="" class="lazy">
                                            </div>
                                            {* โทร : <a href="tel:029510000" class="link">029510000</a> ต่อ 99339 *}
                                            โทร : <a href="tel:{$SettingMainSite['config']['tel']}" class="link">{$SettingMainSite['config']['tel']}</a>

                                        </div>
                                        <div class="social-list">
                                            <ul class="item-list">
                                               
                                                <li>
                                                    {* <a href="{$SettingMainSite['social']['Facebook']['link']}" class="link" target="_blank"> *}
									                <a class="link" {if $settingmainsite['social']['facebook']['link'] != '' && $SettingMainSite['social']['Facebook']['link'] != '#'} href="{$SettingMainSite['social']['Facebook']['link']}" target="_blank" {else} href="javascript:void(0)" {/if}>
                                                        <img src="{$template}/assets/img/icon/sc-i-facebook.svg" alt="" class="lazy">
                                                    </a>
                                                </li>
                                                <li>
                                                    {* <a href="{$SettingMainSite['social']['Twitter']['link']}" class="link" target="_blank"> *}
									                <a class="link" {if $settingmainsite['social']['twitter']['link'] != '' && $SettingMainSite['social']['Twitter']['link'] != '#'} href="{$SettingMainSite['social']['Twitter']['link']}" target="_blank" {else} href="javascript:void(0)" {/if}>
                                                        <img src="{$template}/assets/img/icon/sc-i-twitter.svg" alt="" class="lazy">
                                                    </a>
                                                </li>
                                                <li>
                                                    {* <a href="mailto:{$SettingMainSite['social']['Email']['link']}" class="link" target="_blank"> *}
									                <a class="link" {if $settingmainsite['social']['email']['link'] != '' && $SettingMainSite['social']['Email']['link'] != '#'} href="mailto:{$SettingMainSite['social']['Email']['link']}" target="_blank" {else} href="javascript:void(0)" {/if}>
                                                        <img src="{$template}/assets/img/icon/sc-i-mail.svg" alt="" class="lazy">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="action">
                                            <a href="{$ul}/{$menuActive}/graphic-map" class="btn btn-primary" target="_blank">
                                                <img src="{$template}/assets/img/icon/map-gp.svg" alt="" class="lazy">
                                                Graphic Map
                                            </a>
                                            <a href="{$ul}/{$menuActive}/google-map" class="btn btn-primary" target="_blank">
                                                <img src="{$template}/assets/img/icon/map-gg.svg" alt="" class="lazy">
                                                Google Map
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="contact-form" data-aos="fade-left">
                                        <div class="whead">
                                            <h4 class="desc-title">แบบฟอร์มติดต่อเรา</h4>
                                        </div>
                                        <form data-toggle="validator" role="form" class="form-default active" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">เรื่อง</label>
                                                        <div class="block-control">
                                                            <input class="form-control" 
                                                                type="text"
                                                                id="inputSubject"
                                                                name="inputSubject" 
                                                                value=""
                                                                placeholder=""
                                                                data-error="กรุณากรอกชื่อเรื่อง" 
                                                                required>
                                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">ชื่อ - นามสกุล</label>
                                                        <div class="block-control">
                                                            <input class="form-control" 
                                                                type="text"
                                                                id="inputFullname"
                                                                name="inputFullname" 
                                                                value=""
                                                                placeholder=""
                                                                data-error="กรุณากรอกชื่อ-นามสกุล" 
                                                                required>
                                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">อีเมล์</label>
                                                        <div class="block-control">
                                                            <input class="form-control" 
                                                                type="email"
                                                                id="inputEmail"
                                                                name="inputEmail" 
                                                                value=""
                                                                placeholder=""
                                                                data-error="กรุณากรอกอีเมล์" 
                                                                required>
                                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">เบอร์มือถือ</label>
                                                        <div class="block-control">
                                                            <input class="form-control" 
                                                                type="number"
                                                                id="inputTel"
                                                                name="inputTel" 
                                                                value=""
                                                                placeholder=""
                                                                data-error="กรุณากรอกเบอร์มือถือ" 
                                                                required>
                                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">รายละเอียด</label>
                                                        <div class="block-control">
                                                            <textarea class="form-control"
                                                                rows="2" 
                                                                id="inputDetail"
                                                                name="inputDetail" 
                                                                value=""
                                                                placeholder=""
                                                                data-error="กรุณากรอกรายละเอียด" 
                                                                required></textarea>
                                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="captcha">
                                                        <div class="form-group captcha" style="margin:0;">
                                                            <div class="block-control" style="display: flex;justify-content: center;">
                                                                <script src="https://www.google.com/recaptcha/api.js?render={$recaptcha_sitekey}"></script>
                                                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" data-secret="{$recaptcha_sitekey}">
                                                                <input type="hidden" id="action" name="action" value="submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-button">
                                                        <button class="btn btn-primary d-none" id="btn-submit" type="button">ส่ง</button>
                                                        <input value="ส่ง" type="submit" id="btn-submit" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="submit">
                                            <div class="height">
                                                <div class="txt-content">
                                                    <img class="lazy" src="{$template}/assets/img/icon/correct.svg" alt="correct">
                                                    <div class="title">บันทึกข้อมูลเรียบร้อยแล้ว</div>
                                                    <div class="desc">
                                                        ทางเราได้รับข้อมูลของท่านเรียบร้อยแล้ว ขอขอบพระคุณที่ใช้บริการ
                                                    </div>
                                                    <div class="action">
                                                        <button class="btn btn-primary" id="btn-back" type="button">หน้าหลัก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>