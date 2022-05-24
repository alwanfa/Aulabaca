<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aulabaca | Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./images/Logo Aulabaca mark.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/edit.css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Edit Profile</h1>
        <hr>
        <div class="row">
            <form class="form-horizontal" method="POST" action="{{ route("edit.profile", auth()->user()->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @error('avatar')
                {{ $message }}
                @enderror
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <input type="hidden" name="oldName" value="{{ asset("storage/" . auth()->user()->avatar) }}">
                        @if(auth()->user()->avatar )
                        <img src="{{ asset("storage/" . auth()->user()->avatar ) }}" id="" class="avatar img-circle img-thumbnail photoProfileWraper" alt="avatar">
                        @else
                        <img src="https://ui-avatars.com/api/?background=random&name={{ auth()->user()->name }}" id="" class="avatar img-circle img-thumbnail photoProfileWraper" alt="avatar">
                        @endif
                        <h6>Upload a photo...</h6>

                        <input id="photoProfil" type="file" name="avatar" class="form-control @error('avatar') has-error @enderror" onchange="previewImage()">
                        @error("avatar")
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    @if(session()-> has('success'))
                    <div class="alert cob alert-success col-lg-8" role="alert">
                        {{session('success')}}
                        <br>
                    </div>
                    @endif

                    <div class="form">

                        <div class="form-group @error('name') has-error @enderror">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="{{ old('name', auth()->user()->name) }}" name="name" placeholder="Your Name">
                                @error("name")
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="example@mail.com">
                                @error("email")
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-lg-8">
                                <button class="btn tombol btn-primary" type="submit">Edit Profile</button>
                                <a href="/" class="btn btn-primary">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
    </div>

    <style type="text/css">
        body {
            margin-top: 20px;
        }

        .avatar {
            width: 200px;
            height: 200px;
        }
    </style>
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

</body>

</html>