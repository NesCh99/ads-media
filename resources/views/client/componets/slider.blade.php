<!--Banner Slider-->
<section>
    <div class="text-white" style="margin-top: 50px">
        <div class="lightSlider " data-item="1" data-controls="true" data-slide-margin="0" data-gallery="false"
            data-pause="8000" data-pauseonhover="true" data-auto="false" data-pager="false" data-loop="true">
            @foreach ($publicidades as $publicidad)
                <div class="xv-slide col-12 " data-bg-possition="top"
                    style="background-image:url(@if ($publicidad->PortadaPub) {{ Storage::url($publicidad->PortadaPub) }} @else https://images.pexels.com/photos/7383469/pexels-photo-7383469.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1 @endif);">
                    <div class="wrapper has-bottom-gradient">
                        <div class="p-md-5 p-3">
                            <div class="row">
                                <div class="col-12 col-lg-6 fadeInRight animated">
                                    <div class="xv-slider-content clearfix color-white">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    <!--slider Wrap-->
</section>
<!--Banner Slider-->
