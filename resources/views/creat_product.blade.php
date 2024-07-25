<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ajouter un produit</title>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6  pb-5">

                <form action="{{route('creat_product')}}" method="post">
                    @csrf

                    @if (session ()-> has ('success') )
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <div class="row mt-4 mb-4">
                        <h3>Ajouter un produit</h3>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nom du produit" aria-label="First name" name="nom_produit" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Description" aria-label="Last name" name="description_produit" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Description complète" aria-label="Last name" name="description_complete" >
                        </div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Image du produit" aria-label="First name" name="image_produit">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Prix du produit" aria-label="Last name" name="prix_produit" >
                        </div>
                    </div> 

                    <div class="col-12 ">
                        <input type="submit" class="btn btn-primary w-100" value="Ajouter">
                    </div>
                </form>
            </div>


            </form>
        </div>

        <div class="col-md-3"></div>

    </div>

</body>

</html>