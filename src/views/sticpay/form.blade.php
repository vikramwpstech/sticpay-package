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
        label {
            margin-bottom : 0 !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form action="https://pay.sticpay.com/1.1/pay" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="merchant_email">Merchant Email:</label>
                        <input class="form-control" type="email" id="merchant_email" name="merchant_email" value="{{$sticpay->getMerchantEmail()}}" required><br>
                    </div>
                </div>
                <div class="col-md-4">        
                    <div class="form-group">
                        <label for="order_no">Order Number:</label>
                        <input class="form-control" type="text" id="order_no" name="order_no" value="{{$sticpay->getOrderNo()}}" required><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="order_time">Order Time:</label>
                        <input class="form-control" type="text" id="order_time" name="order_time" value="{{$sticpay->getOrderTime()}}" required><br>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="order_amount">Order Amount:</label>
                        <input class="form-control" type="text" id="order_amount" name="order_amount" value="{{$sticpay->getOrderAmount()}}" required><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="order_currency">Order Currency:</label>
                        <input class="form-control" type="text" id="order_currency" name="order_currency" value="{{$sticpay->getOrderCurrency()}}" required><br>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sign">Sign:</label>
                        <input class="form-control" type="text" id="sign" name="sign" value="{{$sticpay->getSign()}}" required><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="success_url">Success URL:</label>
                        <input class="form-control" type="url" id="success_url" name="success_url" value="{{$sticpay->getSuccessUrl()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="failure_url">Failure URL:</label>
                        <input class="form-control" type="url" id="failure_url" name="failure_url" value="{{$sticpay->getFailureUrl()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="callback_url">Callback URL:</label>
                        <input class="form-control" type="url" id="callback_url" name="callback_url" value="{{$sticpay->getCallbackUrl()}}"><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="referrer_url">Referrer URL:</label>
                        <input class="form-control" type="url" id="referrer_url" name="referrer_url" value="{{$sticpay->getReferrerUrl()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="interface_version">Interface Version:</label>
                        <input class="form-control" type="text" id="interface_version" name="interface_version" value="{{$sticpay->getInterfaceVersion()}}" required><br>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="input_charset">Input Charset:</label>
                        <input class="form-control" type="text" id="input_charset" name="input_charset" value="{{$sticpay->getInputCharset()}}"><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sign_type">Sign Type:</label>
                        <input class="form-control" type="text" id="sign_type" name="sign_type" value="{{$sticpay->getSignType()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product_code">Product Code:</label>
                        <input class="form-control" type="text" id="product_code" name="product_code" value="{{$sticpay->getProductCode()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input class="form-control" type="text" id="product_name" name="product_name" value="{{$sticpay->getProductName()}}"><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product_quantity">Product Quantity:</label>
                        <input class="form-control" type="number" id="product_quantity" name="product_quantity" value="{{$sticpay->getProductQuantity()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product_desc">Product Description:</label>
                        <textarea class="form-control" id="product_desc" name="product_desc">{{$sticpay->getProductDesc()}}</textarea><br>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="client_ip">Client IP:</label>
                        <input class="form-control" type="text" id="client_ip" name="client_ip" value="{{$sticpay->getClientIp()}}"><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input class="form-control" type="text" id="full_name" name="full_name" value="{{$sticpay->getFullName()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="extra_return_param">Extra Return Parameter:</label>
                        <input class="form-control" type="text" id="extra_return_param" name="extra_return_param" value="{{$sticpay->getExtraReturnParam()}}"><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="registered_email">Registered Email:</label>
                        <input class="form-control" type="email" id="registered_email" name="registered_email" value="{{$sticpay->getRegisteredEmail()}}"><br>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</body>
</html>
