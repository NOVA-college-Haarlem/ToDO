<?php
    session_start();

    require 'database.php'; // Include the database.php file
    $stmt = $conn->prepare("SELECT * FROM tasks");
    $stmt->execute();

    // set the resulting array to associative array
    $all_tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
   
    <section class="vh-100" style="background-color: #eee;">
   
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <?php
                //show message
                if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php session_unset(); endif;
                ?>
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>

                            <form method="post" action="insert_task.php" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Voeg naam taak in"/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary">Opslaan</button>
                                </div>
                            </form>
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Te doen</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Acties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($all_tasks as $task): ?>
                                    <tr>
                                        <th scope="row"><?php echo $task['id'] ?></th>
                                        <td><?php echo $task['title'] ?></td>
                                        <td><?php echo $task['status'] ?></td>
                                        <td>
                                            <a href="delete_task.php?id=<?php echo $task['id'] ?>" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit wilt verwijderen?');">Verwijder</a>
                                            <a  href="#" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success ms-1">Gedaan</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>