
	<section class="site-container">

	    <div class="default-page">
	    	<div class="default-header" style="background-image: url('{$template}/public/image/background/header-download.jpg');"></div>
	    	<div class="default-breadcrumb">
	    		{include file="breadcrumb.tpl" title=breadcrumb}
	    	</div>

	    	<div class="default-block">
	    		<div class="container">
	    			<div class="whead">
	    				<div class="row">
	    					<div class="col-sm-8">
		    					<h1 class="row-one">
				    				<span class="text-primary display-block">Download</span>
				    			</h1>
			    			</div>
			    			<div class="col-sm-4">
			    				<form id="sortform" method="get">
									<div class="input-group">
											<input value="{$newssearch|default:null}" class="form-control" name="searchFile" id="" type="text" placeholder="Search" required>
											<div class="input-group-addon">
													<button type="submit" class="submit">
															<i class="fa fa-search" aria-hidden="true"></i>
													</button>
											</div>
									</div>
								</form>
			    			</div>
		    			</div>
    				</div>

    				<div class="download-page">
    					<div class="detail-doc">
							<ul>
							<!--
								{foreach $downloadSelect as $listDownload}
								<li>
					    			<div class="list-wrapper">
					    				<div class="list-thumb">
					    					<i class="icon icon-download"></i>
					    				</div>
					    				<div class="list-inner">
					    					<div class="list-title">{$listDownload.2}</div>
					    					<div class="list-desc">{$listDownload.3}</div>
					    					<div class="list-info">
					    						<span>FILE : <font class="text-primary">PDF</font></span>
					    						<span>SIZE : <font class="text-primary">25 MB</font></span>
					    						<span>DOWNLOAD : <font class="text-primary">{$listDownload.6} </font></span>
					    					</div>
					    				</div>
					    				<div class="list-btn">
					    					<a href="#" class="btn btn-secondary">DOWNLOAD</a>
					    				</div>
					    			</div>
				    			</li>
				    			{/foreach} -->

									{foreach $downloadSelect as $listfileattach}

											{$fileinfo = $listfileattach.4|fileinclude:"file":$listfileattach.2|get_Icon}

											<li>
													<div class="list-wrapper">
															<div class="list-thumb">
																	<i class="icon icon-download"></i>
															</div>
															<div class="list-inner">
																	<div class="list-title">{$listfileattach.5}</div>
																 <div class="list-desc">{$listfileattach.2}</div>
																	<div class="list-info">
																			<span>FILE : <font class="text-primary">{$fileinfo.type}</font></span>
																			<span>SIZE : <font class="text-primary">{$listfileattach.4|fileinclude:"file":$listfileattach.1|get_IconSize}</font></span>
																			<!--<span>DOWNLOAD : <font class="text-primary">{$listfileattach.6|default:0} </font></span>-->
																	</div>
															</div>
															<div class="list-btn">
																	<a href="{$ul}/download/{$listfileattach.4|fileinclude:"file":$listfileattach.1:"download"}&n={$listfileattach.5}&t={$listfileattach.7|encodeStr}" class="btn btn-secondary">DOWNLOAD</a>
															</div>
													</div>
											</li>


									{/foreach}


				    		</ul>
						</div>

						<div class="clearfix"></div>
                        
    				</div>
	    		</div>
	    	</div>
	    </div>

    </section>
