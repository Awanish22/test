<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    {{-- font-awesome --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <section style="padding-top: 2%;">
        <div class="container">
            <div class="row">
                <div class="col-6" style="margin: auto;">
                    <div class="card" style="border-color: #f0ad4e">
                        <div class="card-header">
                            Add Company
                        </div>
                        <div class="card-body">


                            <div class="col" style="text-align:right">
                                <a href="{{ url('/data-list') }}"><button class="btn btn-warning"><i
                                            class="fa fa-list"></i> List</button></a><br><br>
                            </div>
                            <div class="col">
                                <form action="{{ url('update_data/' . $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name <span style="color: red">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter name here"  value="{{$item->name}}"/>
                                        <span style="color: red">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email">Email <span style="color: red">*</span></label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email id here" value="{{$item->email}}" />
                                            <span style="color: red">@error('email'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="logo">logo <span style="color: red">*</span></label>
                                                <input type="file" name="logo" value="{{$item->logo}}">
                                                <span style="color: red">@error('logo'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="company">website <span style="color: red">*</span></label>
                                                    <input type="text" name="website" class="form-control"
                                                        placeholder="Enter website here" value="{{$item->website}}" />
                                                    <span style="color: red">@error('website'){{ $message }}@enderror</span>
                                                    </div>
                                                    
                                                        <button class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
                        </script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
                        </script>
                    </body>

                    </html>
