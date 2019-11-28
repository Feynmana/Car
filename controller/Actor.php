<?php
namespace app\CarShop\controller;
use think\Controller;
use app\CarShop\model\Actor as Act;
class Actor extends Controller
{
    //获取页面数据
    function Index()
    {
        $list = Act::all();
        $this->assign('list',$list);   
        return $this->fetch();  
    }
    //添加数据
    function Add()
    {
        $this->assign(Act::all());
        return $this->fetch();
    }
    function AddSave()
    { 
      //给对象赋值
      $Act = new Act();
      $Act->id = input('id');
      $Act->username = input('username');
      $Act->password =md5(input('password'));
      //执行保存文件
      $rs = $Act->save();
      //实现保存跳转
      if($rs)
      {  
        $this->redirect('/CarShop/Actor/Index');
      }
    }
     //完成单个删除操作
    function Del($id)
    {  
      $e = Act::get($id);
      $rs = $e->delete();
      if($rs)
      {
        $this->redirect('/CarShop/Actor/Index');
      }
    }
}