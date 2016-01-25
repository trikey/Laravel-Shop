<style type="text/css">
    .slider-item img:hover {
        cursor: pointer;
    }
</style>
<div class="banner">
    <div class="full-container">
        <div class="slider-content">
            <ul id="pager2" class="container">
            </ul>
            <!-- prev/next links -->

            <span class="prevControl sliderControl"> <i class="fa fa-angle-left fa-3x "></i></span> <span
                class="nextControl sliderControl"> <i class="fa fa-angle-right fa-3x "></i></span>

            <div class="slider slider-v1"
                 data-cycle-swipe=true
                 data-cycle-prev=".prevControl"
                 data-cycle-next=".nextControl" data-cycle-loader="wait">


                <div class="slider-item slider-item-img2" onclick="window.location='/catalog/';">
                    <img src="{{ asset('/images/new_banners/banner2.jpg') }}" class="img-responsive parallaximg sliderImg" alt="img">
                </div>
            </div>
            <!--/.slider slider-v1-->
        </div>
        <!--/.slider-content-->
    </div>
    <!--/.full-container-->
</div>