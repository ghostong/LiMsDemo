<?php
/**
 * 自定义过滤器
 */

class Filter extends Lit\Ms\LitMsFilter {

    function rule1 ( $request, $response ) {
        return true;
    }

//    function rule2 ( $request, $response ) {
//        if ($request->get["a"] == 1) {
//            return true;
//        }else{
//            $this->setError(1,__FUNCTION__);
//            return false;
//        }
//    }

}