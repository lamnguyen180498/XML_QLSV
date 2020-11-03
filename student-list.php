<?php
require './libs/students.php';
$students = get_all_students();
disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="libs/css.cs">

    </head>
    <body class="body" >
        <h1 class="center">Danh sách sinh viên</h1>
        <tr>
        <a href="student-add.php "class="button">Thêm sinh viên</a> 
        <a href='xuatfile.php' ><input type='button' class="button" value='Xuất Excel' /></a></tr>
        <table class="table table-secondary text-center m-auto  col-11  ">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Birthday</td>
                <td>Options</td>
            </tr>
            <?php foreach ($students as $item){ ?>
            <tr>
                <td><?php echo $item['sv_id']; ?></td>
                <td><?php echo $item['sv_name']; ?></td>
                <td><?php echo $item['sv_sex']; ?></td>
                <td><?php echo $item['sv_birthday']; ?></td>
                <td>
                    <form method="post" action="student-delete.php">
                        <input onclick="window.location = 'student-edit.php?id=<?php echo $item['sv_id']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $item['sv_id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
         <a href="logout.php" class="button">Đăng Xuất</a>
    </body>
</html>
