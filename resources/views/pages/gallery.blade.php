@extends('main')

@section('title', 'Галерея')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="portfolios">
          <div class="text-center">
            <h2>Галерея</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Cras suscipit arcu<br> vestibulum volutpat libero sollicitudin vitae Curabitur ac aliquam <br>
            </p>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <a href="img/gallery/Мем1.jpg" class="flipLightBox">
						<img src="img/gallery/Мем1.jpg" width="230" height="230" alt="Image 1" />
						<span><b>LightBox Group 1, Image 1</b> Text to accompany first lightbox image</span>
					</a>

          <a href="img/gallery/Мем2.jpg" class="flipLightBox">
						<img src="img/gallery/Мем2.jpg" width="230" height="230" alt="Image 2" />
						<span><b>LightBox Group 1, Image 2</b><br />Text to accompany 2nd lightbox image</span>
					</a>
          <a href="img/gallery/Мем3.jpg"" class="flipLightBox">
						<img src="img/gallery/Мем3.jpg"" width="230" height="230" alt="Image 3" />
						<span><b>LightBox Group 1, Three</b> Text to accompany the third lightbox image</span>
					</a>

          <a href="img/gallery/Мем4.jpg"" class="flipLightBox">
						<img src="img/gallery/Мем4.jpg"" width="230" height="230" alt="Image 4" />
						<span><b>The Group 1 Final LightBox</b> Text to accompany the last of the lighboxes</span>
					</a>
        </div>
      </div>
    </div>
  </div>

  <div class="portfolio-2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <a href="img/gallery/Мем5.jpg" class="flipLightBox">
						<img src="img/gallery/Мем5.jpg" width="250" height="250" alt="Image 1" />
						<span><b>LightBox Group 1, Image 1</b> Text to accompany first lightbox image</span>
					</a>

          <a href="img/gallery/Мем7.jpg" class="flipLightBox">
						<img src="img/gallery/Мем7.jpg" width="250" height="250" alt="Image 2" />
						<span><b>LightBox Group 1, Image 2</b><br />Text to accompany 2nd lightbox image</span>
					</a>

          <a href="img/32.jpg" class="flipLightBox">
						<img src="img/32.jpg" width="250" height="250" alt="Image 3" />
						<span><b>LightBox Group 1, Three</b> Text to accompany the third lightbox image</span>
					</a>

          <a href="img/33.jpg" class="flipLightBox">
						<img src="img/33.jpg" width="250" height="250" alt="Image 4" />
						<span><b>The Group 1 Final LightBox</b> Text to accompany the last of the lighboxes</span>
					</a>
        </div>
      </div>
    </div>
  </div>

@endsection

