<?php
    echo"<section class='section-padding'>
        <div class='container pt-25 pb-20'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h3 class='section-title mb-20' style='color:$buttonbc'><span style='color:$bodytc'>From</span> blog</h3>
                </div>";
                $b1z = "select * from blog where status='ON' order by id desc limit 4";
                $b2z = $conn->query($b1z);
                if ($b2z->num_rows > 0) { while($b3z = $b2z->fetch_assoc()) {
                    $views=($b3z["views"]+1);
                    $sqlx="update blog set views='$views' where id='".$b3z["id"]."'";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                    $blogcategory="";
                    $cat1 = "select * from sms_link where id='".$b3z["bid"]."' order by id asc limit 1";
                    $cat2 = $conn->query($cat1);
                    if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) { $blogcategory=$cat3["pam"]; } }
                    $blogdate=date("D, M Y", $b3z["date"]);
                    echo"<div class='col-lg-6'>
                        <div class='post-list mb-4 mb-lg-0'>
                            <article class='wow fadeIn animated'>
                                <div class='d-md-flex d-block'>
                                    <div class='post-thumb d-flex mr-15'>
                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self'>
                                            <img src='media/".$b3z["image"]."' alt='".$b3z["title"]."'>
                                        </a>
                                    </div>
                                    <div class='post-content'><div class='entry-meta mb-10 mt-10'>
                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b3z["bid"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self' style='color:$bodytc'><span class='post-in font-x-small' style='color:$buttonbc'>$blogcategory</span></a>
                                    </div>
                                    <h4 class='post-title mb-10 text-limit-2-row'>".$b3z["title"]."</h4>
                                    <p class='post-exerpt mb-30'>".$b3z["introduction"]."</p>
                                    <div class='entry-meta meta-1 font-xs color-grey mt-10 pb-10'>
                                        <div>
                                            <span class='post-on' style='color:$buttonbc'>$blogdate</span>
                                            <span class='hit-count has-dot' style='color:$bodytc'>$views Views.</span>
                                        </div><br>
                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self' style='color:$bodytc'>Read More</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>";
                } }
                

            echo"</div>
        </div>
    </section>";

?>
