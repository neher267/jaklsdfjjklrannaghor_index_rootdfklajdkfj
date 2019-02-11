@extends('frontend.master') @section('content')
<style type="text/css">
    .comment {
        margin-top: 15px;
    }

    .reply-button{
        cursor: default;
        font-size: 13px;
        font-weight: bold;
    }
    
    .comment-body {
        /*background-color: #ddd;
        border-radius: 50px;
        padding: 6px 25px;*/
        background-color: #f2f3f5;
        border-radius: 18px;
        box-sizing: border-box;
        color: #1c1e21;
        display: inline-block;
        line-height: 16px;
        margin: 0;
        max-width: 100%;
        word-wrap: break-word;
        position: relative;
        white-space: normal;
        word-break: break-word;
        padding: 8px 10px;
    }
    
    .comment-color {
        color: #1c1e21;
    }
    
    .replay {
        margin-left: 40px;
        margin-top: 5px;
    }
</style>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop pt-lg-4 pt-3">
            <div class="row" style="border-left: 1px solid #e4e4e4;">
                <div class="col-lg-4 single-right-left ">
                    <div class="grid images_3_of_2">
                        <div class="flexslider1">
                            <ul class="slides">
                                @foreach($product->images()->get() as $image)
                                <li data-thumb="{{asset('public/'.$image->src)}}">
                                    <div class="thumb-image">
                                        <img src="{{asset('public/'.$image->src)}}" data-imagezoom="true" class="img-fluid" alt="{{$product->name}}">
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                    <h3 style="color: #AD1457">{{$product->name}}</h3>
                    <p>
                        <strong>Price: </strong><span class="item_price">{{number_format($product->price,2)}} BDT</span>
                        <!-- <del>$1,199</del> -->
                    </p>
                    <div class="color-quality">
                        <div class="color-quality-right">
                            <h5>Description :</h5>
                            <div style="text-align: justify;">
                                <?php echo html_entity_decode($product->description) ?>
                            </div>
                            <form method="post" action="{{route('add-to-cart', $product)}}" style="display: inline;">
                                {{csrf_field()}}
                                <input class="form-control cart-form" type="number" name="qty" value="1">
                                <button type="submit" class="btn btn-sm" style="margin-bottom: 2px;">Add To 
                                    <i class="fas fa-cart-plus color-primary"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- <ul class="footer-social text-left mt-lg-4 mt-3">
                        <li>Share On : </li>
                        <li class="mx-2">
                            <a href="#">
                                <span class="fab fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#">
                                <span class="fab fa-twitter"></span>
                            </a>
                        </li>                        
                    </ul> -->
                </div>
                <div class="clearfix"></div>                
            </div>
            <div class="row" style="border: 1px solid #e4e4e4; margin-top: 4em; padding-bottom: 2em">
                <div class="col-md-8 col-sm-12">
                    <p class="color-primary" style="font-weight: bold;">Comments</p>
                    @include('frontend.partials._comments', ['comments'=>$product->comments])
                </div>  

                <div class="col-md-4 col-sm-12 category-side">
                    <p class="color-primary" style="font-weight: bold;">Categories</p>
                    @foreach($categories as $category)  
                    <div class="col-md-12 col-sm-12" style="padding: 3px;">
                        <div class="product-googles-info googles" style="border: 1px solid #e4e4e4;">
                                <div class="men-pro-item">
                                    <div class="men-thumb-item">
                                        <img src="{{asset('public/'.$category->thumbnail)}}" class="img-fluid" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{route('category.foods', $category)}}" class="link-product-add-cart">Products</a>
                                            </div>
                                        </div>
                                        <!-- <span class="product-new-top">New</span> -->
                                    </div>
                                    <div class="item-info-product">
                                        <div class="info-product-price">
                                            <p class="text-center category-name">
                                                <a class="color-primary" href="{{route('category.foods', $category)}}">{{$category->name}}</a>
                                            </p>                                        
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> 
                    </div>
                    @endforeach
                </div>               

                
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">     
    function reply(id)
    {
        $('#'+id).css("display", "block");          
    }
</script>
@endsection