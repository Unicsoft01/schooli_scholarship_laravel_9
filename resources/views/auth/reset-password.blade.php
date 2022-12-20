@php
    $site = App\Models\Settings::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
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

    <title>Password Page </title>

    <!-- vendor css -->
    <link href="{{ url('/') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ url('/') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">{{ $site->site_name }} <span class="tx-info tx-normal"></span></div>
        <div class="tx-center mg-b-60">Reset Your Password!</div>

        <form action="{{ route('password.store') }}" method="post">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">


            <div class="form-group">
                <input id="email"  type="email" name="email"  :value="old('email', $request->email)" required autofocus  class="form-control" placeholder="Enter your Email Address">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div><!-- form-group -->
            <div class="form-group">
              <input name="password" required id="password" type="password" class="form-control" placeholder="Enter a new password">
              <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>
            
            <div class="form-group">
              <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control" placeholder="COMFIRM new password">
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
            </div>



              <button style="background: indigo;" type="submit" class="btn btn-info btn-block">{{ __('Reset Password') }}</button>
        </form>
        {{-- <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div> --}}
      </div>
      <!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{ url('/') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/lib/popper.js/popper.js"></script>
    <script src="{{ url('/') }}/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>



