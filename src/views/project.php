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

// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

// Add new project - CREATE
// if(isset($_GET['name'])){

//     $project = new Project();
//     $project->setName($_GET['name']);
//     $entityManager->persist($project);
//     $entityManager->flush();

//     redirect_to_root();
// }

// Delete project
if(isset($_GET['delete'])){
    $user = $entityManager->find('Models\Project', $_GET['delete']);
    $entityManager->remove($user);
    $entityManager->flush();
    redirect_to_root();
}

// Update project
if(isset($_POST['update_name'])){
    $user = $entityManager->find('Models\Project', $_POST['update_id']);
    $user->setName($_POST['update_name']);
    $entityManager->flush();
    redirect_to_root();
}

    print '<h1>Personal management system (CRUD)</h1>';

    print("<button><a href='/app3/project'>Project</a></button>");
    print("<button><a href='/app3/employees'>Employees</a></button>");

    print("<table class='table'><thead>");
    print("<tr><th>Id</th><th>Project Name</th><th>Employees</th><th>Action</th></tr>");
    print("</thead>");
    // $products = $entityManager->getRepository('Models\Product')->findBy(array('name' => 'Batai'), ['id' => 'ASC']);
    $project = $entityManager->getRepository('Models\Project')->findAll();


        foreach ($project as $p)
        foreach ($p->getEmployees() as $employee)
        
         
            print_r("<tr>" 
                    . "<td>" . $p->getId()  . "</td>" 
                    . "<td>" . $p->getName() . "</td>" 
                    . "<td>" . $employee->getFirstname() . "</td>"  
                    . "<td style='width:20px'><a href=\"?delete={$p->getId()}\">DELETE</a></td>" 
                    . "<td><a href=\"?updatable={$p->getId()}\">UPDATE</a></td>"
                . "</tr>");
             
            print("</pre><hr>");    


if(isset($_GET['updatable'])){
    $pro = $entityManager->find('Models\Project', $_GET['updatable']);
        print("<pre>Update Project Name: </pre>");
        print("
            <form action=\"\" method=\"POST\">
                <input type=\"hidden\" name=\"update_id\" value=\"{$pro->getId()}\">
                <label for=\"name\">Project name: </label><br>
                <input type=\"text\" name=\"update_name\" value=\"{$pro->getName()}\"><br>
                <input type=\"submit\" value=\"Submit\">
            </form>
            ");
        print("<hr>");
}

?>

</body>
</html>

