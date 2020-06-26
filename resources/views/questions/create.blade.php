<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaravelAnswer</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Ask a Question</h1>
            <hr />
            <form action="{{ route('questions.store') }}" method="POST"> 
                <!-- csrf will prevent cross-browser submission
                csrf_field() will create hidden field with token values in the form
                so the form can be submitted successfully to the database
                -->
                {{ csrf_field() }} 

                <label for="title">Question: </label>
                <input type="text" name="title" id="title" class="form-control" />
                <br />
                <label for="description">More Information: </label>
                <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                <br />
                <input type="submit" class="" value="Submit Question" />
            </form>
        </div> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>