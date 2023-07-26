        <section class="site-container">
        {* {$callSettingMap|print_pre} *}
            <div class="map-page">
                <nav class="nav-map">
                    <div class="container">
                        <ul class="nav-list">
                            <li>
                                {assign var="path" value="front/template/default/assets/img/upload/map.jpg"}
                                {* <a href="{$ul}/download/?file={$path|encodeStr}&n=map&t={'md_cmf'|encodeStr}" class="link btn btn-primary"> *}
                                <a href="{$ul}/download/{$callSettingMap.datail|fileinclude:'pictures':{$callSettingMap.masterkey}:'download'}&n={$filename}&t={'md_site'|encodeStr}" class="link btn btn-primary">
                                    Download
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
                <div class="map-graphic">
                    <a class="link" href="{$template}/assets/img/upload/map.jpg" data-fancybox="image" data-type="image">
                        <figure class="cover">
                            <img src="{$template}/assets/img/upload/map.jpg" alt="">
                        </figure>
                    </a>
                </div>
            </div>

        </section>