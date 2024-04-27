<?php

class Harga extends DB
{
    function getHarga()
    {
        $query = "SELECT * FROM harga";
        return $this->execute($query);
    }

    function getHargaById($id)
    {
        $query = "SELECT * FROM harga WHERE id_harga=$id";
        return $this->execute($query);
    }

    function addHarga($data)
    {
        $harga = $data['harga_barang'];
        $query = "INSERT INTO harga VALUES('', '$harga')";
        return $this->executeAffected($query);
    }

    function updateHarga($id, $data)
    {
        $harga = $data['harga_barang'];
        $query = "UPDATE harga SET harga_barang='$harga' WHERE id_harga=$id";
        return $this->executeAffected($query);
    }

    function deleteHarga($id)
    {
        $query = "DELETE FROM harga WHERE id_harga=$id";
        return $this->executeAffected($query);
    }
}
