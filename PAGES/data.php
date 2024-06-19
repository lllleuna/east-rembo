<?php 
// require 'PAGES/config.php'; 
?>
<div class="table-wrapper">
    <table border = 1 class="fl-table">
        <thead>
        <tr>
            <th>#</th>
            <th>VALID ID NO.</th>
            <th>SURNAME</th>
            <th>FIRSTNAME</th>
            <th>MIDDLENAME</th>
            <th>HOUSE_NO</th>
            <th>STREET</th>
            <th>BARANGAY</th>
            <th>BIRTHDAY</th>
            <th>SEX</th>
            <th>REMARK</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $rows = mysqli_query($conn, "SELECT * FROM pwd_senior");
        foreach($rows as $row) :
        ?>
        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $row["VALID_ID_NO"]; ?> </td>
            <td> <?php echo $row["SURNAME"]; ?> </td>
            <td> <?php echo $row["FIRSTNAME"]; ?> </td>
            <td> <?php echo $row["MIDDLENAME"]; ?> </td>
            <td> <?php echo $row["HOUSE_NO"]; ?> </td>
            <td> <?php echo $row["STREET"]; ?> </td>
            <td> <?php echo $row["BARANGAY"]; ?> </td>
            <td> <?php echo $row["BIRTHDAY"]; ?> </td>
            <td> <?php echo $row["SEX"]; ?> </td>
            <td> <?php echo $row["REMARK"]; ?> </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>