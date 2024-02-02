<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-group{
            margin : 0 !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Payment Details</h3>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Client Name : </th>
                        <td>{{$aCheck->client->name}} ({{$aCheck->client->email}})</td>
                    </tr>
                    <tr>
                        <th scope="row">Transaction ID : </th>
                        <td>{{$aCheck->txn_id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Amount : </th>
                        <td>{{$aCheck->amount}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Currency : </th>
                        <td>{{$aCheck->payment_currency}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Transaction Type : </th>
                        <td>{{$aCheck->interface_version}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Transaction Status : </th>
                        <td>{{$aStatus[$aCheck->status]}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
