<header class="site-header">
{* {$callNewsNav|print_pre} *}
	<div class=""container-fluid vh-100">
		<div class="row row-0 align-items-center height">
			<div class="col-auto">
				<a class="logo link" href="{$ul}/home">
					<div class="row row-0 align-items-center">
						<div class="col-auto">
							<img src="{$template}/assets/img/static/brand.png" alt="" class="lazy">
						</div>
						<div class="col">
							{* <h3 class="h-title">ระบบจัดการองค์ความรู้ กรมวิทยาศาสตร์การแพทย์</h3> *}
							<h3 class="h-title">{$settingpage[2]}</h3>
							<h4 class="s-title">{$settingpage.subjecten}</h4>
						</div>
					</div>
				</a>
			</div>
			<div class="col">
				<div class="menu-mobile-btn">
					<a href="javascript:void(0);" class="btn-mobile" data-toggle="menu-mobile"  title="menu mobile">
						<span class="bar active"></span>
						<span class="bar active"></span>
						<span class="bar active"></span>
						<span class="bar active"></span>
					</a>
				</div>
				<nav class="menu">
					<ul class="nav-list">
						<li class="nav-home">
							<a href="{$ul}/home" class="link" title="หน้าแรก">หน้าแรก</a>
						</li>
						<li class="nav-about dropdown">
							<a href="javascript:void(0)" class="link dropdown-toggle" data-toggle="dropdown" title="เกี่ยวกับหน่วยงาน">เกี่ยวกับ KM กรมฯ</a>
							<ul class="nav-list dropdown-menu">
								{foreach $callAboutFooter as $keycallAboutFooter => $valuecallAboutFooter}
									<li class="nav-about{$valuecallAboutFooter.id}">
										<a href="{$ul}/about/{$valuecallAboutFooter.id}" class="link" title="{$valuecallAboutFooter.subject}">{$valuecallAboutFooter.subject}</a>
										<a href="{$ul}/rss/{$valuecallAboutFooter.1}Thai{$valuecallAboutFooter.id}.xml" title="RSS" class="rss" target="_blank">
											<div class="fa fa-rss"></div>
										</a>
									</li>
								{/foreach}
							</ul>
						</li>
                       <li class="nav-service dropdown">
							<a href="{$ul}/activity" class="link dropdown-toggle" data-toggle="dropdown"  title="ข่าวประชาสัมพันธ์">ข่าวประชาสัมพันธ์</a>
                            <ul class="nav-list dropdown-menu">
								{foreach $callActNav as $keycallNewsNav => $valuecallNewsNav}
									<li class="nav-service{$valuecallNewsNav.id}">
										<a href="{$ul}/activity/{$valuecallNewsNav.id}" class="link" title="{$valuecallNewsNav.subject}">{$valuecallNewsNav.subject}</a>
										<a href="{$ul}/rss/{$valuecallNewsNav.1}Thai{$valuecallNewsNav.id}.xml" title="RSS" class="rss" target="_blank">
											<div class="fa fa-rss"></div>
										</a>
									</li>
								{/foreach}
							</ul>
						</li> 
						<li class="nav-news dropdown">
							<a href="javascript:void(0)" class="link dropdown-toggle" data-toggle="dropdown" title="การจัดการความรู้">
								การจัดการความรู้
								<!-- <span class="icon"></span> -->
							</a>
							<ul class="nav-list dropdown-menu">
								{foreach $callNewsNav as $keycallNewsNav => $valuecallNewsNav}
									<li class="nav-news{$valuecallNewsNav.id}">
										<a href="{$ul}/news/{$valuecallNewsNav.id}" class="link" title="{$valuecallNewsNav.subject}">{$valuecallNewsNav.subject}</a>
										<a href="{$ul}/rss/{$valuecallNewsNav.1}Thai{$valuecallNewsNav.id}.xml" title="RSS" class="rss" target="_blank">
											<div class="fa fa-rss"></div>
										</a>
									</li>
								{/foreach}
									{* <li class="nav-newsI"><a href="{$ul}/news/1" class="link">บันทึกความดีบัญชีความสุข</a></li> *}
									{* <li class="nav-newsII"><a href="{$ul}/news/2" class="link">องค์ความรู้ที่ได้จากการจัดความรู้ประจำปี</a></li> *}
									{* <li class="nav-statistics"><a href="{$ul}/statistics" class="link">สถิตินวัตกรรมระดับกรม</a></li> *}
							</ul>
						</li>
						
						<li class="nav-contact">
							<a href="{$ul}/contact" class="link" title="ติดต่อเรา">ติดต่อเรา</a>
						</li>
						<li class="nav-admin">
							<a href="{$ul}/weadmin" class="link" title="เข้าสู่ระบบ">เข้าสู่ระบบ</a>
						</li>
						<li class="nav-search-xs">
							<div class="nav-search">
								<div class="search-form">
									<a href="javascript:void(0);" class="link -search" title="ค้นหา">
										<span class="feather icon-search"></span>
									</a>
									<form action="{$ul}/search">
										<div class="row row-0 align-items-center height">
											<div class="col">
                                            <label for="searchKeyword" style="display:none;">ค้นหา: </label>
												<input name="searchKeyword" id="searchKeyword" class="form-control" type="search" placeholder="ค้นหา"/>
											</div>
											<div class="col-auto">
												<button class="btn btn-primary">ค้นหา</button>
											</div>
										</div>
									</form>
									<a href="javascript:void(0)" class="icon-close close" title="ค้นหา"></a>
								</div>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="overlay" data-toggle="menu-overlay"></div>

</header>