<?php
namespace app\CarShop\controller;
use think\Controller;
use app\CarShop\model\Status as Stus;
class Move extends Controller
{   
    //获取页面数据
    function Index()
    {
        $list = Stus::all();
        $this->assign('list',$list);   
        return $this->fetch();  
    }
    //完成单个删除操作
    function Del($id)
    {  
       $e = Stus::get($id);
       $rs = $e->delete();
       if($rs)
       {
        $this->redirect('/CarShop/Move/Index');
       }
    }

}