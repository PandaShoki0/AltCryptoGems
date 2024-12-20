<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $general->sitename($page_title ?? '404 | page not found') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ getImage(imagePath()['logoIcon']['path'] . '/favicon.webp') }}">
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset('assets/errors/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
            background: #434A54;
            color: white;
            font-family: "Inconsolata", monospace;
            font-size: 100%;
        }

        .maintenance {
            text-transform: uppercase;
            margin-bottom: 1rem;
            font-size: 3rem;
        }

        .container {
            display: table;
            margin: 0 auto;
            max-width: 1024px;
            width: 100%;
            height: 100%;
            align-content: center;
            position: relative;
            box-sizing: border-box;
        }

        .container .what-is-up {
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            display: block;
            vertical-align: middle;
            text-align: center;
            box-sizing: border-box;
        }

        .container .what-is-up .spinny-cogs {
            display: block;
            margin-bottom: 2rem;
        }

        @-webkit-keyframes fa-spin-one {
            0% {
                transform: translateY(-2rem) rotate(0deg);
            }

            100% {
                transform: translateY(-2rem) rotate(-359deg);
            }
        }

        @keyframes fa-spin-one {
            0% {
                transform: translateY(-2rem) rotate(0deg);
            }

            100% {
                transform: translateY(-2rem) rotate(-359deg);
            }
        }

        .fa-spin-one,
        .container .what-is-up .spinny-cogs .fa:nth-of-type(1) {
            -webkit-animation: fa-spin-one 1s infinite linear;
            animation: fa-spin-one 1s infinite linear;
        }

        @-webkit-keyframes fa-spin-two {
            0% {
                transform: translateY(-0.5rem) translateY(1rem) rotate(0deg);
            }

            100% {
                transform: translateY(-0.5rem) translateY(1rem) rotate(-359deg);
            }
        }

        @keyframes fa-spin-two {
            0% {
                transform: translateY(-0.5rem) translateY(1rem) rotate(0deg);
            }

            100% {
                transform: translateY(-0.5rem) translateY(1rem) rotate(-359deg);
            }
        }

        .fa-spin-two,
        .container .what-is-up .spinny-cogs .fa:nth-of-type(3) {
            -webkit-animation: fa-spin-two 2s infinite linear;
            animation: fa-spin-two 2s infinite linear;
        }

        .made-by-me {
            position: fixed;
            text-decoration: none;
            box-sizing: border-box;
            right: 16px;
            bottom: 16px;
            width: 44px;
            height: 44px;
            display: block;
            border-radius: 100%;
            border: 2px solid white;
            box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.3);
            font-size: 0px;
            background: url("https://assets.codepen.io/50099/internal/avatars/users/default.png") no-repeat center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="what-is-up">

            <div class="spinny-cogs">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <i class="fa fa-5x fa-cog fa-spin" aria-hidden="true"></i>
                <i class="fa fa-3x fa-cog" aria-hidden="true"></i>
            </div>
            <h1 class="maintenance">{{ __('Under Maintenance') }}</h1>
            <h2>{{ __('Our developers are hard at work updating your system. Please wait while we do this. We have also made the spinning cogs to distract you') }}.
            </h2>
        </div>
    </div>
</body>

</html>
