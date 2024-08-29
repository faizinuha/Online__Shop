<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meme Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* Loading overlay style */
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.8s ease; /* Smooth transition */
            opacity: 1;
        }
        .spinner-border {
            width: 4rem; /* Larger spinner */
            height: 4rem; /* Larger spinner */
            border-width: 0.5em; /* Thicker border */
        }
    </style>
</head>

<body>
    <!-- Loading overlay -->
    <div id="loading">
        <div class="spinner-border text-light" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    @include('navbar.post')
    <div class="">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        // JavaScript to hide loading overlay after a delay
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loading').style.opacity = '0'; 
                setTimeout(function() {
                    document.getElementById('loading').style.display = 'none'; 
                }, 800); 
            }, 1500); 
        });
    </script>
</body>

</html>
