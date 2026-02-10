<?php include('authenticatorx.php'); ?>

<div class='container' style='width:500px'>
  <div class='mySlides'>
    <div class='numbertext'>1 / 6</div>
    <a aria-label='Quick view' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#GalleryModal1'>
        <img id='myImz' src='media/4000-1695051016.jpg' style='width:100%'>
    </a>
    <div class='modal fade custom-modal' id='GalleryModal1' tabindex='-1' aria-labelledby='GalleryModalLabel' aria-hidden='true'>
        <div class='modal-dialog'><div class='modal-content'>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            <div class='modal-body'><img id='myImz' src='media/4000-1695051016.jpg' style='width:100%'></div>
        </div></div>
    </div>
  </div>

  <div class='mySlides'>
    <div class='numbertext'>2 / 6</div>
    <a aria-label='Quick view' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#GalleryModal2'>
        <img id='myImz' src='media/4000-1695055110.jpg' style='width:100%'>
    </a>
    <div class='modal fade custom-modal' id='GalleryModal2' tabindex='-1' aria-labelledby='GalleryModalLabel' aria-hidden='true'>
        <div class='modal-dialog'><div class='modal-content'>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            <div class='modal-body'><img id='myImz' src='media/4000-1695055110.jpg' style='width:100%'></div>
        </div></div>
    </div>
  </div>
    
  <a class='prev' onclick='plusSlides(-1)'>❮</a><a class='next' onclick='plusSlides(1)'>❯</a>

  <div class='caption-container'><p id='caption'></p></div>

  <div class='row'>
    <div class='column'><img class='demo cursor' src='media/3001-1695725077.jpg' style='width:100%' onclick='currentSlide(1)' alt='The Woods'></div>
    <div class='column'><img class='demo cursor' src='media/3002-1695022161.jpg' style='width:100%' onclick='currentSlide(2)' alt='Cinque Terre'></div>
  </div>
</div>
