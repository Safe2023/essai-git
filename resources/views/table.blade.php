<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" height: 60px;
        width: 200px;" >
                Ajouter un produit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout de produit</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('creat_product')}}" method="post">
                                @csrf

                                @if (session ()-> has ('success') )
                                <div class="alert alert-success">{{session('success')}}</div>
                                @endif

                                <div class="row">
                                    <h3 class="text-center">Ajouter un produit</h3>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nom du produit" aria-label="First name" name="nom_produit">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Description" aria-label="Last name" name="description_produit">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Description complète" aria-label="Last name" name="description_complete">
                                    </div>
                                </div>
                                <div class="row mt-4 mb-4">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Image du produit" aria-label="First name" name="image_produit">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Prix du produit" aria-label="Last name" name="prix_produit">
                                    </div>
                                </div>


                                <div class="col-12 ">
                                    <input type="submit" class="btn btn-success w-100" value="Ajouter">
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du produit</th>
                        <th scope="col">image produit</th>
                        <th scope="col">Prix produit</th>
                        <th scope="col">Description </th>
                        {{--<th scope="col">Description Complète</th>--}}
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($table as $tables)

                    <tr>
                        <th scope="row">{{ $tables->id}}</th>
                        <td>{{ $tables->nom_produit}} </td>
                        <td>{{ $tables->image_produit }}</td>
                        <td>{{ $tables->prix_produit}}</td>
                        <td>{{ $tables->description_produit}}</td>
                        {{--<td>{{ $tables->description_complete}}</td>--}}
                        <td class="d-flex">
                            <a href="{{route('edit',$tables->id)}}" class="btn btn-success"><i class="bi bi-arrow-bar-up"></i></a>&nbsp;
                            <a href="{{route('delete',$tables->id)}}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>