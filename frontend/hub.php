<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Blogger'Z Zone </title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>

</head>

<body>
  <!-- preloader -->
  <div class="preloader">
    <div class="loader">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- /preloader -->

<!-- dividers -->
<div class="dividers">
  <div class="divider"></div>
  <div class="divider"></div>
  <div class="divider"></div>
  <div class="divider"></div>
</div>

<header class="navigation">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.html"><img class="img-fluid" src="images/logo.jpg" style="height:80px" alt="parsa"></a>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navogation"
      aria-controls="navogation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navogation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link text-uppercase text-dark" href="#1" 
           role="button" >
            Home
          </a>
       
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="category.html">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="contact.html">Contact</a>
        </li>
      </ul>
      <form class="form-inline position-relative ml-lg-4">
        <input class="form-control px-0 w-100" type="search" placeholder="Search">
        <!-- <button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button> -->
        <a href="search.html" class="search-icon"><i class="ti-search text-dark"></i></a>
      </form>
    </div>
  </nav>
</header>

<!-- hero area -->
<section class="hero-section" id="1">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-end">
        <h1 class="mb-0">Welcome</h1>
        <h2 class="mb-100 title-border-lg">to <i>Jhon Abraham Blog</i></h2>
        <p class="mb-80 mr-5">I’m a Freelance Interactive Art Director based in France. Focusing across branding and
          identity, digital and
          print.</p>
        <span class="font-secondary text-dark mr-3 mr-sm-5">Follow</span>
        <ul class="list-inline d-inline-block mb-5">
          <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-facebook"></i></a></li>
          <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-twitter-alt"></i></a></li>
          <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-linkedin"></i></a></li>
          <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-github"></i></a></li>
        </ul>
      </div>
      <div class="col-lg-6 text-right">
        <img class="img-fluid" src="images/banner-img.png" alt="banner-image">
      </div>
    </div>
  </div>
</section>
<!-- /hero area -->

