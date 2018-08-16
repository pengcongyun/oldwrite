<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>进制</title>
</head>
<body>

<script src="jquery-1.10.2.min.js"></script>
<script>
    var a=1.3305;
    function jinzhi(a) {
        return (parseFloat(a.toString()) +0.004).toFixed(2);
    }

    console.log(jinzhi(a));
</script>
</html>