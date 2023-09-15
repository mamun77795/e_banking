<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="padding-top:10px;">
    <div class="container m-4" style="font-size: 0.9rem;">
        <div class="row">
            <div class="col-md-6 d-flex m-auto bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
                <div style="font-size: 1.5rem; position: absolute;  top: 20px; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                    Account Opening Form
                </div>
                <form class="form col-md-12" action="{{route('users.store')}}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="account_type">Account Type</label>
                        <select name="account_type" class="form-control" id="account_type" required>
                            <option value="individual">Individual</option>
                            <option value="business">Business</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-secondary mt-2" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>