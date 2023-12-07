<?php
    include '../app/core/database.php';

    if (isset($_POST['submit_milestone'])) {
        if (milestone($_POST) > 0) {
            header("Location: ?page=dashboard/milestone");
        } else {
            echo "
                <script>
                    alert('user gagal ditambahkan');
                </script>
            ";
        }
    }

    // milestone.php (Form)
    function milestone($milestone) {
        global $conn;

        $name_milestone = htmlspecialchars($milestone['name_milestone']);
        $date_milestone = ($milestone['date_milestone']);
        $description_milestone = htmlspecialchars($milestone['description_milestone']);

        mysqli_query($conn, "INSERT INTO `milestone` (`id`, `name_milestone`, `date_milestone`, `description_milestone`)  VALUES(
            NULL,
            '$name_milestone',
            '$date_milestone',
            '$description_milestone'
        )");

        return mysqli_affected_rows($conn);
    }

    // milestone > list-milestone
    $sqlMilestone = "SELECT * FROM milestone ORDER BY timestamp DESC";
    $resultMilestone = mysqli_query($conn, $sqlMilestone);
    $dataMilestone = mysqli_fetch_all($resultMilestone, MYSQLI_ASSOC);

    // milestone > delete-milestone
    function hapusMilestone($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM milestone WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    if (isset($_POST['update_milestone'])) {
        if (updateMilestone($_POST) > 0) {
            header("Location: ?page=dashboard/milestone");
        } else {
            echo "
                <script>
                    alert('user gagal ditambahkan');
                </script>
            ";
        }
    }

    // milestone.php > update-milestone
    function updateMilestone($upMilestone) {
        global $conn;

        $id_upMilestone = ($upMilestone['id_upmilestone']);
        $name_upMilestone = htmlspecialchars($upMilestone['name_upmilestone']);
        $date_upMilestone = ($upMilestone['date_upmilestone']);
        $description_upMilestone = htmlspecialchars($upMilestone['description_upmilestone']);

        mysqli_query($conn, "UPDATE `milestone` SET name_milestone='$name_upMilestone', date_milestone='$date_upMilestone', description_milestone='$description_upMilestone' WHERE id='$id_upMilestone'");

        return mysqli_affected_rows($conn);
    }
