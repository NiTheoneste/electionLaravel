<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add state</title>
    </head>
    <body>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class='text-red-500'>{{$error}}</div>
            @endforeach
        @endif
        <div class="clearfix"></div><br />

        <div class="container">
            <form method='post' action="{{route('state.add')}}" enctype="multipart/form-data">
                @csrf
                <table class='table table-bordered'>
                    <tr>
                        <td>State Code: </td>
                        <td><input type='text' name='state_code' class='form-control' required></td>
                    </tr>
            
                    <tr>
                        <td>State Name: </td>
                        <td><input type='text' name='state_name' class='form-control' required></td>
                    </tr>
            
                    <tr>
                        <td>Flag: </td>
                        <td><input type='file' name='flag_image' accept="image/*" class='form-control' required></td>
                    </tr>
            
                    <tr>
                        <td>GDP (in millions of US dollars): </td>
                        <td><input type='number' name='gdp' step="0.1" class='form-control' required></td>
                    </tr>
                    
                    <tr>
                        <td>Area (in km²): </td>
                        <td><input type='number' name='area' step="0.1" class='form-control' required></td>
                    </tr>
                    
                    <tr>
                        <td>Population: </td>
                        <td><input type='number' name='population' class='form-control' required></td>
                    </tr>
            
                    <tr>
                        <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btn-save">
                        <span class="glyphicon glyphicon-plus"></span> Create State
                        </button>  
                        <a href="/states" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                        </td>
                    </tr>
            
                </table>
            </form>
        </div>
    </body>
</html>