### 使用Composer 安装
````
#执行如下命令安装,安装后使用文档中的调用方法即可使用.
composer require lit/ms
然后修改 Server.php 中 autoload 为自己的 vendor/autoload.php .

#执行如下命令,直接创建项目(demo).
composer create-project  lit/ms-demo project-name
````

### 初始化项目
修改 Server.php 的配置项, 每个配置项都有系统默认值

### 代码详解
1. Server.php
````PHP
<?php
//autoload
require(dirname(__DIR__).'/vendor/autoload.php');
$server = new \Lit\Ms\LitMsServer();
$server
    ->setHttpHost("0.0.0.0")    //设置监听host ip
    ->setHttpPort(9000)    //设置 监听端口
    ->setWorkerNum(10)    //设置 进程数量
    ->setWorkDir(__DIR__)    //设置项目目录
    ->setDaemonize(false)    //设置是否守护进程
    ->setOpenBaseDir(__DIR__)    //设置读取安全目录
    ->setOpenBaseDir(dirname(__DIR__).DIRECTORY_SEPARATOR."vendor")    //设置读取安全目录
    ->setLogFile("/tmp/litmsError.log")    //设置错误日志文件
    ->setLogLevel(0)    //设置输出错误等级
    ->setSlowLogFile("/tmp/litmsSlow.log")    //设置慢日志文件
    ->setSlowTimeOut(1)    //设置慢日志时间
    ->setDocumentRoot(__DIR__.DIRECTORY_SEPARATOR."Static")    //设置静态目录
    ->setAuthenticate(['user1'=>'123','user2'=>'234','user3'=>'345'])    //开启简单身份认证,设置用户名密码
    ->setSslCertFile("./ssl/demo.pem","./ssl/demo.key") //设置证书文件
    ->setOnStart(__DIR__.DIRECTORY_SEPARATOR."OnStart.php")     //设置启动时先执行的一个文件
    ->run();
````

2. Route.php 
````PHP
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
````

3. Controller 目录
````php
<?php
//创建 WelcomeController.php 类文件可直接使用 (new WelcomeController())->方法名()调用
return (new WelcomeController())->welcome();
````

4. Static 目录
````php
此目录为静态文件目录, 此目录中的文件通过url地址可以直接访问
例如:
    http://hostname/css/app.css 
本框架为动态微服务框架,尽量不要使用静态文件和静态HTML
````

5. View 目录
````php
此目录为视图文件目录, 通过一下方法可以直接访问
(new \Lit\Ms\LitMsResponse)->html("HtmlDemo.html");
本框架为动态微服务框架,尽量不要使用静态文件和静态HTML
````

6. Model 目录
````php
<?php
//创建 WelcomeModel.php 类文件可直接使用 (new WelcomeModel())->方法名()调用
return (new WelcomeModel())->welcome();
````

7. Filter.php
````php
//过滤器文件, 只要方法返回 false, 即过滤器生效.<?php
class Filter extends Lit\Ms\LitMsFilter {

    function rule1 ( $request, $response ) {
        return true;
    }

    function rule2 ( $request,$response ) {
        if ($request->get["a"] == 1) {
            return true;
        }else{
            $this->setError(1,__FUNCTION__); //框架返回自定义错误
            return false;
        }
    }
}
````

8. Schedule.php
````php
//定时任务文件, 参考实例文件.
<?php
//在 Y-m-d H:i:s 执行一次
Lit\Ms\LitMsSchedule::at( "2020-03-01 21:12:40", function (){
    echo "at ".date("Y-m-d H:i:s")."\n";
},"MyAt");
````

### 启动 HTTP 服务
````BASH
php Server.php 
````

### 启动 Schedule 服务
````BASH
php Server.php Schedule 或 php Server.php Crontab
````
### 启动 Shell 
````BASH
php Server.php Shell ModelName/FunctionName 或 php Server.php Command ModelName/FunctionName
````