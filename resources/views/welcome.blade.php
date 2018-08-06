<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <form enctype="multipart/form-data" action="upload" method="POST" role="form">
        	@csrf
        	<input multiple="" type="file" name='image[]'>
        	<button type="submit" class="btn btn-primary">Add</button>
        </form>
    </body>
</html>
