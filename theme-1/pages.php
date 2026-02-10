<?php
	if(isset($_GET["cm"])) include("authenticatorx.php");

    if(isset($_GET["pageid"])){
		$catname="";
		$c1 = "select * from sms_link where id='".$_GET["pageid"]."' order by id desc limit 1";
		$c11 = $conn->query($c1);
		if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $catname=$c111["pam"]; } }
		
		
	    echo"<div class='page-header breadcrumb-wrap'>
            <div class='container'>
                <div class='breadcrumb'>
                    <a href='index.php' rel='nofollow'>Home</a>
                    <span></span> Pages
                    <span></span> $catname
                </div>
            </div>
        </div>
        <section class='mt-50 mb-50'>
            <div class='container'>
                <div class='row'>
                    
				<div class='col-lg-9'>
                        <div class='single-page pr-30'>
                            <div class='single-header style-2'>
								<h2>$catname</h2>
								<div class='entry-meta meta-1 font-xs mt-15 mb-15'><hr></div>
							</div>	
                        </div>
                        <div class='single-content' style='color:$bodytc'>";
							$cx1 = "select * from sms_webhost where identity='".$_GET["pageid"]."' order by id desc limit 1";
							$cx11 = $conn->query($cx1);
							if ($cx11->num_rows > 0) { while($cx111 = $cx11->fetch_assoc()) {
								echo"<h4 style='color:$bodytc'>".$cx111["title"]."</h4>								
								<p style='color:$bodytc'>".$cx111["des1"]."</p>
								<p style='color:$bodytc'>".$cx111["des2"]."</p>
								<p style='color:$bodytc'>".$cx111["description"]."</p>";
							} }
						echo"</div>
                	</div>

            		<div class='col-lg-3 '>
                        <div class='widget-area'>
                            <div class='sidebar-widget widget_categories mb-40'>
                                <div class='widget-header position-relative mb-20 pb-10'>
                                    <h5 class='widget-title'>Information Desk</h5>
                                </div>
                                <div class='post-block-list post-module-1 post-module-5'>
                                    <ul>";
										$x=0;
										$y=0;
										$pages11 = "select * from sms_link where des1='TOP MENU' and placement='TOP' and status='ON' order by sorder asc";
										$pages22 = $conn->query($pages11);
										if ($pages22->num_rows > 0) { while($pages33 = $pages22->fetch_assoc()) {
											$x=($x+1);
											echo"<li class='cat-item cat-item-$x'>
												<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages33["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages33["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages33["pam"]."'>
													<span style='color:$bodytc'><i class='fa fa-files-o' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;".$pages33["pam"]."</span>
												</a>
											</li>";
											$tomtom=0;
											$pages44 = "select * from sms_link where des1='".$pages33["id"]."' and status='ON' order by sorder asc limit 1";
											$pages55 = $conn->query($pages44);
											if ($pages55->num_rows > 0) { while($pages66 = $pages55->fetch_assoc()) { $tomtom=1; } }											
											if($tomtom=="1"){
												$y=$x;
												$pages44 = "select * from sms_link where des1='".$pages33["id"]."' and status='ON' order by sorder asc";
												$pages55 = $conn->query($pages44);
												if ($pages55->num_rows > 0) { while($pages66 = $pages55->fetch_assoc()) {
													$y=($y+1);
													echo"<li class='cat-item cat-item-$y'>
														<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages66["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages66["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages66["pam"]."'>
															<span style='text-align:left;color:black;font-size:8pt;padding-left:30px'>".$pages66["pam"]."</span>
														</a>
													</li>";
												} }
												$x=$y;
											}
										} }

										$x=0;
										$y=0;
										$pages11 = "select * from sms_link where des1='TOP MENU' and placement='BOTTOM' and status='ON' order by sorder asc";
										$pages22 = $conn->query($pages11);
										if ($pages22->num_rows > 0) { while($pages33 = $pages22->fetch_assoc()) {
											$x=($x+1);
											echo"<li class='cat-item cat-item-$x'>
												<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages33["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages33["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages33["pam"]."'>
													<span style='color:$bodytc'><i class='fa fa-files-o' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;".$pages33["pam"]."</span>
												</a>
											</li>";
											$tomtom=0;
											$pages44 = "select * from sms_link where des1='".$pages33["id"]."' and status='ON' order by sorder asc limit 1";
											$pages55 = $conn->query($pages44);
											if ($pages55->num_rows > 0) { while($pages66 = $pages55->fetch_assoc()) { $tomtom=1; } }											
											if($tomtom=="1"){
												$y=$x;
												$pages44 = "select * from sms_link where des1='".$pages3["id"]."' and status='ON' order by sorder asc";
												$pages55 = $conn->query($pages44);
												if ($pages55->num_rows > 0) { while($pages66 = $pages55->fetch_assoc()) {
													$y=($y+1);
													echo"<li class='cat-item cat-item-$y'>
														<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=".$pages66["id"]."'); shiftdatax('pages.php?cPath=80010&pageid=".$pages66["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$pages66["pam"]."'>
															<span style='text-align:left;color:black;font-size:8pt;padding-left:30px'>".$pages66["pam"]."</span>
														</a>
													</li>";
												} }
												$x=$y;
											}
										} }
                                    echo"</ul>
                                </div>
                            </div>
							<div class='sidebar-widget widget_categories mb-40'>
                                <div class='widget-header position-relative mb-20 pb-10'>
                                    <h5 class='widget-title'>Categories</h5>
                                </div>
                                <div class='post-block-list post-module-1 post-module-5'>
                                    <ul>";
										$t=0;
										$ss13 = "select * from sms_link where des1='TOP CATEGORY' and panel='NO' and status='ON' order by sorder asc";
										$rs13 = $conn->query($ss13);
										if ($rs13->num_rows > 0) { while($rss13 = $rs13->fetch_assoc()) {
											$t=($t+1);
											echo"<li class='cat-item cat-item-$t'>
												<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=".$rss13["id"]."'); shiftdata('".$rss13["id"]."', 'datashiftX')\" onmouseup='CloseFunction()' target='_self'>
													<span style='color:$bodytc;font-size:10pt'>
														<i class='fa ".$rss13["icon"]."' style='color:$bodytc;font-size:12pt;margin-top:2px'></i>&nbsp;&nbsp;".$rss13["pam"]."
													</span>
												</a>										
											</li>";
										} }
                                    echo"</ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
	}
?>