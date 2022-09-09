<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movistar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Work+Sans:wght@100;300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600&display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/favicon.png') }}">
        <script src="https://kit.fontawesome.com/97f87ec59b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <div class="responsive">
        @yield("body")
    </div>
    <footer class="page-footer font-small blue" style="background-color:white;">
        <div class="row text-center" style="padding:2rem;width:100%;">
            <div class="col-6">
                <img style="width:160px;height:30px;" src="{{ asset('img/footermarca.png') }}" class="img-fluid" alt="Web Development">
            </div>
            <div class="col-6">
                <img style="width:160px;height:40px;" src="{{ asset('img/footerlogo.png') }}" class="img-fluid" alt="Web Development">
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
