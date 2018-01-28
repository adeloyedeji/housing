<div class="bd-example" data-example-id="">
    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne">
                <div class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <h3>Features</h3>
                        <p>Click here to view features of this ad</p>
                    </a>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Characteristics</h3>
                        </div>
                        <div class="col-md-6">
                            @include('ads.partials.show.characteristics')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
                <div class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <h3>Description</h3>
                        <p>Read full ad description</p>
                    </a>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Description</h3>
                        </div>
                        <div class="col-md-6">
                            @include('ads.partials.show.description')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingThree">
                <div class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h3>Perfect Room mate</h3>
                        <p>View description of the perfect room mate</p>
                    </a>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Perfect roommate</h3>
                        </div>
                        <div class="col-md-6">
                            @include('ads.partials.show.roommate')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    h2{float:left; width:100%; color:#fff; margin-bottom:30px; font-size: 14px;}
    h2 span{display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px; font-weight:700}
    h2 a{color:#fff; font-weight:bold;}

.card {
    -moz-box-direction: normal;
    -moz-box-orient: vertical;
    background-color: #fff;
    border-radius: 0.25rem;
    display: flex;
    flex-direction: column;
    position: relative;
    margin-bottom:1px;
    border:none;
}
.card-header:first-child {
    border-radius: 0;
}
.card-header {
    background-color: #ffffff;
    margin-bottom: 0;
    padding: 20px 1.25rem;
    border:none;
    
}
.card-header a i{
    float:left;
    font-size:25px;
    padding:5px 0;
    margin:0 25px 0 0px;
    color:#593196;
}
.card-header i{
    float:right;        
    font-size:30px;
    width:1%;
    margin-top:8px;
    margin-right:10px;
}
.card-header a{
    width:97%;
    float:left;
    color:#565656;
}
.card-header p{
    margin:0;
}

.card-header h3{
    margin:0 0 0px;
    font-size:20px;
    color:#b6b402;
}
.card-block {
    -moz-box-flex: 1;
    flex: 1 1 auto;
    padding: 20px;
    color:#232323;
    box-shadow:inset 0px 4px 5px rgba(0,0,0,0.1);
    border-top:1px soild #000;
    border-radius:0;
}
h5 {
    color: #593196;
    font-size: 18px;
}
</style>