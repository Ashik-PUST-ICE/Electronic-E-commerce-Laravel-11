<!DOCTYPE html>
<html>

<head>
@include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

  </div>
  <!-- end hero area -->

  <!-- shop section -->
<div>
    @include('home.product')
</div>

  <!-- end shop section -->








  <!-- info section -->
 @include('home.footer')

  <!-- end info section -->

@include('home.js')


</body>

</html>
