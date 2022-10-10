<?php

/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

class BasketController extends Controller {

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
     * Method to add item to the basket
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
     * Method to add item to the basket and redirect to the delivery choice
     *
     * @return string
     */
    private function addToBasketAndRedirectAction() {
 
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

        header("location: index.php?controller=order&action=delivery");
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function listAction() {

        $view = file_get_contents('view/page/basket/basket.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Method to find an item
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


    /**
     * Delete items in the basket Action
     * 
     */
    private function deleteAction(){

        unset($_SESSION["basket"][$_GET['id']]);

        header("location: index.php?controller=basket&action=find");
    }
    
    /**
     * Add quantity to an item on the basket Action
     * 
     */
    private function addAction(){

        if($_SESSION["basket"][$_GET['id']] < $_GET['quant']){
            $_SESSION["basket"][$_GET['id']]++;
        }

        header("location: index.php?controller=basket&action=find");
    }

    /**
     * Remove quantity to an item on the basket Action
     * 
     */
    private function removeAction(){

        if($_SESSION["basket"][$_GET['id']] > 1){
            $_SESSION["basket"][$_GET['id']]--;
        }
        else
            unset($_SESSION["basket"][$_GET['id']]);

        header("location: index.php?controller=basket&action=find");
    }

    /**
     * Method to clear the basket
     */
    public function clearBasket(){
        $_SESSION['basket'] = null;
    }
}