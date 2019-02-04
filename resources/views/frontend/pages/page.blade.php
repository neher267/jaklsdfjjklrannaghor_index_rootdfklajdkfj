@extends('frontend.master')

@section('content')
<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <!-- <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Contact</h3> -->
        <div class="inner_sec">
            <?php echo html_entity_decode($page->description); ?>
        </div>
    </div>
</section>
@endsection