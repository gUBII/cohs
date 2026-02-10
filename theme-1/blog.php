<?php

if(isset($_GET["cm"])) include("authenticatorx.php");

$BlogCatName="";
$bcn1 = "select * from sms_link where id='".$_GET["bcid"]."' order by id asc limit 1";
$bcn2 = $conn->query($bcn1);
if ($bcn2->num_rows > 0) { while($bcn3 = $bcn2->fetch_assoc()) { $BlogCatName=$bcn3["pam"]; } }


echo"<main class='main'>
    <div class='page-header breadcrumb-wrap'>
        <div class='container'>
            <div class='breadcrumb'>
                <a href='index.php' rel='nofollow'>Home</a><span></span> Blog <span></span>
                <a style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$_GET["bcid"]."'); shiftdatax('index.php?cPath=7000&bcid=".$_GET["bcid"]."', 'datashiftX')\" target='_self' title='$BlogCatName' target='_self' style='color:$bodytc'>
                    $BlogCatName
                </a>
            </div>
        </div>
    </div>";

    if(!isset($_GET["blogid"])){
        echo"<section class='mt-50 mb-50'>
            <div class='container custom'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='single-header mb-50 text-center'>
                            <h1 class='font-xxl text-brand'>$BlogCatName</h1>
                        </div>
                        <div class='loop-grid pr-30'>
                            <div class='row'>";
                                $b1z = "select * from blog where bid='".$_GET["bcid"]."' and status='ON' order by id desc";
                                $b2z = $conn->query($b1z);
                                if ($b2z->num_rows > 0) { while($b3z = $b2z->fetch_assoc()) {
                                    $blogcategory="";
                                    $cat1 = "select * from sms_link where id='".$b3z["bid"]."' order by id asc limit 1";
                                    $cat2 = $conn->query($cat1);
                                    if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) { $blogcategory=$cat3["pam"]; } }
                                    $blogdate=date("D, M Y", $b3z["date"]);
                                    echo"<div class='col-lg-3'>
                                        <article class='wow fadeIn animated hover-up mb-30' style='background-color:white'>
                                            <div class='post-thumb img-hover-scale'>
                                                <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self'>
                                                    <img src='media/".$b3z["image"]."' alt='".$b3z["title"]."' style='width:100%;max-height:300px'>
                                                </a>
                                                <div class='entry-meta' style='background-color:$buttonbc'>
                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b3z["bid"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self' style='color:$bodytc'><span class='post-in font-x-small' style='color:$buttontc'>$blogcategory</span></a>
                                                </div>
                                            </div>
                                            <div class='entry-content-2'>
                                                <h3 class='post-title mb-15'>".$b3z["title"]."</h3>
                                                <p class='post-exerpt mb-30'>".$b3z["introduction"]."</p>
                                                <div class='entry-meta meta-1 font-xs color-grey mt-10 pb-10'>
                                                    <div>
                                                        <span class='post-on'> <i class='fi-rs-clock'></i> $blogdate</span>
                                                        <span class='hit-count has-dot'>".$b3z["views"]." Views</span>
                                                    </div>
                                                </div>
                                                <div class='entry-meta meta-1 font-xs color-grey mt-10 pb-10'>
                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self' style='color:$bodytc' class='text-brand'>Read more <i class='fi-rs-arrow-right'></i></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>";
                                } }
                            echo"</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>";
    }else{
        $b1z = "select * from blog where id='".$_GET["blogid"]."' and status='ON' order by id desc limit 1";
        $b2z = $conn->query($b1z);
        if ($b2z->num_rows > 0) { while($b3z = $b2z->fetch_assoc()) {
            $views=($b3z["views"]+1);
            $sqlx="update blog set views='$views' where id='".$b3z["id"]."'";
            if ($conn->query($sqlx) === TRUE) $tomtom=0;
            $blogcategory="";
            $cat1 = "select * from sms_link where id='".$b3z["bid"]."' order by id asc limit 1";
            $cat2 = $conn->query($cat1);
            if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) { $blogcategory=$cat3["pam"]; } }
            $blogdate=date("D, M Y", $b3z["date"]);
            
            echo"<section class='mt-50 mb-50'>
                <div class='container custom'>
                    <div class='row'>
                        <div class='col-lg-10 m-auto'>
                            <div class='single-page pl-30'>
                                <div class='single-header style-2'>
                                    <h1 class='mb-30'>".$b3z["title"]."</h1>
                                    <div class='single-header-meta'>
                                        <div class='entry-meta meta-1 font-xs mt-15 mb-15'>
                                            <span class='post-by'>By <a href='#'>".$b3z["author"]."</a></span>
                                            <span class='post-on has-dot'>$blogdate</span>
                                            <span class='hit-count  has-dot'>$views Views</span>
                                        </div>
                                        <div class='social-icons single-share'>
                                            <strong class='mr-10'>Share this:</strong>
                                            <div class='sharethis-inline-share-buttons'></div>
                                        </div>
                                    </div>
                                </div>
                                <figure class='single-thumbnail'><img src='media/".$b3z["image"]."' alt='".$b3z["title"]."' style='width:100%'></figure>
                                <div class='single-content'>
                                    <p>".$b3z["introduction"]."</p>
                                    <p>".$b3z["detail"]."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class='container custom'>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='single-header mb-50 text-left'><h1 class='font-xl text-brand'>Related Blogs</h1></div>
                            <div class='loop-grid pr-30'>
                                <div class='row'>";
                                    $b11z = "select * from blog where bid='".$b3z["bid"]."' and status='ON' order by id desc limit 8";
                                    $b22z = $conn->query($b11z);
                                    if ($b22z->num_rows > 0) { while($b33z = $b22z->fetch_assoc()) {
                                        $blogcategoryx="";
                                        $cat1x = "select * from sms_link where id='".$b33z["bid"]."' order by id asc limit 1";
                                        $cat2x = $conn->query($cat1x);
                                        if ($cat2x->num_rows > 0) { while($cat3x = $cat2x->fetch_assoc()) { $blogcategoryx=$cat3x["pam"]; } }
                                        $blogdatex=date("D, M Y", $b33z["date"]);
                                        echo"<div class='col-lg-3'>
                                            <article class='wow fadeIn animated hover-up mb-30'>
                                                <div class='post-thumb img-hover-scale'>
                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b33z["bid"]."&blogid=".$b33z["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b33z["bid"]."&blogid=".$b33z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b33z["title"]."' target='_self'>
                                                        <img src='media/".$b33z["image"]."' alt='".$b33z["title"]."' style='width:100%;max-height:300px'>
                                                    </a>
                                                    <div class='entry-meta'>
                                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b33z["bid"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b33z["bid"]."&cm=1', 'datashiftX')\" target='_self' title='".$b33z["title"]."' target='_self' style='color:$bodytc'><span class='post-in font-x-small' style='color:$buttonbc'>$blogcategoryx</span></a>
                                                    </div>
                                                </div>
                                                <div class='entry-content-2'>
                                                    <h3 class='post-title mb-15'>".$b33z["title"]."</h3>
                                                    <p class='post-exerpt mb-30'>".$b33z["introduction"]."</p>
                                                    <div class='entry-meta meta-1 font-xs color-grey mt-10 pb-10'>
                                                        <div>
                                                            <span class='post-on'> <i class='fi-rs-clock'></i> $blogdatex</span>
                                                            <span class='hit-count has-dot'>".$b33z["views"]." Views</span>
                                                        </div>
                                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b33z["bid"]."&blogid=".$b33z["id"]."'); shiftdatax('blog.php?cPath=7000&bcid=".$b33z["bid"]."&blogid=".$b33z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b33z["title"]."' target='_self' style='color:$bodytc' class='text-brand'>Read more <i class='fi-rs-arrow-right'></i></a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>";
                                    } }
                                echo"</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>";
        } }
    }

