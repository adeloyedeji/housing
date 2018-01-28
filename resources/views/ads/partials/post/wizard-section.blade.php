<div class="wizard-card ct-wizard-orange" id="wizardProperty">
    <form action="{{ url('ads') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="wizard-header">
            <h3>
                <b>Post</b> A NEW ADVERT  <br>
                <small>Fill in the form below to post your ad and start getting feedbacks.</small>
            </h3>
        </div>

        @if( session()->has('post-ad') )
            <div class="alert alert-warning alert-dismissable"  id="alert_warn">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span id="alert_warn_msg">{{ session('post-ad') }}</span>
            </div>
        @endif
        
        <ul>
            <li><a href="#step1" data-toggle="tab">Room for rent </a></li>
            <li><a href="#step2" data-toggle="tab">Features </a></li>
            <!--<li><a href="#step3" data-toggle="tab">Room mate </a></li>-->
            <li><a href="#step4" data-toggle="tab">Photo </a></li>
            <li><a href="#step5" data-toggle="tab">Finalization </a></li>
        </ul>

        <div class="tab-content">

            @include('ads.partials.post.step1')
            <!--  End step 1 -->

            @include('ads.partials.post.step2')
            <!-- End step 2 -->

            <!--@include('ads.partials.post.step3')-->
            <!--  End step 3 -->

            @include('ads.partials.post.step4')
            <!--  End step 4 -->
            
            @include('ads.partials.post.step5')
            <!--  End step 4 -->

        </div>

        <div class="wizard-footer">
            <div class="pull-right">
                <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Finish' />
            </div>

            <div class="pull-left">
                <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
            </div>
            <div class="clearfix"></div>                                            
        </div>	
    </form>
</div>