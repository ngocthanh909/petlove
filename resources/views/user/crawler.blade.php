<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>


<style>


    .card {
        display: block;
        margin-left : auto;
        margin-right: auto;
        width: 500px;
    }



</style>


<script>

</script>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="card">
            <h5 class="card-header">Web Crawler</h5>
            <div class="card-body">
                <form method="post" action="{{ route('crawl.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">https://www.petcity.vn/</span>
                        </div>
                        <input type="text" class="form-control" name = "url">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Category</span>
                        </div>
                        <select class="form-control" name = "categoryid">
                            {!!$htmlOption!!}
            
                        </select>
                    </div>

        
                    <div class="input-group mb-3" style="margin-top: 20px">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Get All Pages</span>
                        </div>
                        <select name="option" class="form-control">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
         
                </form>
            </div>
                
            <div class = "card-footer">
                
            </div>
        </div>
    </div>
</body>

</html>