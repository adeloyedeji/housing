<form role="form" style="padding: 20px;" enctype="multipart/form-data" method="POST" action="{{ url('ads') }}">
    <div class="tab-content">
        <div class="tab-pane active" role="tabpanel" id="step1">
            <div class="step1" style="margin-top:-5em;">
                <div class="row">
                    <div class="col-md-12">
                        @include('ads.partials.create.step-1')
                    </div>
                </div>
            </div>
            <ul class="list-inline pull-right">
                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
            </ul>
        </div>
        <div class="tab-pane" role="tabpanel" id="step2">
            <div class="step2" style="margin-top:-5em;">
                <div class="row">
                        <div class="col-md-12">
                            @include('ads.partials.create.step-2')
                        </div>
                </div>
            </div>
            <ul class="list-inline pull-right">
                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
            </ul>
        </div>
        <div class="tab-pane" role="tabpanel" id="step3">
            <div class="row" style="margin-top:-5em;">
                <div class="col-md-12">
                    @include('ads.partials.create.step-3')
                </div>
            </div>
            <ul class="list-inline pull-right">
                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
            </ul>
        </div>
        <div class="tab-pane" role="tabpanel" id="complete" style="margin-left:2em">
            <div class="row" style="margin-top:-5em;">
                @include('ads.partials.create.step-4')
            </div>
            <ul class="list-inline pull-right">
                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                <li><button type="button" class="btn btn-primary btn-info-full" id="preview-ad">preview your ad</button></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</form>