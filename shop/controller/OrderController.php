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
    private function addToBasketAction() {
 
        if(!isset($_SESSION["basket"]))
            $_SESSION["basket"] = [];
        if(isset($_SESSION["basket"][$_GET['id']])){
            if($_SESSION["basket"][$_GET['id']] < $_GET['quant']){
                $_SESSION["basket"][$_GET['id']]++;
                echo 'Ajouté';
            }
        }
        else
            $_SESSION["basket"] += [$_GET["id"] => 1];

        header("location: index.php?controller=basket&action=find");
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
     * Display Detail Action
     *
     * @return string
     */
    private function findAction() {
        $shopRepository = new ShopRepository();
        if(isset($_SESSION["basket"])){
            foreach($_SESSION["basket"] as $item => $value) {
                $products[] = $shopRepository->findOne($item);
            }
        }

        $view = file_get_contents('view/page/basket/basket.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;

    }
}