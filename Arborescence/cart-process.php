<?php
require_once(realpath(__DIR__ . '/dal/DAL.php'));


$token = $_COOKIE["token"];

$dal = new DAL();



//Switch qui gere l'action du panier
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (isset($_POST["id"]) && isset($_POST["qte"])) {

                $currentNb = $dal->CartProductFact()->CheckProduct($_POST["id"], $token);

                if (is_null($currentNb)) {
                    $dal->CartProductFact()->Addproduct($_POST["id"], $_POST["qte"], $token);
                    header("Location: cart-view.php");
                } else {
                    $newQte = $currentNb[0] + $_POST["qte"];
                    $currentNb = $dal->CartProductFact()->UpdateProduct($_POST["id"], $newQte, $token);
                    header("Location: cart-view.php");
                }
            } else {
                header("Location: index.php");
            }
            break;
        case "remove":
            if (isset($_GET["id"])) {
                $dal->CartProductFact()->DeleteProduct($_GET["id"]);
                header("Location: cart-view.php");
            } else {
                header("Location: cart-view.php");
            }
            break;
    }
} else
    header("Location: index.php");
//Fonction qui genere le token
function generateToken($length = 16)
{
    $string = uniqid(rand());
    $randomString = substr($string, 0, $length);
    return $randomString;
}
