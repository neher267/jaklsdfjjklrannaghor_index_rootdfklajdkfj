<div class="bootstrap-tab-text-grid replay">
    <div class="bootstrap-tab-text-grid-left">
        @if(empty($replay->user->profile_image))
        <i class="fa fa-user"></i>
        @else
        <img src="{{asset('public/'.$replay->user->profile_image)}}" style="height: 20px; width: 20px; border-radius: 50%;">
        @endif
    </div>
    <div class="bootstrap-tab-text-grid-right comment-body">
        <ul>
            <li><strong>{{$replay->user->name}}</strong> &bull;<span class="small-tag">{{$replay->created_at->diffForHumans()}}</span></li>
        </ul>
        <p class="comment-color">{{$replay->body}}</p>
    </div>
    <div class="bootstrap-tab-text-grid-right">
        <ul>
            <li><span class="reply-button color-primary" onclick="reply('<?php echo "reply$replay->id"; ?>')">Reply</span> &bull;<span class="small-tag">In Reply to {{$replay->parent->user->name}}</span></li>
        </ul>       
    </div>
    <div class="clearfix"> </div>
</div>



