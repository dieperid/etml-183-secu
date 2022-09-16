<?php

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
        $reg = "/^[A-Za-zÀ-ÿ' ]*$/";
        $regNPA = "/^[0-9]{4}*$/";

        $errors = array();

        if(!preg_match($reg, $_POST["name"]))
            array_push($errors, "name");
        if(!preg_match($reg, $_POST["firstname"]))
            array_push($errors, "firstname");

        if(!preg_match($reg, $_POST["street"]))
            array_push($errors, "street");
        if(!preg_match($regNPA, $_POST["npa"]))
            array_push($errors, "npa");
        if(!preg_match($reg, $_POST["locality"]))
            array_push($errors, "street");

        var_dump($errors);

        if($errors == null)
        {
            $_SESSION["summary"] = $_POST;

            $shopRepository = new ShopRepository();
            if(isset($_SESSION["basket"])){
                foreach($_SESSION["basket"] as $item => $value) {
                    $products[] = $shopRepository->findOne($item);
                }
            }

            $view = file_get_contents('view/page/order/summary.php');

            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
    }
}