<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
        return;
    }

    $root = $_SERVER['DOCUMENT_ROOT'] . '/web-dev-project';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web-dev-project/view/css/reservations.css">
    <title>My Reservations</title>
</head>
<body>
    <?php
        include $root . '/view/include/header.php';
    ?>

    <main>
        <h2>My Reservations</h2>
        <table class="reservations">
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Date Made</th>
                <th class="cancel-column" >Cancel</th>
            </tr>
            <?php 
                require_once $root . '/model/database_connect.php';

                // If cancel button was clicked:
                if (isset($_POST['cancel'])) {
                    $isbn = $_POST['cancel'];
                    $deleteReservationQuery = "DELETE FROM reservations WHERE isbn = '$isbn'";
                    if ( !$conn->query($deleteReservationQuery) ) {
                        echo '<p class="error">Error: Reservation not canceled.<p>';
                    }
                    $updateBookQuery = "UPDATE books SET reserved = false WHERE isbn = '$isbn'";
                    if ( !$conn->query($updateBookQuery) ) {
                        echo '<p class="error">Error: Book reservation status not updated.<p>';
                    }
                }

                // Display Table
                $username = $_SESSION['username'];
                $reservationsQuery = "SELECT books.isbn, books.title, reservations.reservation_date FROM users INNER JOIN reservations ON reservations.username = users.username INNER JOIN books ON books.isbn = reservations.isbn WHERE users.username = '$username'";
                $result = $conn->query($reservationsQuery);

                if ($result->num_rows === 0) {
                    echo '</table>';
                    echo '<p>No Reservations Currently Made</p>';
                } else {
                    $offset = 0;
                    // Next and Previous Buttons
                    if (isset($_POST['page'])) {
                        if ($_POST['page'] === 'next') {
                            $offset = $offset + 5;
                        } else {
                            $offset = $offset - 5;
                            if ($offset < 0) {
                                $offset = 0;
                            }
                        }
                    }
                    $rows = $result->fetch_all();
                    $displayed_count = 0;
                    $current_index = $offset;
                    while((array_key_exists($offset + $displayed_count, $rows)) && ( $displayed_count < 5) ) {
                        $current_index = $offset + $displayed_count;
                        $row = $rows[$current_index];
                        $displayed_count = $displayed_count + 1;

                        echo '<tr>';
                        echo '<td>' . $row['0'] . '</td>';
                        echo '<td>' . $row['1'] . '</td>';
                        echo '<td>' . $row['2'] . '</td>';
                        // Cancel Button
                        echo '<td class="cancel-column">';
                        echo '<form method="post">';
                        echo '<input type="hidden" name="cancel" value="' . $row['0'] . '">';
                        echo '<button type="submit">Cancel</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';

                    if ( $result->num_rows > 5 ) {
                        echo '<form method="post" class="page-buttons">';
                        if (($offset - 5) >= 0 ) {
                            echo '<button type="submit" name="page" value="previous">Previous</button>';
                        }
                        if ( $result->num_rows > ($offset + 5) ) {
                            echo '<button type="submit" name="page" value="next">Next</button>';
                        }
                        echo '</form>';
                    }
                }
            ?>
    </main>

    <?php
        include $root . '/view/include/footer.php';
    ?>
</body>
</html>