<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
    <h2>Slideshow Indicators</h2>
    <p>Using images to indicate how many slides there are in the slideshow, and highlight the image the user is currently viewing.</p>
</div>

<div class="w3-content" style="max-width:1200px">
    <?php if($photosProduit != false):?>
        <?php $count = 1;?>
        <?php $slide = 1;?>
        <?php foreach($photosProduit as $pho):?>
            <img class="mySlides" src="<?= base_url();?>uploads/images/<?= $pho->photo_name;?>" <?php if($slide == 1){?> style="width:100%;" <?php } else{ ;?> style="width:100%;display:none" <?php } ;?>>
            <?php $slide++; ?>
        <?php endforeach;?>
        <div class="w3-row-padding w3-section">
            <?php foreach($photosProduit as $pho):?>
                <div class="w3-col s4">
                    <?= $count;?>
                    <img class="demo w3-opacity w3-hover-opacity-off" src="<?= base_url();?>uploads/images/<?= $pho->photo_name;?>" style="width:100%;cursor:pointer" onclick="currentDiv(<?= $count;?>)">
                </div>
                <?php $count++; ?>
            <?php endforeach;?>
        </div>
    <?php endif;?>
  <!--  <img class="mySlides" src="<?= base_url();?>assets/front/images/blog/blog-one.jpg" style="width:100%;display:none">
    <img class="mySlides" src="<?= base_url();?>assets/front/images/blog/blog-two.jpg" style="width:100%">
    <img class="mySlides" src="<?= base_url();?>assets/front/images/blog/blog-three.jpg" style="width:100%;display:none">

    <div class="w3-row-padding w3-section">
        <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off" src="<?= base_url();?>assets/front/images/blog/blog-one.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
        </div>
        <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off" src="<?= base_url();?>assets/front/images/blog/blog-two.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
        </div>
        <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off" src="<?= base_url();?>assets/front/images/blog/blog-three.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
        </div>
    </div>-->
</div>

<script>
    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " w3-opacity-off";
    }
</script>

</body>
</html>

