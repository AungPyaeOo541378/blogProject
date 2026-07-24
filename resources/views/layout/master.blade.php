<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
crossorigin="anonymous">
<body>

   <div class="container">
     <div class="row bg-dark align-items-center justify-content-center p-3">
        <h1 class="text-white text-center">Blog Project</h1>
     </div>
   </div>

    @yield('content')
    @include('sweetalert::alert')

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
crossorigin="anonymous">

</script>

<script>

    function previewImage(event){
        var reader = new FileReader();
        reader.onload = function(){

            var outputImage = document.getElementById('outputImage');
            outputImage.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
   
</script>
</html>