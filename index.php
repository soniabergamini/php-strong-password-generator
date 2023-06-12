<!-- DATA -->
<?php
$pswLength = $_GET["pswLen"] ?? "";
var_dump($pswLength)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        colGreen: '#869F76',
                        colPink: '#FEDDD5',
                        colRed: '#FF6863',
                        colBlue: '#246D82'
                    }
                }
            }
        }
    </script>

</head>

<body class="bg-[#221c21] text-white">

    <!-- Title and CTA -->
    <header class="text-center my-5">
        <h1 class="font-bold text-3xl my-3 text-colGreen">PASSWORD GENERATOR</h1>
        <p>Generate your secure password by setting the parameters below:</p>
    </header>

    <!-- Password Generator Form -->
    <main class="flex justify-center border mx-auto max-w-3xl p-10">
        <form action="index.php" method="get" class="w-full">
            <label for="pswLen">Password length (between 5 - 30):</label>
            <input type="number" name="pswLen" id="pswLen" min="5" max="30" placeholder="10" class="w-[50%] ml-5 text-colBlue px-3 font-bold">
        </form>
    </main>

</body>

</html>