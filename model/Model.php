<?php
/**
 * ¿Que contiene el Model?
 * 
 * Todos los modelos deben tener las mismas operaciones:
 * - dame todos
 * - dame uno
 * - guarda uno
 * - actualiza uno
 * - elimina uno
 */
    interface Model{
        public function findAll();

        public function findById($id);

        public function store($datos);

        public function updateById($id);

        public function destroyById($id);
    }
?>