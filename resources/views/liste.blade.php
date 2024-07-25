<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<title>Liste de produits</title>
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach($liste as $listes)
            <div class="col-md-3 mb-5">
                <div class="card" >
                    <img src="{{$listes->image_produit}}" class="card-img-top" alt="..." width="100px" height="250px" >
                    <div class="card-body">
                        <h5 class="card-title">{{$listes->nom_produit}}</h5>
                        <p class="card-text">{{$listes->description_produit}}</p>
                        <a href="{{route('detail',$listes->id )}}" class="btn btn-primary">Voir plus</a>
                        <a href="#" class="btn btn-primary">{{$listes->prix_produit}}</a>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</body>

</html>