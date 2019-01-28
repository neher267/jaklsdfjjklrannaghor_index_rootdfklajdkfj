<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav-mega mx-auto">
            <li class="nav-item {{Request::is('/')? 'active':''}}" style="text-align: center;">
                <a class="nav-link ml-lg-0" href="{{url('/')}}">Home
				</a>
            </li>
            
            <li class="nav-item {{Request::is('menu')? 'active':''}}" style="text-align: center;">
                <a class="nav-link" href="{{url('menu')}}">Foods
                </a>
            </li>

            <li class="nav-item {{Request::is('contact')? 'active':''}}" style="text-align: center;">
                <a class="nav-link" href="{{url('contact')}}">Contact</a>
            </li>
        </ul>
    </div>
</nav>