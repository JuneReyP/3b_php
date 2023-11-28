<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="table shadow p-2 mt-5">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Address</th>
                </thead>
                <tbody>
                    <?php
                    $list = [
                        ["FirstName" => "Juan", "LastName" => "Cruz", "Address" => "Kabankalan"],//key
                        ["FirstName" => "Carlo", "LastName" => "Jones", "Address" => "CPSU"],
                        ["FirstName" => "Juan", "LastName" => "White", "Address" => "Camingawan"]
                    ];

                    foreach ($list as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value["FirstName"] ?></td>
                            <td><?= $value["LastName"] ?></td>
                            <td><?= $value["Address"] ?></td>
                        </tr>

                        
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>