<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit flag</title>
    </head>
    <body>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class='text-red-500'>{{$error}}</div>
            @endforeach
        @endif
        <div class="clearfix"></div><br />

        <div class="container">
            <form method='post' action="{{route('flag.update', $flag->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <table class='table table-bordered'>
                    <tr>
                        <td>Flag: </td>
                        <td><img src="{{ Storage::url($flag->imageUrl)}}" alt="" width="125px" height="84px"></td>
                    </tr>
                    <tr>
                        <td>If you want to change the flag:</td>
                        <td><input type='file' name='flag_image' accept="image/*" class='form-control'></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btn-save">
                        <span class="glyphicon glyphicon-plus"></span> Edit Flag
                        </button>  
                        <a href="/flags" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                        </td>
                    </tr>
            
                </table>
            </form>
        </div>
    </body>
</html>