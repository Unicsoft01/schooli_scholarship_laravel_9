@php
    $site = App\Models\Settings::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="{{ url('/') }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Register </title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">{{ $site->site_name }}</div>
        {{-- <div class="tx-center mg-b-60">Professional Admin Template Design</div> --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" :value="old('name')" required autofocus  class="form-control" placeholder="Enter your full name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- form-group -->
        <div class="form-group">
            <label for="name">Email</label>
            <input type="email" name="email" :value="old('email')" required  class="form-control" placeholder="Enter a Valid Email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- form-group -->
        <div class="form-group">
            <label for="name">Password</label>
            <input type="password"
            name="password"
            required autocomplete="new-password"  class="form-control" placeholder="Choose a password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- form-group -->
        <div class="form-group">
            <label for="name">Comfirm Password</label>
            <input id="password_confirmation" type="password"
            name="password_confirmation" required  class="form-control" placeholder="Choose a password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- form-group -->
        
        
        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <button type="submit"  style="background: indigo;"  class="btn btn-info btn-block">Sign Up</button>

        <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
        </form>
    </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{ url('/') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/lib/popper.js/popper.js"></script>
    <script src="{{ url('/') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ url('/') }}/lib/select2/js/select2.min.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>
