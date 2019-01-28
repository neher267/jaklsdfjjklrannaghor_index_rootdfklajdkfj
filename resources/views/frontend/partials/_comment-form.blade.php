@if($user = Sentinel::check())
<div class="bootstrap-tab-text-grid comment">
    <div class="bootstrap-tab-text-grid-left">
        @if(empty($user->profile_image))
        <i class="fa fa-user"></i>
        @else
        <img src="{{asset('public/'.$user->profile_image)}}" style="height: 32px; width: 32px; border-radius: 50%;">
        @endif
    </div>
    <div class="bootstrap-tab-text-grid-right">
        <form method="post" action="{{route('product.comment.store', $product)}}">
        	{{ csrf_field() }}
            <input class="form-control" type="text" name="body" style="border-radius: 18px; padding: 4px 10px;" placeholder="Write a comment..">        	
        </form>
    </div>
    <div class="clearfix"> </div>
</div>
@else
<div class="bootstrap-tab-text-grid comment">
    <div class="bootstrap-tab-text-grid-left">
        <i class="fa fa-user"></i>
    </div>
    <div class="bootstrap-tab-text-grid-right comment-body">
    	<span class="color-primary">Leave a comment please login your accont</span>        
    </div>
    <div class="clearfix"> </div>
</div>
@endif
