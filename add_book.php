<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=K2D&family=Noto+Sans+Thai&family=Prompt:wght@200;400;500&family=Roboto:wght@500&family=Sarabun:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>index</title>
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center">เพิ่มข้อมูล</h5>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">ชื่อหนังสือ</label>
                        <input type="text" name="book_name" id="book_name" class="form-control" placeholder="ชื่อหนังสือ">
                    </div>
                    <div class="form-group">

                        <label for="">ประเภทหนังสือ</label>
                        <select class="form-select" name="book_type_id" id="book_type_id" required>
                            <option selected>---เลือกประเภทหนังสือ---</option>
                            <?php
                            include "condb.php";

                            $sql = "SELECT * FROM type";
                            $result = mysqli_query($dbcon, $sql);
                            while ($row_type = mysqli_fetch_array($result)) {
                            ?>

                                <option value="<?php echo $row_type['book_type_id']; ?>"><?php echo $row_type['book_type_name']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-primary insert_data">บันทึกข้อมูล</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- Jquery  -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // insertdata 
        $(document).on('click', '.insert_data', function() {
            var book_name = document.getElementById("book_name").value;
            var book_type_id = document.getElementById("book_type_id").value;

            // validate 
            if (book_name == "") {
                document.getElementById("book_name").focus();
            } else if (book_type_id == "") {
                document.getElementById("book_type_id").focus();
            } else {
                $.ajax({
                    url: "insert_book.php",
                    method: "POST",
                    data: {
                        program: "insert_data",
                        book_name: book_name,
                        book_type_id: book_type_id
                    },
                    success: function(msg) {
                        if (msg == 'OK') {
                            Swal.fire(
                                'เพิ่มข้อมูลสำเร็จ!',
                                '',
                                'success'
                            ).then(function() {
                                window.location.href = "index.php";
                            })
                        } else {
                            Swal.fire(
                                'เกิดข้อผิดพลาด!',
                                'โปรดลองใหม่อีกครั้ง',
                                'error'
                            )
                        }
                    }
                })
            }
        });
    </script>
</body>

</html>