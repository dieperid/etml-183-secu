<?php

include_once 'database/DataBaseQuery.php';

class OrderController extends Controller {

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display() {

        $action = $_GET['action'] . "Action";

        return call_user_func(array($this, $action));
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function deliveryAction() {

        $view = file_get_contents('view/page/order/delivery.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function paymentAction() {

        if(isset($_POST["delivery"]))
            $_SESSION["delivery"] = $_POST["delivery"];

        $view = file_get_contents('view/page/order/payment.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function customerAction() {

        if(isset($_POST["payment"]))
            $_SESSION["payment"] = $_POST["payment"];

        $view = file_get_contents('view/page/order/customer-info.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function summaryAction() {

        $redirectPage;

        $reg = "/^[A-Za-zÀ-ÿ' ]*$/";
        $regNPA = "/^[0-9]{4}$/";
        $regStreetNB = "/^[0-9]{2,3}[A-z]?$/";
        $regMail = "/^[A-z][A-z-]*(\.[A-z]{1,})*[@][A-z]{1,}\.[A-z]{2,}$/";
        $regPhone = "/^([0][1-9][0-9](\s|)[0-9][0-9][0-9](\s|)[0-9][0-9](\s|)[0-9][0-9])$|^(([0][0]|\+)[1-9][0-9](\s|)[0-9][0-9](\s|)[0-9][0-9][0-9](\s|)[0-9][0-9](\s|)[0-9][0-9])$/";

        $errors = array();

        if($_POST["title"] != "Monsieur" && $_POST["title"] != "Madame")
            array_push($errors, "Titre");
        if(!preg_match($reg, $_POST["name"]))
            array_push($errors, "Nom");
        if(!preg_match($reg, $_POST["firstname"]))
            array_push($errors, "Prénom");
        if(!preg_match($reg, $_POST["street"]))
            array_push($errors, "Rue");
        if(!preg_match($regStreetNB, $_POST["streetNumber"]))
            array_push($errors, "N° de rue");
        if(!preg_match($regNPA, $_POST["npa"]))
            array_push($errors, "NPA");
        if(!preg_match($reg, $_POST["locality"]))
            array_push($errors, "Localité");
        if(!preg_match($regMail, $_POST["mail"]))
            array_push($errors, "Mail");
        if(!preg_match($regPhone, $_POST["phone"]))
            array_push($errors, "Téléphone");

        if($errors == null){
            $_SESSION["summary"] = $_POST;

            $shopRepository = new ShopRepository();
            if(isset($_SESSION["basket"])){
                foreach($_SESSION["basket"] as $item => $value) {
                    $products[] = $shopRepository->findOne($item);
                }
            }
            var_dump($_SESSION);
            $redirectPage = "summary.php";
        }
        else{

            echo 'Erreur dans le(s) champ(s) :';
            foreach($errors as $value){echo "$value";}

            $redirectPage = "customer-info.php";
        }

        $view = file_get_contents("view/page/order/$redirectPage");

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * 
     */
    public function validOrderAction() {
        $request = new DataBaseQuery();

        $request->insert("t_order","idUser,moyLiv,moyPay", 1 . ",'" . $_SESSION["delivery"] . "','" . $_SESSION["payment"]."'");

        // foreach($_SESSION['basket'] as $item => $value){
        //     $request->insert("t_ordered","fkOrder, fkProduct, itemQuantity", 1);
        // }
    }
}