echo"</main>";

/*
echo"<section class='section-padding'>
    <div class='container pt-25 pb-20'>
        <div class='row'>
            <div class='col-lg-12'>
                <h3 class='section-title mb-20' style='color:$buttonbc'><span style='color:$bodytc'>From</span> blog</h3>
            </div>";
            $b1z = "select * from blog where status='ON' order by id desc limit 4";
            $b2z = $conn->query($b1z);
            if ($b2z->num_rows > 0) { while($b3z = $b2z->fetch_assoc()) {
                $views=($b3z["viewes"]+1);
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
                                    <a style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."'); shiftdatax('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self'>
                                        <img src='media/".$b3z["image"]."' alt='".$b3z["title"]."'>
                                    </a>
                                </div>
                                <div class='post-content'><div class='entry-meta mb-10 mt-10'>
                                    <a class='entry-meta meta-2' href=''><span class='post-in font-x-small' style='color:$buttonbc'>$blogcategory</span></a>
                                </div>
                                <h4 class='post-title mb-25 text-limit-2-row'>".$b3z["title"]."</h4>
                                <div class='entry-meta meta-1 font-xs color-grey mt-10 pb-10'>
                                    <div>
                                        <span class='post-on' style='color:$buttonbc'>$blogdate</span>
                                        <span class='hit-count has-dot' style='color:$bodytc'>$views Views.</span>
                                    </div><br>
                                    <a style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."'); shiftdatax('index.php?cPath=7000&bcid=".$b3z["bid"]."&blogid=".$b3z["id"]."', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self' style='color:$bodytc'>Read More</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>";
            } }
            

        echo"</div>
    </div>
</section>";
*/

?>
