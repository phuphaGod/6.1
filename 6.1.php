<!DOCTYPE html>
<html>
<head>
    <title>โปรแกรมคำนวณเกรดและการสร้างตาราง</title>
    <script>
        function validateGradeForm() {
            let hw = document.forms["gradeForm"]["hw"].value;
            let midterm = document.forms["gradeForm"]["midterm"].value;
            let final = document.forms["gradeForm"]["final"].value;

            if (isNaN(hw) || hw < 0 || hw > 30) {
                alert("กรุณากรอกค่า Homework เป็นตัวเลขระหว่าง 0 ถึง 30");
                return false;
            }
            if (isNaN(midterm) || midterm < 0 || midterm > 35) {
                alert("กรุณากรอกค่า Midterm เป็นตัวเลขระหว่าง 0 ถึง 35");
                return false;
            }
            if (isNaN(final) || final < 0 || final > 35) {
                alert("กรุณากรอกค่า Final เป็นตัวเลขระหว่าง 0 ถึง 35");
                return false;
            }
            return true;
        }

        function validateTableForm() {
            let row = document.forms["tableForm"]["row"].value;
            let column = document.forms["tableForm"]["column"].value;

            if (isNaN(row) || row <= 0) {
                alert("กรุณากรอกค่า Row เป็นตัวเลขที่มากกว่า 0");
                return false;
            }
            if (isNaN(column) || column <= 0) {
                alert("กรุณากรอกค่า Column เป็นตัวเลขที่มากกว่า 0");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2 align="center">โปรแกรมคำนวณเกรด</h2>
    <form name="gradeForm" onsubmit="return validateGradeForm()" method="post">
        <table border="1" align="center" width="500">
            <tr>
                <td colspan="2" align="center"><big>ทดสอบการใช้ Arithmatic Operator</big></td>
            </tr>
            <tr>
                <td>Enter Homework:</td>
                <td><input type="text" name="hw" size="15" /></td>
            </tr>
            <tr>
                <td>Enter Midterm:</td>
                <td><input type="text" name="midterm" size="15" /></td>
            </tr>
            <tr>
                <td>Enter Final:</td>
                <td><input type="text" name="final" size="15" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="OK" />
                    <input type="reset" value="Clear" />
                </td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hw'], $_POST['midterm'], $_POST['final'])) {
        $hw = intval($_POST['hw']);
        $midterm = intval($_POST['midterm']);
        $final = intval($_POST['final']);

        $hw = min($hw, 30);
        $midterm = min($midterm, 35);
        $final = min($final, 35);

        $total = $hw + $midterm + $final;
        echo "<p align='center'>";
        echo "<b>ข้อมูลคะแนน</b><br />";
        echo "Homework: <i>$hw</i><br />";
        echo "Midterm: <i>$midterm</i><br />";
        echo "Final: <i>$final</i><br />";
        echo "Total Score: $total<br>";

        if ($total >= 80) echo "Result Grade: A<br>";
        elseif ($total >= 75) echo "Result Grade: B+<br>";
        elseif ($total >= 70) echo "Result Grade: B<br>";
        elseif ($total >= 65) echo "Result Grade: C+<br>";
        elseif ($total >= 60) echo "Result Grade: C<br>";
        elseif ($total >= 55) echo "Result Grade: D+<br>";
        elseif ($total >= 50) echo "Result Grade: D<br>";
        else echo "Result Grade: F<br>";
        echo "</p>";
    }
    ?>

    <h2 align="center">โปรแกรมสร้างตาราง</h2>
    <form name="tableForm" onsubmit="return validateTableForm()" method="post">
        <table border="1" align="center" width="400">
            <tr>
                <td colspan="2" align="center"><big>ทดสอบการใช้ Control Structure</big></td>
            </tr>
            <tr>
                <td align="right">Enter Row:</td>
                <td><input type="text" name="row" size="15" /></td>
            </tr>
            <tr>
                <td align="right">Enter Column:</td>
                <td><input type="text" name="column" size="15" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="OK" />
                    <input type="reset" value="Clear" />
                </td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['row'], $_POST['column'])) {
        $row = intval($_POST['row']);
        $column = intval($_POST['column']);

        echo "<table align='center' border='4' width='300'>";
        for ($r = 1; $r <= $row; $r++) {
            echo "<tr>";
            for ($c = 1; $c <= $column; $c++) {
                if ($r == $c) {
                    echo "<td align='center'><font color='#33ff66'>$r,$c</font></td>";
                } else {
                    echo "<td align='center'>$r,$c</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
