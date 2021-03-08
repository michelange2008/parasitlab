<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style>

    .btn {
      display: inline-block;
      font-weight: 400;

      color: white !important;
      text-align: center;
      vertical-align: middle;
      cursor: pointer;
      -webkit-user-select: none;
         -moz-user-select: none;
          -ms-user-select: none;
              user-select: none;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.6;
      border-radius: 0.25rem;
      text-decoration: none;
      -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .font-weight-bold {
      font-weight: bold;
    }

    .btn-red {
      background: #8F230A !important;
    }

    .btn-light {
      background: DarkBlue !important;
    }

    </style>
  </head>
  <body>
    @yield('content')
  </body>
</html>
