<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=K2D&family=Noto+Sans+Thai&family=Prompt:wght@200;400;500&family=Roboto:wght@500&family=Sarabun:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ShowBook</title>
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">ระบบ CRUD PHP+Ajax Boostrap แบบมีการเลือกประเภท (category)</h3>
            <h3 class="text-center">แสดงข้อมูลหนังสือ</h3>
            <a href="add_book.php" class="btn btn-primary btn-sm"> + เพิ่มข้อมูล</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name</th>
                        <th>Type</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "condb.php";

                    $sql = "SELECT * FROM book INNER JOIN type ON book.book_type_id=type.book_type_id";
                    $result = mysqli_query($dbcon, $sql);

                    $count = 0;
                    while ($row_book = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td class="text-center"><?php echo $count = $count + 1; ?></td>
                            <td><?php echo $row_book['book_name']; ?></td>
                            <td><?php echo $row_book['book_type_name']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Jquery  -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>