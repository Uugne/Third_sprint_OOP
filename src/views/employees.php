<?php namespace Models; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container">
    
<?php 

include_once "bootstrap.php"; 

function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

// Delete employee
if(isset($_GET['delete'])){
    $user = $entityManager->find('Models\Employees', $_GET['delete']);
    $entityManager->remove($user);
    $entityManager->flush();
    redirect_to_root();
}

// Update employee
if(isset($_POST['update_firstname'])){
    $user = $entityManager->find('Models\Employees', $_POST['update_id']);
    $user->setFirstname($_POST['update_firstname']);
    $entityManager->flush();
    redirect_to_root();
}

    print '<h1>Personal management system (CRUD)</h1>';

    print("<button><a href='/app3/project'>Project</a></button>");
    print("<button><a href='/app3/employees'>Employees</a></button><hr>");

    print("<pre>Add new employee and a project: " . "</pre>");
    
    print '<form action="" method="GET">
                <label for="firstnames">Employee name: </label><br>
                <input type="text" name="firstnames" value=""><br>
                <label for="names">Project name: </label><br>
                <input type="text" name="names" value=""><br>
                <input type="submit" value="Submit">
          </form> 
          <hr>';

    print("<table class='table'><thead>");
    print("<tr><th>Id</th><th>Name</th><th>Project</th><th>Action</th></tr>");
    print("</thead>");
    $employees = $entityManager->getRepository('Models\Employees')->findAll();

        foreach($employees as $e)
            print("<tr>" 
                    . "<td>" . $e->getId()  . "</td>"
                    . "<td>" . $e->getFirstname() . "</td>"  
                    . "<td>" . $e->getProject()->getName() . "</td>"
                    . "<td style='width:20px'><a href=\"?delete={$e->getId()}\">DELETE</a></td>" 
                    . "<td><a href=\"?updatable={$e->getId()}\">UPDATE</a></td>"
                . "</tr>");
    print("</table>"); 
    print("</pre><hr>");


if(isset($_GET['updatable'])){
    $emp = $entityManager->find('Models\Employees', $_GET['updatable']);
        print("<pre>Update Employee Name: </pre>");
        print("
            <form action=\"\" method=\"POST\">
                <input type=\"hidden\" name=\"update_id\" value=\"{$emp->getId()}\">
                <label for=\"name\">Employee name: </label><br>
                <input type=\"text\" name=\"update_firstname\" value=\"{$emp->getFirstname()}\"><br>
                <input type=\"submit\" value=\"Submit\">
            </form>
            ");
        print("<hr>");
}

?>

</body>
</html>



