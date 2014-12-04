<?php

class Admin_Model_Comentar
{
	public function find($id = null, $pager = false, array $where = null, array $order = null) {
		$comentar = new Admin_Model_DbTable_Comentar();
		if (!is_null($id)) {
			return $comentar->find($id)->current()->toArray();
		} else {
			$query = $comentar->select();
			if (!is_null($where)) {
				foreach ($where as $cond) {
					$query->where($cond);
				}
			}

			if (!is_null($order)) {
				$query->order($order);
			} else {
				$query->order('comentarId');
			}

			if ($pager == false) {
				return $comentar->fetchAll($query)->toArray();
			} else {
				return $query;
			}
		}
	}

	public function findComentarUsuario($id) {
        $comentar = new Admin_Model_DbTable_Comentar();
        $query = $comentar->select()
                ->setIntegrityCheck(false)
                ->from(array('c' => 'comentar'))
                ->join(array('u' => 'usuario'), 'c.comentarUsuarioId = u.usuarioId')
                ->where('c.comentarEquipePostagemId = ?', $id);

        return $comentar->fetchAll($query);
    }

	public function save($data = array()) {
		$comentar = new Admin_Model_DbTable_Comentar();
		return $comentar->insert($data);
	}

	public function comentarEquipePostagemId($id){
		$comentar = new Admin_Model_DbTable_Comentar();

		$query = $comentar->select()->where('comentarEquipePostagemId = ?', $id);

		return $comentar->fetchAll($query)->toArray();
	}
}

