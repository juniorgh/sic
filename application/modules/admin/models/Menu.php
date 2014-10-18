<?php

class Admin_Model_Menu {

  public static function find($id = null, $pager = false, array $where = null, array $order = null) {
    $menu = new Admin_Model_DbTable_Menu();
    if (!is_null($id)) {
      return $menu->find($id)->current()->toArray();
    } else {
      $query = $menu->select();
      if (!is_null($where)) {
        foreach ($where as $cond) {
          $query->where($cond);
        }
      }

      if (!is_null($order)) {
        $query->order($order);
      } else {
        $query->order('menuTitulo');
      }

      if ($pager == false) {
        return $menu->fetchAll($query)->toArray();
      } else {
        return $query;
      }
    }
  }

  public static function drop($id){
    $menu = new Admin_Model_DbTable_Menu();
    $where = $menu->getAdapter()->quoteInto("menuId = ?", $id);
    $menu->delete($where);
  }
  
  public static function insert(array $data){
     $menu = new Admin_Model_DbTable_Menu();
     return $menu->insert($data);
  }
  
  public static function update(array $data) {
        $menu = new Admin_Model_DbTable_Menu();
        $where = $menu->getAdapter()->quoteInto('menuId = ?', $data['menuId']);
        unset($data['menuId']);
        return $menu->update($data, $where);
    }
}
