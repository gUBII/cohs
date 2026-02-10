<?php

if(isset($_GET["cm"])) include("authenticatorx.php");

$PromoCatName="";
$bcn1 = "select * from sms_link where id='".$_GET["pcid"]."' order by id asc limit 1";
$bcn2 = $conn->query($bcn1);
if ($bcn2->num_rows > 0) { while($bcn3 = $bcn2->fetch_assoc()) { $PromoCatName=$bcn3["pam"]; } }


echo"<main class='main'>
    <div class='page-header breadcrumb-wrap'>
        <div class='container'>
            <div class='breadcrumb'>
                <a href='index.php' rel='nofollow'>Home</a><span></span> Promo <span></span> Coupon <span></span> Voucher <span></span>
                <a style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$_GET["pcid"]."'); shiftdatax('index.php?cPath=7001&pcid=".$_GET["pcid"]."', 'datashiftX')\" target='_self' title='$PromoCatname' target='_self' style='color:$bodytc'>
                    $PromoCatName
                </a>
            </div>
        </div>
    </div>";

    if(!isset($_GET["promoid"])){
        echo"<section class='mt-50 mb-50'>
            <div class='container custom'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='single-header mb-50 text-center'>
                            <h1 class='font-xxl text-brand'>$PromoCatName</h1>
                        </div>
                        <div class='loop-grid pr-30'>
                            <div class='row'>";
                                $b1z = "select * from promo where pid='".$_GET["pcid"]."' and status='ON' order by id desc";
                                $b2z = $conn->query($b1z);
                                if ($b2z->num_rows > 0) { while($b3z = $b2z->fetch_assoc()) {
                                    $promocategory="";
                                    $cat1 = "select * from sms_link where id='".$b3z["pid"]."' order by id asc limit 1";
                                    $cat2 = $conn->query($cat1);
                                    if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) { $promocategory=$cat3["pam"]; } }
                                    $promodate=date("D, M Y", $b3z["date"]);
                                    echo"<div class='col-lg-4'>
                                        <article class='wow fadeIn animated hover-up mb-30' style='background-color:white'>
                                            <div class='post-thumb img-hover-scale'>
                                                <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$b3z["pid"]."&promoid=".$b3z["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$b3z["pid"]."&promoid=".$b3z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self'>
                                                    <img src='media/".$b3z["image"]."' alt='".$b3z["title"]."' style='width:100%;max-height:300px'>
                                                </a>
                                                <div class='entry-meta' style='background-color:$buttonbc'>
                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$b3z["pid"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$b3z["pid"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self' style='color:$bodytc'><span class='post-in font-x-small' style='color:$buttontc'>$promocategory</span></a>
                                                </div>
                                            </div>
                                            <div class='entry-content-2'>
                                                <h3 class='post-title mb-15'>".$b3z["title"]."</h3>
                                                <p class='post-exerpt mb-30'>Value: $csymbol ".$b3z["amount"]." (Condition: ".$b3z["type"].")</p>
                                                <div class='entry-meta meta-1 font-xs color-grey mt-10 pb-10'>
                                                    <div>
                                                        <span class='post-on'> <i class='fi-rs-clock'></i> Valid Until: $promodate</span>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class='entry-content-2'>
                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$b3z["pid"]."&promoid=".$b3z["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$b3z["pid"]."&promoid=".$b3z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b3z["title"]."' target='_self' style='color:$bodytc' class='text-brand'>Read more <i class='fi-rs-arrow-right'></i></a>
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
        $b1z = "select * from promo where id='".$_GET["promoid"]."' and status='ON' order by id desc limit 1";
        $b2z = $conn->query($b1z);
        if ($b2z->num_rows > 0) { while($b3z = $b2z->fetch_assoc()) {
            $views=($b3z["views"]+1);
            $sqlx="update promo set views='$views' where id='".$b3z["id"]."'";
            if ($conn->query($sqlx) === TRUE) $tomtom=0;
            $promocategory="";
            $cat1 = "select * from sms_link where id='".$b3z["pid"]."' order by id asc limit 1";
            $cat2 = $conn->query($cat1);
            if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) { $promocategory=$cat3["pam"]; } }
            $promodate=date("D, M Y", $b3z["date"]);
            
            echo"<section class='mt-50 mb-50'>
                <div class='container custom'>
                    <div class='row'>
                        <div class='col-lg-10 m-auto'>
                            <div class='single-page pl-30'>
                                <div class='single-header style-2'>
                                    <h1 class='mb-30'>".$b3z["title"]."</h1>
                                    <div class='single-header-meta'>
                                        <div class='entry-meta meta-1 font-xs mt-15 mb-15'>
                                            <span class='post-on has-dot'>Valid Until: $promodate</span>
                                            <span class='hit-count  has-dot'>$views Used</span>
                                        </div>
                                        <div class='social-icons single-share'>
                                            <strong class='mr-10'>Share this:</strong>
                                            <div class='sharethis-inline-share-buttons'></div>
                                        </div>
                                    </div>
                                </div>
                                <figure class='single-thumbnail'><img src='media/".$b3z["image"]."' alt='".$b3z["title"]."' style='width:100%'></figure>
                                <div class='single-content'>
                                    <p>Code Value: $csymbol ".$b3z["amount"]." (Condition: ".$b3z["type"]."</p><br>
                                    <p>Valid Until: $promodate</p><hr>
                                    <p>Code Detail:<br>".$b3z["detail"]."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class='container custom'>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='single-header mb-50 text-left'><h1 class='font-xl text-brand'>Related Promos</h1></div>
                            <div class='loop-grid pr-30'>
                                <div class='row'>";
                                    $b11z = "select * from promo where pid='".$b3z["pid"]."' and status='ON' order by id desc limit 8";
                                    $b22z = $conn->query($b11z);
                                    if ($b22z->num_rows > 0) { while($b33z = $b22z->fetch_assoc()) {
                                        $promocategoryx="";
                                        $cat1x = "select * from sms_link where id='".$b33z["pid"]."' order by id asc limit 1";
                                        $cat2x = $conn->query($cat1x);
                                        if ($cat2x->num_rows > 0) { while($cat3x = $cat2x->fetch_assoc()) { $promocategoryx=$cat3x["pam"]; } }
                                        $promodatex=date("D, M Y", $b33z["date"]);
                                        echo"<div class='col-lg-3'>
                                            <article class='wow fadeIn animated hover-up mb-30'>
                                                <div class='post-thumb img-hover-scale'>
                                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$b33z["pid"]."&promoid=".$b33z["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$b33z["pid"]."&promoid=".$b33z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b33z["title"]."' target='_self'>
                                                        <img src='media/".$b33z["image"]."' alt='".$b33z["title"]."' style='width:100%;max-height:300px'>
                                                    </a>
                                                    <div class='entry-meta'>
                                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$b33z["pid"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$b33z["pid"]."&cm=1', 'datashiftX')\" target='_self' title='".$b33z["title"]."' target='_self' style='color:$bodytc'><span class='post-in font-x-small' style='color:$buttonbc'>$promocategoryx</span></a>
                                                    </div>
                                                </div>
                                                <div class='entry-content-2'>
                                                    <h3 class='post-title mb-15'>".$b33z["title"]."</h3>
                                                    <p class='post-exerpt mb-30'>Value: $csymbol ".$b33z["amount"]." (Condition: ".$b33z["type"].")</p>
                                                    <div class='entry-meta meta-1 font-xs color-grey mt-10 pb-10'>
                                                        <div>
                                                            <span class='post-on'> <i class='fi-rs-clock'></i> Valid Until: $promodatex</span>
                                                        </div>
                                                        <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=7001&pcid=".$b33z["pid"]."&promoid=".$b33z["id"]."'); shiftdatax('promo.php?cPath=7001&pcid=".$b33z["pid"]."&promoid=".$b33z["id"]."&cm=1', 'datashiftX')\" target='_self' title='".$b33z["title"]."' target='_self' style='color:$bodytc' class='text-brand'>Read more <i class='fi-rs-arrow-right'></i></a>
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
?>
