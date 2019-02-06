
<style type="text/css">
    @foreach($images as $key=>$image)
    .carousel-item<?php  echo $key>0 ? ".item$key":''?>{
        background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{asset('public/'.$image->src)}}) no-repeat;
        background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{asset('public/'.$image->src)}}) no-repeat;
        background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{asset('public/'.$image->src)}}) no-repeat;
        background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url({{asset('public/'.$image->src)}}) no-repeat;
        background-size: cover;    
    }
    @endforeach
</style>

<div class="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($images as $key=>$image)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$key==0 ? 'active':''}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($images as $key=>$image)
            <div class="carousel-item {{$key==0 ? 'active':'item'.$key}}">
                <div class="carousel-caption text-center">
                    @if($details = $image->image_details)
                    <h3>{{$details->title}}
                        <span>{{$details->body}}</span>
                    </h3>
                        @if(!empty($details->product_slug))
                        <a href="{{url('menu/'.$details->product_slug)}}" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                        @endif
                    @endif
                    
                </div>
            </div>           
            @endforeach                       
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--//1 -->
</div>