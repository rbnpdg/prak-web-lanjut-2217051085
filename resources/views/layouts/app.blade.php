<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        form-riil {

            width: 20%;
            padding: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #3f3f3f;
            color: #1c9127;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4a4a4a;
        }
        .table-container {
            margin-top: 20%;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 60%
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            background-color: #1e1e1e;
            color: #ffffff;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #555;
        }
        thead {
            background-color: #333333;
            color: #ffffff;
        }
        .button-add {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .button-add:hover {
            background-color: #0056b3;
        }
        .custom-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-detail {
            background-color: #17a2b8;
        }
        .btn-detail:hover {
            background-color: #138496;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .pp img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
</style>
</head>
<body>
    @yield('content')
</body>
</html>