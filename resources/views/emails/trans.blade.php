<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

</head>
<body>
    <table>
        <thead>
            <tr>
                <th style="text-align:center;">Account Number</th>
                <th style="text-align:center;">Type Of Transaction</th>
                <th style="text-align:center;">Amount</th>
                <th style="text-align:center;">Balance Now</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$account_id}}</td>
                <td>{{$type}}</td>
                <td>{{$amount}}</td>
                <td>{{$balance}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

