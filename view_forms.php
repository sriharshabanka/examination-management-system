<?php
include '../db.php';

$sql = "SELECT * FROM exam_forms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Student ID</th><th>Exam ID</th><th>Status</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['student_id']}</td>
                <td>{$row['exam_id']}</td>
                <td>{$row['status']}</td>
                <td>
                    <form action='accept_form.php' method='POST'>
                        <input type='hidden' name='form_id' value='{$row['id']}'>
                        <button type='submit'>Accept</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No forms submitted.";
}
$conn->close();
?>