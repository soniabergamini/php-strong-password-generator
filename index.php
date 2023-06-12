<!-- DATA -->
<?php
$alphabetUpper = getChar('A', 'Z');
$alphabetLower = getChar('a', 'z');
$numbers = getChar('0', '9');
$simbols = ["|", "!", "£", "$", "%", "&", "/", "(", ")", "=", "?", "^", "'", "+", "*", "]", "[", "@", "#", "<", ">"];
$pswLength = $_GET["pswLen"] ?? "";
var_dump($pswLength);
$finalPass = getPassword($pswLength, $alphabetUpper, $alphabetLower, $numbers, $simbols);
var_dump($finalPass);
?>

<!-- LOGIC -->
<?php

// Return Aplhabet & Numbers Arrays
function getChar($min, $max) {
    foreach (range($min, $max) as $elements) {
        $array[] = $elements;
    };
    return $array;
}

// Return New Password
function getPassword($pswLength, $alphabetUpper, $alphabetLower, $numbers, $simbols) {
    $pwdGen = "";

    // Create array with allowed characters
    $allChar = [];
    $allChar = array_merge($allChar, $alphabetUpper);
    $allChar = array_merge($allChar, $alphabetLower);
    $allChar = array_merge($allChar, $numbers);
    $allChar = array_merge($allChar, $simbols);
    $allCharLen = (count($allChar))-1; // 82

    // Return a string with casual characters (numbers, letters, symbols)
    while(strlen($pwdGen) < $pswLength) {
        $casualChar = rand(0, $allCharLen);
        $pwdGen .= $allChar[$casualChar];
    }

    // Return Password
    return $pwdGen;
}

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

    <!-- Password Generator Form & Result-->
    <main class="flex flex-col justify-center border mx-auto max-w-3xl p-10">

        <!-- Password Generator Form -->
        <form action="index.php" method="get" class="w-full">
            <label for="pswLen" class="font-bold">Password Length (between 5 - 30):</label>
            <input type="number" name="pswLen" id="pswLen" min="5" max="30" placeholder="10" class="w-[50%] ml-5 text-colBlue px-3 font-bold">
            <div class="mt-6">
                <button type="submit" class="font-bold bg-colBlue px-4 py-1 hover:bg-colGreen">GENERATE</button>
                <button type="reset" class="font-bold bg-gray-400 px-4 py-1 hover:bg-colRed ml-2">CLEAR</button>
            </div>
        </form>

        <!-- Generated Password -->
        <div class="bg-colPink py-3 px-3 text-black mt-7">
            <p class="text-md">
                <span>Your Password:</span>
                <strong class="text-colGreen text-lg"><?php echo $finalPass ?></strong>
            </p>
        </div>

    </main>

</body>

</html>