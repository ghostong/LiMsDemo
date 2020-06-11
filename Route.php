<?php
/**
 * LitMs 路由
 */

class Route extends Lit\Ms\LitMsRoute {

    function __construct(){

        //注册一个全method路由
        $this->all('/',function ( $request, $response ) {
            return (new WelcomeController())->welcome( $request, $response );
        });

        //注册另一个get路由
        $this->get("/get",function ( $request, $response ) {
            return (new Lit\Ms\LitMsResponse())->string("Method get");
        });

        //注册另一个post路由
        $this->post("/post",function ( $request, $response ) {
            return (new Lit\Ms\LitMsResponse())->string("Method post");
        });

        //注册另一个delete路由
        $this->delete("/delete",function ( $request, $response ) {
            return (new Lit\Ms\LitMsResponse())->string("Method delete");
        });

        //注册另一个静态页面
        $this->get("/html",function ( $request,$response ) {
            return (new \Lit\Ms\LitMsResponse)->html("HtmlDemo.html");
        });

    }

}