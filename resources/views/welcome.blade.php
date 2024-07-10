<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .button-container {
            text-align: center;
        }

        .button {
            display: inline-block;
            width: 200px;
            padding: 20px;
            margin: 20px;
            font-size: 24px;
            text-align: center;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="button-container">
    <a href="admin/login" class="button">لوحة الإدارة</a>
    <a href="office/login" class="button">لوحة الموظف</a>
    <a href="user/login" class="button">لوحة المستخدم</a>
</div>
</body>
</html>
