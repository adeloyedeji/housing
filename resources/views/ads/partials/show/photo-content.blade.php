<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @if( count($ad_images) > 0)
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        @for($i = 1; $i < count($ad_images); $i++)
          <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
        @endfor
    @else
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    @endif
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @if( count($ad_images) > 0)
      <?php $imgCounter = 0; ?>
        @foreach($ad_images as $image)
            <?php $imgCounter += 1; ?>
            <div class="item @if($imgCounter == 1) active @endif">
              <img style="height:350px;width:100%" src="{{ asset('') }}{{ $image->image}}" alt="Los Angeles">
            </div>
        @endforeach
    @else
        <div class="item active">
          <img style="height:350px;width:100%" src="{{ asset('img/house.png') }}" alt="Los Angeles">
        </div>
    @endif
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>