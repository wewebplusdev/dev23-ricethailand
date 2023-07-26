 <section class="site-container">
{* {$callSettingMap.config|print_pre} *}
            <div class="map-page">
                <nav class="nav-map">
                    <div class="container">
                        <ul class="nav-list">
                            <li>
                                {* <a href="https://goo.gl/maps/2DLJg4uEn4irKPY5A" target="_blank" class="link btn btn-primary"> *}
                                <a href="https://www.google.com/maps/dir//{$callSettingMap.config.glati},{$callSettingMap.config.glongti}" target="_blank" class="link btn btn-primary">
                                    Get Direction
                                </a>
                            </li>
                            <li>
                                <a href="javascript:window.print();" class="link btn btn-primary">
                                    Print
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="iframe-container">
                    {* <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3873.7708162916147!2d100.52898671527454!3d13.852791098676349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf0a4f12c6a970e45!2z4LiB4Lij4Lih4Lin4Li04LiX4Lii4Liy4Lio4Liy4Liq4LiV4Lij4LmM4LiB4Liy4Lij4LmB4Lie4LiX4Lii4LmM!5e0!3m2!1sth!2sth!4v1625564403482!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> *}
                    <iframe src="https://maps.google.com/maps?q={$callSettingMap.config.glati},{$callSettingMap.config.glongti}&hl=es;z=20&amp;output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </section>