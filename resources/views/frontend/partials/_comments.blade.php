@include('frontend.partials._comment-form') 

@foreach($comments as $comment)
<div class="comment">
    <div class="bootstrap-tab-text-grid-left">
        @if(empty($comment->user->profile_image))
        <i class="fa fa-user"></i> 
        @else
        <img src="{{asset('public/'.$comment->user->profile_image)}}" style="height: 32px; width: 32px; border-radius: 50%;"> 
        @endif
    </div>
    <div class="bootstrap-tab-text-grid-right comment-body">
        <ul>
            <li><strong>{{$comment->user->name}}</strong></li>
        </ul>
        <p class="comment-color">{{$comment->body}}</p>
    </div>
    <div class="bootstrap-tab-text-grid-right">
        <ul>
            <li>
                <span 
                class="reply-button color-primary" 
                onclick="reply('<?php echo "reply$comment->id"; ?>')">Reply</span> 
                &bull;
                <span class="small-tag">{{$comment->created_at->diffForHumans()}}</span>
            </li>
        </ul>
    </div>
    @include('frontend.partials._replay-form', ['comment'=>$comment]) 
    @foreach($comment->replies as $replay) 
        @include('frontend.partials._comments2', ['replay'=>$replay]) 
        @include('frontend.partials._replay-form', ['comment'=>$replay]) 
            @foreach($replay->replies as $replay2) 
                @include('frontend.partials._comments2', ['replay'=>$replay2]) 
                @include('frontend.partials._replay-form', ['comment'=>$replay2]) 
                @foreach($replay2->replies as $replay3) 
                    @include('frontend.partials._comments2', ['replay'=>$replay3]) 
                    @include('frontend.partials._replay-form', ['comment'=>$replay3]) 
                    @foreach($replay3->replies as $replay4) 
                        @include('frontend.partials._comments2', ['replay'=>$replay4]) 
                        @include('frontend.partials._replay-form', ['comment'=>$replay4]) 
                    @endforeach 
                @endforeach 
            @endforeach 
    @endforeach
    <div class="clearfix"> </div>
</div>
@endforeach