<!-- blog post -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-100">
        <article data-file="articles/b.html" data-target="article" class="article-full-width">
          <div class="post-image">
            <img class="img-fluid" src="images/masonary-post/post-2.jpg" alt="post-thumb">
          </div>
          <div class="post-content">
            <ul class="list-inline d-flex justify-content-between border-bottom post-meta pb-2 mb-4">
              <li class="list-inline-item"><i class="ti-calendar mr-2"></i>June 2, 2018</li>
              <li class="list-inline-item"><i class="ti-alarm-clock mr-2"></i><span class="eta">8 min</span> read</li>
            </ul>
            <h4 class="mb-4"><a href="blog-single.html" class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit</a></h4>
            <p class="mb-0 post-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.</p>
            <a class="btn btn-transparent mb-4" href="blog-single.html">Continue...</a>
          </div>
        </article>
      </div>
      <div class="col-12 mb-100">
        <article data-file="articles/b.html" data-target="article" class="article-full-width article-right">
          <div class="post-image">
            <img class="img-fluid" src="images/masonary-post/post-3.jpg" alt="post-thumb">
          </div>
          <div class="post-content">
            <ul class="list-inline d-flex justify-content-between border-bottom post-meta pb-2 mb-4">
              <li class="list-inline-item"><i class="ti-calendar mr-2"></i>June 2, 2018</li>
              <li class="list-inline-item"><i class="ti-alarm-clock mr-2"></i><span class="eta">8 min</span> read</li>
            </ul>
            <h4 class="mb-4"><a href="blog-single.html" class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit</a></h4>
            <p class="mb-0 post-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.</p>
            <a class="btn btn-transparent mb-4" href="blog-single.html">Continue...</a>
          </div>
        </article>
      </div>
      <div class="col-12 mb-100">
        <article data-file="articles/b.html" data-target="article" class="article-full-width">
          <div class="post-image">
            <img class="img-fluid" src="images/masonary-post/post-4.jpg" alt="post-thumb">
          </div>
          <div class="post-content">
            <ul class="list-inline d-flex justify-content-between border-bottom post-meta pb-2 mb-4">
              <li class="list-inline-item"><i class="ti-calendar mr-2"></i>June 2, 2018</li>
              <li class="list-inline-item"><i class="ti-alarm-clock mr-2"></i><span class="eta">8 min</span> read</li>
            </ul>
            <h4 class="mb-4"><a href="blog-single.html" class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit</a></h4>
            <p class="mb-0 post-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.</p>
            <a class="btn btn-transparent mb-4" href="blog-single.html">Continue...</a>
          </div>
        </article>
      </div>
      <div class="col-12 mb-100">
        <article data-file="articles/b.html" data-target="article" class="article-full-width article-right">
          <div class="post-image">
            <img class="img-fluid" src="images/masonary-post/post-5.jpg" alt="post-thumb">
          </div>
          <div class="post-content">
            <ul class="list-inline d-flex justify-content-between border-bottom post-meta pb-2 mb-4">
              <li class="list-inline-item"><i class="ti-calendar mr-2"></i>June 2, 2018</li>
              <li class="list-inline-item"><i class="ti-alarm-clock mr-2"></i><span class="eta">8 min</span> read</li>
            </ul>
            <h4 class="mb-4"><a href="blog-single.html" class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit</a></h4>
            <p class="mb-0 post-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.</p>
            <a class="btn btn-transparent mb-4" href="blog-single.html">Continue...</a>
          </div>
        </article>
      </div>
      <div class="col-12 mb-100">
        <article data-file="articles/b.html" data-target="article" class="article-full-width">
          <div class="post-image">
            <img class="img-fluid" src="images/masonary-post/post-6.jpg" alt="post-thumb">
          </div>
          <div class="post-content">
            <ul class="list-inline d-flex justify-content-between border-bottom post-meta pb-2 mb-4">
              <li class="list-inline-item"><i class="ti-calendar mr-2"></i>June 2, 2018</li>
              <li class="list-inline-item"><i class="ti-alarm-clock mr-2"></i><span class="eta">8 min</span> read</li>
            </ul>
            <h4 class="mb-4"><a href="blog-single.html" class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit</a></h4>
            <p class="mb-0 post-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.</p>
            <a class="btn btn-transparent mb-4" href="blog-single.html">Continue...</a>
          </div>
        </article>
      </div>
      <div class="col-12 mb-100">
        <article data-file="articles/b.html" data-target="article" class="article-full-width article-right">
          <div class="post-image">
            <img class="img-fluid" src="images/masonary-post/post-1.jpg" alt="post-thumb">
          </div>
          <div class="post-content">
            <ul class="list-inline d-flex justify-content-between border-bottom post-meta pb-2 mb-4">
              <li class="list-inline-item"><i class="ti-calendar mr-2"></i>June 2, 2018</li>
              <li class="list-inline-item"><i class="ti-alarm-clock mr-2"></i><span class="eta">8 min</span> read</li>
            </ul>
            <h4 class="mb-4"><a href="blog-single.html" class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit</a></h4>
            <p class="mb-0 post-summary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.</p>
            <a class="btn btn-transparent mb-4" href="blog-single.html">Continue...</a>
          </div>
        </article>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <nav>
          <ul class="pagination justify-content-center align-items-center">
            <li class="page-item">
              <span class="page-link">&laquo; Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">01</a></li>
            <li class="page-item active">
              <span class="page-link">02</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">03</a></li>
            <li class="page-item"><a class="page-link" href="#">04</a></li>
            <li class="page-item"><a class="page-link" href="#">05</a></li>
            <li class="page-item"><a class="page-link" href="#">06</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next &raquo;</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- /blog post -->

<!-- instagram -->
<section>
  <div class="container-fluid px-0">
    <div class="row no-gutters instagram-slider" id="instafeed" data-userId="4044026246"
      data-accessToken="4044026246.1677ed0.8896752506ed4402a0519d23b8f50a17"></div>
  </div>
</section>
<!-- /instagram -->

<footer class="bg-secondary">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <a href="index.html"><img src="images/logo.png" alt="persa" class="img-fluid"></a>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h6>Address</h6>
          <ul class="list-unstyled">
            <li class="font-secondary text-dark">Sydney</li>
            <li class="font-secondary text-dark">6 rip carl Avenue CA 90733</li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h6>Contact Info</h6>
          <ul class="list-unstyled">
            <li class="font-secondary text-dark">Tel: +90 000 333 22</li>
            <li class="font-secondary text-dark">Mail: exmaple@ymail.com</li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h6>Follow</h6>
          <ul class="list-inline d-inline-block">
            <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-github"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center pb-3">
    <p class="mb-0">Copyright ©<script>var CurrentYear = new Date().getFullYear()
    document.write(CurrentYear)</script> a theme by  <a href="https://themefisher.com/">themefisher.com</a></p>
  </div>
</footer>

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- masonry -->
<script src="plugins/masonry/masonry.js"></script>
<!-- instafeed -->
<script src="plugins/instafeed/instafeed.min.js"></script>
<!-- smooth scroll -->
<script src="plugins/smooth-scroll/smooth-scroll.js"></script>
<!-- headroom -->
<script src="plugins/headroom/headroom.js"></script>
<!-- reading time -->
<script src="plugins/reading-time/readingTime.min.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>