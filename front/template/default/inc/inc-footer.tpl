<footer class="site-footer">
{* {$settingpage|print_pre} *}
	<div class="sitemap">
		<div class="container">
			<a href="javascript:void(0)" class="btn-sitemap">เกี่ยวกับกรมวิทยาศาสตร์การแพทย์</a>
			<div class="row">
				<div class="col-lg-3 col-md-6 nav-sitemap">
					<div class="h-title">เกี่ยวกับ KM กรมฯ</div>
					<div class="sitemap-list">
						<ul class="item-list">
							{foreach $callAboutFooter as $keycallAboutFooter => $valuecallAboutFooter}
								<li>
									<a href="{$ul}/about/{$valuecallAboutFooter.id}" class="link">{$valuecallAboutFooter.subject}</a>
								</li>
							{/foreach}
							{* <li>
								<a href="{$ul}/#" class="link">ประวัติความเป็นมา</a>
							</li>
							<li>
								<a href="{$ul}/#" class="link">โครงสร้างห้องสมุด</a>
							</li>
							<li>
								<a href="{$ul}/#" class="link">วิสัยทัศน์ พันธกิจ</a>
							</li>
							<li>
								<a href="{$ul}/#" class="link">ภารกิจและหน้าที่รับผิดชอบ</a>
							</li>
							<li>
								<a href="{$ul}/#" class="link">รายงานประจำปี</a>
							</li> *}
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 nav-sitemap">
					<div class="h-title">การจัดการความรู้</div>
					<div class="sitemap-list">
						<ul class="item-list">
						{foreach $callNewsFooter as $keycallNewsFooter => $valuecallNewsFooter}
							<li>
								<a href="{$ul}/news/{$valuecallNewsFooter.id}" class="link">{$valuecallNewsFooter.subject}</a>
							</li>
						{/foreach}
							{* <li>
								<a href="{$ul}/#" class="link">วิสัยทัศน์ และนโยบายต่างๆ</a>
							</li>
							<li>
								<a href="{$ul}/#" class="link">การบริหารงานด้าน ICT</a>
							</li> *}
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 nav-sitemap">
					<div class="h-title">ติดต่อเรา</div>
					<div class="sitemap-list">
						<ul class="item-list">
							<li>
								<a href="{$ul}/contact" class="link">แบบฟอร์มติดต่อเรา</a>
							</li>
							<li>
								<a href="{$ul}/contact/graphic-map" class="link" target="_blank">Graphic Map</a>
							</li>
							<li>
								<a href="{$ul}/contact/google-map" class="link" target="_blank">Google Map</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="md-block">
						<div class="h-title">
							 {$settingpageHeadsy}<br/>
							{$settingpageHeaddep}
						</div>
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
							โทร : <a href="tel:029510000" class="link">{$SettingMainSite['config']['tel']}</a>
						</div>
						<div class="social-list">
							<ul class="item-list">
								
								<li>
									<a class="link" {if $SettingMainSite['social']['Facebook']['link'] != '' && $SettingMainSite['social']['Facebook']['link'] != '#'} href="{$SettingMainSite['social']['Facebook']['link']}" target="_blank" {else} href="javascript:void(0)" {/if} title="facebook">
										<img src="{$template}/assets/img/icon/sc-i-facebook.svg" alt="facebook" class="lazy">
									</a>
								</li>
								<li>
									<a class="link" {if $SettingMainSite['social']['Twitter']['link'] != '' && $SettingMainSite['social']['Twitter']['link'] != '#'} href="{$SettingMainSite['social']['Twitter']['link']}" target="_blank" {else} href="javascript:void(0)" {/if}  title="twitter">
										<img src="{$template}/assets/img/icon/sc-i-twitter.svg" alt="twitter" class="lazy">
									</a>
								</li>
								<li>
									<a class="link" {if $SettingMainSite['social']['Email']['link'] != '' && $SettingMainSite['social']['Email']['link'] != '#'} href="mailto:{$SettingMainSite['social']['Email']['link']}" target="_blank" {else} href="javascript:void(0)" {/if}  title="mail">
										<img src="{$template}/assets/img/icon/sc-i-mail.svg" alt="mail" class="lazy">
									</a>
								</li>
							</ul>
						</div>
						<div class="visits">
							{* <img src="{$template}/assets/img/static/visits.png" alt="" class="lazy"> *}
							<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
							<!-- Histats.com  START  (aync)-->
							<script>
							var _Hasync= _Hasync|| [];
							_Hasync.push(['Histats.start', '1,4569536,4,1032,150,25,00011111']);
							_Hasync.push(['Histats.fasi', '1']);
							_Hasync.push(['Histats.track_hits', '']);
							(function() {
							var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
							hs.src = ('//s10.histats.com/js15_as.js');
							(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
							})();</script>
							<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4569536&101" alt="web hit counter" style="border:0px; "></a></noscript>
							<!-- Histats.com  END  -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="txt">
				Copyright © 2021 Department of Medical Sciences, Ministry of Public Health. All rights reserved.
			</div>
		</div>
	</div>
	
</footer>