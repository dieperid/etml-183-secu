<?php
/**
 * ETML
 * Date: 01.06.2017
 * Shop
 */

class UserController extends Controller {

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
     * Method to display the username
     */
    public function profilAction(){
        if(isset($_SESSION['right'])){
            $view = file_get_contents('view/page/user/profil.php');

            ob_start();
            eval('?>' . $view);
            $content = ob_get_clean();

            return $content;
        }
        else {
            header("location:index.php");
        }
    }
}