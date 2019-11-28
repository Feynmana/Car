<?php
namespace app\CarShop\controller;
use think\Controller;
use app\CarShop\model\Status as Stus;
class Status extends Controller
{   
    //获取页面数据
    function Index()
    {
        $list = Stus::all();
        $this->assign('list',$list);   
        return $this->fetch();  
    }
    //添加数据
    function Add()
    {
        $this->assign(Stus::all());
        return $this->fetch();
    }
    //添加保存数据
    function AddSave()
    { 
      //给对象赋值
      $Stus = new Stus();
      $Stus->id = input('id');
      $Stus->parkingid = input('parkingid');
      $Stus->platenumber =(input('platenumber'));
      $Stus->region = input('region');
      $Stus->status = input('status');
      //执行保存文件
      $rs = $Stus->save();
      //实现保存跳转
      if($rs)
      {  
        $this->redirect('/CarShop/Status/Index');
      }
    }
    //获取得到数据
    function GetMember($id)
    {
      // return Stus::get($id);
      $rs = Stus::all();
      dump($rs);
    } 
}