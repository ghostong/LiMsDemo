<?php
/**
 * 测试Controller模块
 */

class WelcomeController extends \Lit\Ms\LitMsController {

    public function welcome( $request, $response ){
        $response = new \Lit\Ms\LitMsResponse();
        $string = implode(" ", (new WelcomeModel())->welcome());
        $response->success([$string]);
        return $response;
    }

}