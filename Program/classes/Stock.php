<?php

class Stock extends DB
{
    function getStock()
    {
        $query = "SELECT * FROM stock";
        return $this->execute($query);
    }

    function getStockById($id)
    {
        $query = "SELECT * FROM stock WHERE id_stock=$id";
        return $this->execute($query);
    }

    function addStock($data)
    {
        $stock = $data['stock_barang'];
        $query = "INSERT INTO stock VALUES('', '$stock')";
        return $this->executeAffected($query);
    }

    function updateStock($id, $data)
    {
        $stock = $data['stock_barang'];
        $query = "UPDATE stock SET stock_barang='$stock' WHERE id_stock=$id";
        return $this->executeAffected($query);
    }

    function deleteStock($id)
    {
        $query = "DELETE FROM stock WHERE id_stock=$id";
        return $this->executeAffected($query);
    }
}
